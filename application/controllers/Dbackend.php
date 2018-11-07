<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbackend extends CI_Controller {

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
		 $this->load->model('Model_bdashboard');
  	 }

	public function index()
	{
		if ($this->session->userdata("status_login") == 1){
			$data['menuaction'] ='<li><a href="">
				                	<p class="naker-d2">'.date("Y").'  <br>'.date("M").'</p>
				                	<p class="naker-y2">'.date("d").'</p>
				                	<p class="naker-l2">| Dasboard</p>
								</a></li>';
			$data['breadcumbs'] ='';

			$data['master_spasial'] = $this->Model_bdashboard->get_all_spasial();
			
			$data_ = array();
			for ($i=0; $i < count($data['master_spasial']); $i++) { 
				$d =  $this->Model_bdashboard->get_data_from_source($data['master_spasial'][$i]->data_source, $data['master_spasial'][$i]->grouping);	
				array_push($data_, $d);
			}

			$data['chart'] = $data_;

			$this->template->load('template_backend', 'backend/dashboard', $data);
		}else{
			redirect(base_url());
		}
	}

	public function spasial_chart()
	{
		$data['master_spasial'] = $this->Model_bdashboard->get_all_spasial();

		echo json_encode($data['master_spasial']);
	}

	public function spasial_data($data_source, $grouping)
	{
		$da = explode(",",$data_source);
		$g = explode(",",$grouping);

		$dat['hasil'] = array();

		for ($i=0; $i < sizeof($da); $i++) { 
			# code...
		
			$d =  $this->Model_bdashboard->get_data_from_source($da[$i], $g[$i]);

			$label = array();
			$count = array();
			foreach ($d as $d_) {
				array_push($label,$d_->labels);
				array_push($count,$d_->data);
			}
			
			$data = array(
				"label" => $label,
				"data" => $count
			);

			array_push($dat['hasil'], $data);
		}

		echo json_encode($dat['hasil']);
	}
}
?>