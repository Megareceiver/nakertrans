<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		 $this->load->model('Model_auth');
  	 }

	public function index()
	{
		$data['menuaction'] ='<li><a href="">
				                	<p style="font-size: 12px;line-height: 12px;margin-bottom: 0;margin-top: 20px;">'.date("Y").'  <br>'.date("M").'</p>
				                	<p style="font-size: 50px;margin: 0px">'.date("d").'</p>
				                	<p style="margin-top: 5px;font-size: 10px;">| Dasboard</p>
				                </a></li>';
		$data['breadcumbs'] ='';
		$this->template->load('template_login', 'auth/Login', $data);
	}

	public function checkuser($username){
		$data = $this->Model_auth->checkuser($username);
		if (count($data) > 0){
			echo 'true';
		}else{
			echo 'false';
		}	
	}

	public function loginauth($username, $password)
	{
		$login      =  $this->Model_auth->checklogin($username, $password);

		if(count($login) > 0 ){
			// $r=  $login;
			$data = array('id'       => $login->id,
						'nama'         => $login->nama,
						'tipe'  => $login->tipe,
						'program'      => $login->program,
						'username'      => $login->username,
						'role'      => $login->role,
						'status_login'  => '1');

			$this->session->set_userdata($data);
			
			echo json_encode($data);
		}
		else{
			$data = array('status_login'  => '0');
			echo json_encode($data);
		}
	}

	public function Logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
?>