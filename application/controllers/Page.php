<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function privacy()
	{
		$this->load->view('template/head');
		$this->load->view('page/privacy_view');
		$this->load->view('template/foot');
	}

	public function tos()
	{
		$this->load->view('template/head');
		$this->load->view('page/tos_view');
		$this->load->view('template/foot');
	}

}

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */