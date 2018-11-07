<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dfrontend extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 function __construct(){
	     parent::__construct();
	     $this->load->helper('url');
		 $this->load->library('session');
		 $this->load->model('Model_bfrontend');
  	 }

	public function index()
	{
		// $data['menuaction'] ='';
		// $data['breadcumbs'] ='';
		$data['jumlah_berita'] = count($this->Model_bfrontend->get_berita_terkini());
		$data['daftar_berita'] = $this->Model_bfrontend->get_berita_terkini();
		$data['daftar_slide'] = $this->Model_bfrontend->get_slide();

		$this->template->load('template_frontend', 'frontend/dashboard', $data);
	}

	public function lihat_berita($id)
	{
		// $data['isi_berita'] = $this->Model_bfrontend->lihat_berita($id);
		$data['berita_utama'] = $this->Model_bfrontend->get_data_berita($id);
		$data['berita_detail'] = $this->Model_bfrontend->get_all_detail_berita($id);

		$this->template->load('template_frontend', 'frontend/lihat_berita', $data);
	}

	public function detail_($id_berita)
	{
		$data = $this->Model_bfrontend->get_all_detail_berita($id_berita);
		echo json_encode($data);
	}
}
?>