<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		 $this->load->model('Model_profile');
  	 }

	public function index()
	{
		if ($this->session->userdata("status_login") == 1){
			$data['menuaction'] ='<li><a href="">
										<p style="font-size: 12px;line-height: 12px;margin-bottom: 0;margin-top: 20px;">'.date("Y").'  <br>'.date("M").'</p>
										<p style="font-size: 50px;margin: 0px">'.date("d").'</p>
										<p style="margin-top: 5px;font-size: 10px;">| Dasboard</p>
									</a></li>';
			$data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Profile").'>Profile</a></li>';
			
			$data['sejarah'] = $this->Model_profile->get_sejarah();
			$data['visi'] = $this->Model_profile->get_visi();
			$data['misi'] = $this->Model_profile->get_misi();
			$data['kepbag'] = $this->Model_profile->get_kepbag();
			$data['subbag'] = $this->Model_profile->get_subbag();
			$data['seksi'] = $this->Model_profile->get_seksi();
			$data['dapub'] = $this->Model_profile->get_dapub();
			$data['galeri'] = $this->Model_profile->get_galeri();

			$this->template->load('template_backend', 'backend/profile/index', $data);
		}else{
			redirect(base_url());
		}
	}
	// sejarah
		public function tambah_sejarah()
		{
			$text = $_POST['text'];
			$data = array(
				'kategori'=> 'sejarah',
				'text'=> $text
			);
			$this->Model_profile->tambah_($data);
			$this->session->set_userdata('active_profile', 'sejarah');
			redirect(site_url('Profile'));
		}

		public function hapus_sejarah($id)
		{
			$kategori = 'sejarah';
			$this->Model_profile->hapus_($kategori, $id);
			$this->session->set_userdata('active_profile', 'sejarah');
			redirect(site_url('Profile'));
		}
	
	// visi misi
		public function tambah_visi()
		{
			$text = $_POST['textvisi'];
			$data = array(
				'kategori'=> 'visi',
				'text'=> $text
			);
			$this->Model_profile->tambah_($data);

			$this->session->set_userdata('active_profile', 'visimisi');
			redirect(site_url('Profile'));
		}

		public function hapus_visi($id)
		{
			$kategori = 'visi';
			$this->Model_profile->hapus_($kategori, $id);
			$this->session->set_userdata('active_profile', 'visimisi');
			redirect(site_url('Profile'));
		}

		public function tambah_misi()
		{
			$text = $_POST['textmisi'];
			$data = array(
				'kategori'=> 'misi',
				'text'=> $text
			);
			$this->Model_profile->tambah_($data);
			$this->session->set_userdata('active_profile', 'visimisi');
			redirect(site_url('Profile'));
		}

		public function hapus_misi($id)
		{
			$kategori = 'misi';
			$this->Model_profile->hapus_($kategori, $id);
			$this->session->set_userdata('active_profile', 'visimisi');
			redirect(site_url('Profile'));
		}
	
	// tupoksi
		public function tambah_tupoksi()
		{
			$kategori = $_POST['kategori'];
			$text = $_POST['text'];

			$data = array(
				'kategori'=> $kategori,
				'text'=> $text
			);
			$this->Model_profile->tambah_($data);
			$this->session->set_userdata('active_profile', 'tupoksi');
			redirect(site_url('Profile'));

		}

		public function hapus_tupoksi($kategori, $id)
		{
			$this->Model_profile->hapus_($kategori, $id);
			$this->session->set_userdata('active_profile', 'tupoksi');
			redirect(site_url('Profile'));
		}

	// data publikasi
		public function tambah_dapub()
		{
			$path = $_SERVER['DOCUMENT_ROOT']."/nakertrans_git/upload/profile/dapub/";

			$temp = explode(".", $_FILES["file"]["name"]);
			$ext1 = end($temp);
			$filename = $filename = md5(date("Y-m-d H:i:s"));
			$filename1 = $filename . '.' . $ext1;

			$text = $_POST['text'];

			if (file_exists($path . $filename1)) {
				$this->session->set_userdata('notif_dapub','Upload file gagal!');
			} else {

				if (move_uploaded_file($_FILES["file"]["tmp_name"], $path . $filename1)) {
					$this->session->set_userdata('notif_dapub','Upload file berhasil!');

					$data = array(
						'kategori' => 'dapub',
						'text' => $text,
						'file' => $filename1,
					);
					
					$this->Model_profile->tambah_($data);
				}
			}
			
			$this->session->set_userdata('active_profile', 'datapublikasi');
			redirect(site_url('Profile'));
		}

		public function hapus_dapub($kategori, $id)
		{
			$path = $_SERVER['DOCUMENT_ROOT']."/nakertrans_git/upload/profile/dapub/";
			$data = $this->Model_profile->get_dapub_row($id);
			unlink($path . $data->file);

			$this->Model_profile->hapus_($kategori, $id);
			$this->session->set_userdata('notif_dapub','File berhasil dihapus!');
			$this->session->set_userdata('active_profile', 'datapublikasi');
			redirect(site_url('Profile'));
		}
	
	// galeri  
		public function tambah_galeri()
		{
			$path = $_SERVER['DOCUMENT_ROOT']."/nakertrans_git/upload/profile/galeri/";

			$temp = explode(".", $_FILES["file"]["name"]);
			$ext1 = end($temp);
			$filename = $filename = md5(date("Y-m-d H:i:s"));
			$filename1 = $filename . '.' . $ext1;

			$text = $_POST['text'];

			if (file_exists($path . $filename1)) {
				$this->session->set_userdata('notif_galeri','Upload file gagal!');
			} else {

				if (move_uploaded_file($_FILES["file"]["tmp_name"], $path . $filename1)) {
					$this->session->set_userdata('notif_galeri','Upload file berhasil!');

					$data = array(
						'kategori' => 'galeri',
						'text' => $text,
						'file' => $filename1,
					);
					
					$this->Model_profile->tambah_($data);
				}
			}
			
			$this->session->set_userdata('active_profile', 'galeri');
			redirect(site_url('Profile'));
		}

		public function hapus_galeri($kategori, $id)
		{
			$path = $_SERVER['DOCUMENT_ROOT']."/nakertrans_git/upload/profile/galeri/";
			$data = $this->Model_profile->get_dapub_row($id);
			unlink($path . $data->file);

			$this->Model_profile->hapus_($kategori, $id);
			$this->session->set_userdata('notif_galeri','File berhasil dihapus!');
			$this->session->set_userdata('active_profile', 'galeri');
			redirect(site_url('Profile'));
		}
}
?>