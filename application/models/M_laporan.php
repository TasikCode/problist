<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllLaporan()
	{
		$this->db->from('laporan');
		$this->db->order_by('id_laporan', 'desc');
		$query = $this->db->get();
		return $query->result();	
	}

	public function getKategori()
	{
		$this->db->from('kategori');
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->result();	
	}

	public function getKategoriById($id_kategori)
	{
		$this->db->from('kategori');
		$this->db->where('id_kategori', $id_kategori);
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();	
	}

	public function getLaporanById($id_laporan)
	{
		$this->db->from('laporan');
		$this->db->join('kategori', 'kategori.id_kategori = laporan.id_kategori', 'left');
		$this->db->where('id_laporan', $id_laporan);
		$this->db->order_by('id_laporan', 'desc');
		$query = $this->db->get();
		return $query->row();	
	}

	public function getAllLaporanByKategori($id_kategori)
	{
		$this->db->from('laporan');
		$this->db->where('id_kategori', $id_kategori);
		$this->db->order_by('laporan_tanggal', 'desc');
		$query = $this->db->get();
		return $query->result();	
	}

	public function input_data($data)
	{
		$this->db->insert('laporan', $data);
	}

}

/* End of file M_laporan.php */
/* Location: ./application/models/M_laporan.php */