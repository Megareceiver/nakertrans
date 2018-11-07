<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

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
         $this->load->model('Model_pengaturan');
  	 }

	public function index()
	{
        if ($this->session->userdata("status_login") == 1){
            $data['menuaction'] ='
            <li class="naker-action">
                <a href="#modal-tambah_slide" uk-toggle>Tambah slide</a></li>
            <li class="naker-action">
                <a href="#modal-tambah_user" uk-toggle>Tambah user</a></li>
            ';
            $data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Pengaturan").'>Pengaturan</a></li>';

            $data['user'] = $this->Model_pengaturan->get_user();
            $data['slide'] = $this->Model_pengaturan->get_slide();
            $data['program'] = $this->Model_pengaturan->get_program();
            
			$this->template->load('template_backend', 'backend/pengaturan/index', $data);
		}else{
			redirect(base_url());
		}
    }

    public function tambah_slide()
    {
        $path = $_SERVER['DOCUMENT_ROOT']."/nakertrans/upload/slide/";

		$caption_slide = $_POST["caption_slide"];
		$temp = explode(".", $_FILES["slide"]["name"]);
		$ext1 = end($temp);
		$filename = $filename = md5(date("Y-m-d H:i:s") . $caption_slide);
		$filename1 = $filename . '.' . $ext1;

		if (file_exists($path . $filename1)) {
            echo json_encode("Photo already exist");
        } else {

            if (move_uploaded_file($_FILES["slide"]["tmp_name"], $path . $filename1)) {
				echo json_encode("has been add");
				$data = array(
                    'caption_slide' => $caption_slide,
					'slide' => $filename1,
				);
				
				$this->Model_pengaturan->tambah_slide($data);
			}
		}

		redirect(site_url('Pengaturan'));
    }

    public function hapus_slide($id)
    {
        $path = $_SERVER['DOCUMENT_ROOT']."/nakertrans/upload/slide/";
		$data = $this->Model_pengaturan->get_slide_($id);

		unlink($path . $data->slide);
        $this->Model_pengaturan->hapus_slide($id);
        redirect(site_url('Pengaturan'));
    }

    public function get_data_user($id)
    {
        $data = $this->Model_pengaturan->get_data_user($id);
        echo json_encode($data);
    }

    public function tambah_user()
    {
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $tipe = $_POST["tipe"];
        $program = $_POST["program"];
        $password = $_POST["password"];
        
        if ($tipe == "1"){
            $tipe_ = "Admin";
        }else{
            $tipe_ = "External";
        }

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'tipe' => $tipe_,
            'program' => $program,
            'password' => md5($password),
            'role' => $tipe,
        );

        $this->Model_pengaturan->tambah_user($data);
        redirect(site_url('Pengaturan'));
    }

    public function edit_user()
    {
        $iduser = $_POST["iduser"];
        $nama = $_POST["nama2"];
        $username = $_POST["username2"];
        $tipe = $_POST["tipe2"];
        $program = $_POST["program2"];
        $password = $_POST["password_"];

        if ($tipe == "1"){
            $tipe_ = "Admin";
        }else{
            $tipe_ = "External";
        }

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'tipe' => $tipe_,
            'program' => $program,
            'password' => md5($password),
            'role' => $tipe,
        );

        $this->Model_pengaturan->edit_user($iduser, $data);
        redirect(site_url('Pengaturan'));
    }

}
?>