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
		$data['menuaction'] ='<li><a href="">
				                	<p style="font-size: 12px;line-height: 12px;margin-bottom: 0;margin-top: 20px;">'.date("Y").'  <br>'.date("M").'</p>
				                	<p style="font-size: 50px;margin: 0px">'.date("d").'</p>
				                	<p style="margin-top: 5px;font-size: 10px;">| Dasboard</p>
				                </a></li>';
        $data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Profile").'>Profile</a></li>';
		$this->template->load('template_backend', 'backend/profile/index', $data);
	}
}
?>