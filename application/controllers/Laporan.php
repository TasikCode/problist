<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('M_laporan');
		$data['laporan'] = $this->M_laporan->getAllLaporan();
		$data['kategoris'] = $this->M_laporan->getKategori();
		$data['message'] = '';

		$this->load->view('template/head');
		$this->load->view('home_view', $data);
		$this->load->view('template/foot');
	}

	public function detail($id_laporan)
	{
		$this->load->model('M_laporan');
		$data['laporan'] = $this->M_laporan->getLaporanById($id_laporan);

		$this->load->view('template/head');
		$this->load->view('detail_view', $data);
		$this->load->view('template/foot');
	}

	public function kategori($id_kategori)
	{
		$this->load->model('M_laporan');
		$data['kategori'] = $this->M_laporan->getAllLaporanByKategori($id_kategori);
		$data['nama_kategori'] = $this->M_laporan->getKategoriById($id_kategori);

		$this->load->view('template/head');
		$this->load->view('kategori_view', $data);
		$this->load->view('template/foot');
	}

	public function add()
	{
		$this->load->model('M_laporan');

		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$isi = $this->input->post('isi');
		$notel = $this->input->post('no_tel');
		$kategori = $this->input->post('kategori'); 
		$data = array(
			'laporan_nama' => $nama,
			'laporan_email' => $email,
			'laporan_isi' => $isi,
			'laporan_telepon' => $notel,
			'id_kategori' => $kategori,
			'laporan_tanggal' => date('Y/m/d')
			);

		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
		$userIp=$this->input->ip_address();
		$secret = $this->config->item('google_secret');
		$url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		$status= json_decode($output, true);
		if ($status['success']) {

			    $this->load->library('form_validation');
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('isi', 'Isi Laporan', 'required');
                $this->form_validation->set_rules('no_tel', 'Nomor Telepon', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                		$data['message'] = '<div class="alert alert-danger" id="success-alert">
											  <button type="button" class="close" style="margin-left:30px" data-dismiss="alert">x</button>
											  <strong>Hmm!</strong> Diisi semua kolomnya ya, silahkan <a href="/#lapor">Klik disini</a> untuk mengulagi
											</div>';
						$data['laporan'] = $this->M_laporan->getAllLaporan();
						$data['kategoris'] = $this->M_laporan->getKategori();

                        $this->load->view('template/head');
						$this->load->view('home_view', $data);
						$this->load->view('template/foot');
                }
                else
                {
                        $this->M_laporan->input_data($data);
						$data['message'] = '<div class="alert alert-success" id="success-alert">
											  <button type="button" class="close" style="margin-left:30px" data-dismiss="alert">x</button>
											  <strong>Hatur nuhun!</strong> Laporan kamu sudah tersimpan.
											</div>';
						$data['laporan'] = $this->M_laporan->getAllLaporan();
						$data['kategoris'] = $this->M_laporan->getKategori();

						$this->load->view('template/head');
						$this->load->view('home_view', $data);
						$this->load->view('template/foot');
                }
			
		}else{
			//$this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
			$data = toast_message();
			redirect('/', $data);
		}
}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */