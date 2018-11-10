<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

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
         $this->load->model('Model_berita');
  	 }

	public function index()
	{
        if ($this->session->userdata("status_login") == 1){
			$data['menuaction'] ='
            <li class="naker-action">
                <a href="'.site_url('Berita/tambah').'" uk-toggle>Tambah</a></li>
            <li class="naker-action">
                <a onclick="hapus()">Hapus</a></li>
            ';
            $data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Berita").'>Berita</a></li>';
            $data['berita'] = $this->Model_berita->get_all();
            
			$this->template->load('template_backend', 'backend/berita/index', $data);
		}else{
			redirect(base_url());
		}
	}
	
	public function get_detail($id)
	{
		$data = $this->Model_berita->get_all_detail($id);
		echo json_encode($data);
	}

    public function tambah()
    {
        $data['menuaction'] ='
            <li class="naker-action">
                <a href="'.site_url('Berita').'" uk-toggle>Kembali</a></li>
            
            <li class="naker-action">
                <a>Hapus</a></li>
            ';
		$data['breadcumbs'] ='
		<li class="naker-breadcumbs"><a href='. site_url("Berita/tambah").'>Form berita</a></li>';

        $this->template->load('template_backend', 'backend/berita/tambah', $data);
	}
	
	public function add_()
	{
		$path = $_SERVER['DOCUMENT_ROOT']."/nakertrans_github/upload/berita/";

		$judul_berita = $_POST["judul_berita"];
		$temp = explode(".", $_FILES["gambar_utama"]["name"]);
		$ext1 = end($temp);
		$filename = $filename = md5(date("Y-m-d H:i:s") . $judul_berita);
		$filename1 = $filename . '.' . $ext1;

		if (file_exists($path . $filename1)) {
            echo json_encode("Photo already exist");
        } else {

            if (move_uploaded_file($_FILES["gambar_utama"]["tmp_name"], $path . $filename1)) {
				echo json_encode("has been add");
				$data = array(
                    'judul_berita' => $judul_berita,
					'gambar_utama' => $filename1,
					'tanggal' => date("Y-m-d H:i:s"),
				);
				
				$this->Model_berita->add_($data);
			}
		}

		redirect(site_url('Berita/tambah_continue/'.$judul_berita));
	}

	public function edit_($id)
	{
		$path = $_SERVER['DOCUMENT_ROOT']."/nakertrans_github/upload/berita/";

		$judul_berita = $_POST["judul_berita"];
		$temp = explode(".", $_FILES["gambar_utama"]["name"]);
		$ext1 = end($temp);
		$filename = $filename = md5(date("Y-m-d H:i:s") . $judul_berita);
		$filename1 = $filename . '.' . $ext1;
		
		echo json_encode($_FILES['gambar_utama']);
		if ($_FILES['gambar_utama']['size'] == 0) {
			$data = array(
				'judul_berita' => $judul_berita,
			);
			
			$this->Model_berita->edit_($id,$data);
		}else{
			if (file_exists($path . $filename1)) {
			    echo json_encode("Photo already exist");
			} else {

			    if (move_uploaded_file($_FILES["gambar_utama"]["tmp_name"], $path . $filename1)) {
					echo json_encode("has been add");
					$data = array(
			            'judul_berita' => $judul_berita,
						'gambar_utama' => $filename1,
					);
					
					$this->Model_berita->edit_($id, $data);
				}
			}
		}
		
		redirect(site_url('Berita/tambah_continue/'.$judul_berita));
	}

	public function tambah_continue($judul)
	{
		$judul = str_replace("%20"," ",$judul);
		$data ['berita'] = $this->Model_berita->get_($judul)[0];

		$data['menuaction'] ='
            <li class="naker-action">
                <a href="'.site_url('Berita').'" uk-toggle>Kembali</a></li>
            
            <li class="naker-action">
                <a onclick="hapus()">Hapus</a></li>
            ';
		$data['breadcumbs'] ='
		<li class="naker-breadcumbs"><a href='. site_url("Berita/tambah").'>Form berita</a></li>';

        $this->template->load('template_backend', 'backend/berita/tambah_continue', $data);
	}

	public function tambah_det1($id)
	{
		$isi_berita = $_REQUEST['isi_berita'];
		$data = array(
			"id_berita" => $id,
			"isi_berita" => $isi_berita,
			"tipe" => "text",
		);

		$this->Model_berita->tambah_detail($data);

		$hasil = $this->Model_berita->get_detail($id, 'text');
		echo json_encode($hasil);
	}

	public function tambah_det2($id)
	{
		$path = $_SERVER['DOCUMENT_ROOT']."/nakertrans_github/upload/berita/";
		$temp = explode(".", $_FILES["file"]["name"]);
		$ext1 = end($temp);
		$filename = $filename = md5(date("Y-m-d H:i:s"));
		$filename1 = $filename . '.' . $ext1;

		if (file_exists($path . $filename1)) {
            // echo json_encode("Photo already exist");
        } else {

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $path . $filename1)) {
				// echo json_encode("has been add");
				$data = array(
					"id_berita" => $id,
					"isi_berita" => $filename1,
					"tipe" => "gambar",
				);
				
				$this->Model_berita->tambah_detail($data);
				
			}
		}
	}

	public function hapus_($id)
	{
		$path = $_SERVER['DOCUMENT_ROOT']."/nakertrans_github/upload/berita/";
		$data = $this->Model_berita->get_data($id)[0];

		unlink($path . $data->gambar_utama);
		$this->Model_berita->hapus_($id);
		$this->Model_berita->hapus_detail($id);

		redirect(site_url('Berita'));
	}

	public function hapus_detail($id)
	{
		$this->Model_berita->hapus_detail2($id);
	}


	public function lihat_berita_backend($id)
	{	

		$data['menuaction'] ='
            <li class="naker-action">
                <a href="'.site_url('Berita').'" >Kembali</a></li>';
		$data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Berita").'>Berita</a></li>';

		$data['berita_utama'] = $this->Model_berita->get_data($id);
		$data['berita_detail'] = $this->Model_berita->get_all_detail($id);

		$this->template->load('template_backend', 'backend/berita/lihat', $data);
	}
}
?>