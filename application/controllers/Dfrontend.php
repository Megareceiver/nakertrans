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

	public function lihat_profil($section)
	{	
		$data['footer'] = "false";
		$data['section'] = "";

		switch($section){
			case "sejarah": 
				$data['section'] = "profil";
				$data['judul_profil'] = "Sejarah";
				$data['isi_profil'] = array(
					"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris finibus dapibus quam, vel hendrerit libero rhoncus at. Suspendisse non rhoncus sapien. Vestibulum pharetra metus eros, a fringilla sapien iaculis nec. Praesent ante massa, convallis quis bibendum vel, consectetur id mauris. Duis laoreet urna sit amet risus laoreet, nec feugiat sapien mollis. Suspendisse potenti. Vivamus fermentum urna lacinia, pulvinar leo eget, vulputate neque. Aliquam et congue lectus. Curabitur viverra massa eget elit scelerisque, eget lobortis velit molestie. Sed sed felis elit. Nulla ac porta sem. Integer lobortis rutrum elit, id faucibus augue dignissim et. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque eleifend eros ullamcorper leo rutrum, at convallis velit posuere.",
					"Phasellus sit amet sapien nunc. Integer sed dui elit. Fusce fringilla dui in posuere maximus. Nunc ante enim, aliquam vitae maximus in, volutpat at orci. Quisque at accumsan nisl. Maecenas erat purus, porttitor nec sapien in, porta dapibus dui. Pellentesque congue dui a ante euismod blandit. Duis sed neque in sapien egestas viverra. Fusce elementum tellus a tellus egestas, pulvinar luctus magna pellentesque. Nulla iaculis consectetur purus a pharetra. Mauris mattis nisl est, quis placerat nibh facilisis ut. Cras quis faucibus metus. Morbi at dui leo.",
					"Nullam fermentum consequat odio, in suscipit lorem posuere et. Phasellus placerat blandit nunc vitae dignissim. Donec placerat, enim ut aliquam varius, libero mauris semper metus, id dignissim enim massa sit amet massa. Praesent porttitor urna ipsum, id ullamcorper massa luctus quis. Mauris dapibus id nibh sed vestibulum. Ut quam velit, commodo ac augue sed, imperdiet ornare diam. Praesent ac libero orci. Pellentesque dignissim leo aliquam, lobortis orci sed, mattis augue.",
					"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi quis arcu pretium felis dignissim faucibus. Mauris at lacinia lacus, vel tempor sapien. Sed ex nisl, convallis sit amet aliquet sit amet, rhoncus vel leo. Morbi diam purus, fringilla pretium eros in, molestie mattis enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque dapibus, mauris a viverra convallis, orci elit elementum nisl, eget accumsan elit libero nec eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi malesuada lorem sit amet semper fermentum.",
					"Aenean imperdiet massa nec scelerisque imperdiet. Ut sit amet sodales nisl. Vivamus tristique vitae libero id ultricies. Aliquam dictum ex in urna bibendum eleifend. Etiam id hendrerit urna, sit amet ultricies urna. Fusce gravida rutrum est, vitae porttitor diam sagittis ut. Mauris bibendum suscipit metus non varius. Suspendisse sit amet massa et turpis luctus tincidunt at congue tortor. Sed faucibus, nulla ut cursus pulvinar, tellus nunc vestibulum diam, ut vestibulum erat orci eu quam. Ut non metus euismod, aliquam leo quis, condimentum ex. Nulla mollis varius lorem at vulputate. Curabitur egestas, felis et vulputate tincidunt, ligula quam ornare orci, eget semper enim lorem et felis. Morbi vitae orci sit amet sapien sollicitudin tincidunt eu eu turpis. Quisque feugiat suscipit sagittis. Sed ac lacus eget ligula venenatis venenatis."
				);
			break;

			case "visi_misi": 
				$data['section'] = "profil";
				$data['judul_profil'] = "Visi dan Misi";
				$data['isi_profil'] = array(
					"Visi",
					"Suspendisse non rhoncus sapien. Vestibulum pharetra metus eros, a fringilla sapien iaculis nec. Praesent ante massa, convallis quis bibendum vel, consectetur id mauris. Duis laoreet urna sit amet risus laoreet.",
					"-- o --", 
					"Misi", 
					"1. Phasellus sit amet sapien nunc.",
					"2. Integer sed dui elit. Fusce fringilla dui in posuere maximus.",
				);
			break;

			case "tupoksi": 
				$data['section'] = "profil";
				$data['judul_profil'] = "Tupoksi";
				$data['isi_profil'] = array(
					"Kepala bagian : ",
					"1. Phasellus sit amet sapien nunc.",
					"2. Integer sed dui elit. Fusce fringilla dui in posuere maximus.",
					"3. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
					"-- o --", 
					"Sub Bagian : ",
					"1. Phasellus sit amet sapien nunc.",
					"2. Integer sed dui elit. Fusce fringilla dui in posuere maximus.",
					"-- o --", 
					"Seksi-seksi : ",
					"1. Mauris finibus dapibus quam, vel hendrerit libero rhoncus at.", 
					"2. Suspendisse non rhoncus sapien. Vestibulum pharetra metus eros", 
					"3. A fringilla sapien iaculis nec. Praesent ante massa", 
					"4. convallis quis bibendum vel, consectetur id mauris. "
				);
			break;

			case "data_publikasi": 
				$data['section'] = "download";
				$data['judul'] = "Data dan Publikasi";
				$data['data'] = array(
					array("judul" => "Mauris finibus dapibus quam, vel hendrerit libero rhoncus at", "file" => "sample.pdf"),
					array("judul" => "Suspendisse non rhoncus sapien. Vestibulum pharetra metus eros", "file" => "sample.pdf"),
				);

				$data['data'] = json_decode(json_encode($data['data']), FALSE);
			break;

			case "galeri": 
				$data['section'] = "galeri";
				$data['judul'] = "Galeri";
				$data['data'] = array(
					array("gambar" => "bg-dark.jpg", "caption" => "Background footer"),
					array("gambar" => "bg-ex-1.jpg", "caption" => "Gedung sate"),
					array("gambar" => "bg-ex-2.jpg", "caption" => "Taman belakang Gedung sate"),
					array("gambar" => "bg-ex-3.jpg", "caption" => "Teras atas Gedung sate"),
					array("gambar" => "bg-ex-4.jpg", "caption" => "Jalan Layang Pasupati"),
				);

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
}
?>