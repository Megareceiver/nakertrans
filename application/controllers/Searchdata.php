<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchdata extends CI_Controller {

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
         $this->load->model('Model_sumberdata');
  	 }

	public function index()
	{
        if ($this->session->userdata("status_login") == 1){
            $search = $_POST['search'];
            
            $data['table'] = $this->Model_sumberdata->datasource();
            $header = array();
            $value = array();
            for ($i=0; $i < count($data['table']); $i++) { 
                array_push($header, $this->Model_sumberdata->headerdata($data['table'][$i]['TABLE_NAME']));
                array_push($value, $this->Model_sumberdata->valuesdata2($data['table'][$i]['TABLE_NAME'], $this->Model_sumberdata->headerdata($data['table'][$i]['TABLE_NAME']), $search));
                // echo json_encode($value);
            }
            $data['header'] = $header;
            $data['value'] = $value;
            $data['search'] = $search;
            
			$data['menuaction'] ='<li class="naker-action">
            <a href="'.site_url('Dbackend').'" >Kembali</a></li>';

            $data['breadcumbs'] ='<li class="naker-breadcumbs">Hasil pencarian</li>';
            
            $this->template->load('template_backend', 'backend/search/index', $data);
		}else{
			redirect(base_url());
		}
    }
}
?>