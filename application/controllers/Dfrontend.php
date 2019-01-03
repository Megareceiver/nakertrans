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
		 $this->load->model('Model_profile');
		 $this->load->model('Model_sumberdata');
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

	public function lihat_profil($section)
	{	
		$data['footer'] = "false";
		$data['section'] = "";

		switch($section){
			case "sejarah": 
				$data['section'] = "profil";
				$data['judul_profil'] = "Sejarah";
				$data['isi_profil'] = $this->Model_profile->get_sejarah();
			break;

			case "visi_misi": 
				$data['section'] = "profil";
				$data['judul_profil'] = "Visi dan Misi";
				$data['isi_visi'] = $this->Model_profile->get_visi();
				$data['isi_misi'] = $this->Model_profile->get_misi();
			break;

			case "tupoksi": 
				$data['section'] = "profil";
				$data['judul_profil'] = "Tupoksi";
				$data['isi_kepbag'] = $this->Model_profile->get_kepbag();
				$data['isi_subbag'] = $this->Model_profile->get_subbag();
				$data['isi_seksi'] = $this->Model_profile->get_seksi();
			break;

			case "data_publikasi": 
				$data['section'] = "download";
				$data['judul'] = "Data dan Publikasi";
				$data['data'] = $this->Model_profile->get_dapub();

				$data['data'] = json_decode(json_encode($data['data']), FALSE);
			break;

			case "galeri": 
				$data['section'] = "galeri";
				$data['judul'] = "Galeri";
				$data['data'] = $this->Model_profile->get_galeri();

				$data['data'] = json_decode(json_encode($data['data']), FALSE);
			break;

			default: 
				$data['section'] = "profil";
				$data['judul_profil'] = "Page 404";
				$data['isi_profil'] = array();
		}

		if($data['section'] == "profil"){
			$this->template->load('template_frontend', 'frontend/lihat_profil', $data);
		} elseif($data['section'] == "download"){
			$this->template->load('template_frontend', 'frontend/lihat_arsip', $data);
		} elseif($data['section'] == "galeri"){
			$this->template->load('template_frontend', 'frontend/lihat_galeri', $data);
		}
	}

	public function data_spasial()
	{
		$data['sumberdata'] = $this->Model_sumberdata->datasource_spasial();
		$this->template->load('template_frontend', 'frontend/data_spasial', $data);
	}
}
?>