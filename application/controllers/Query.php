<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Controller {

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
		 $this->load->model('Model_query');
		 $this->load->model('Model_sumberdata');
  	 }

	public function index()
	{
        if ($this->session->userdata("status_login") == 1){
			$data['menuaction'] ='';
			$data['sumberdata'] = $this->Model_sumberdata->datasource();
            $data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Query").'>Query</a></li>';
            
			$this->template->load('template_backend', 'backend/query/index', $data);
		}else{
			redirect(base_url());
		}
    }

    public function hasil_query()
    {
		$valquery = $_REQUEST['valq'];
		$sumberdata = $_REQUEST['sdata'];
		$header = $this->Model_query->headerdata($sumberdata);
		$data['value'] = $this->Model_query->valuedata($valquery, $sumberdata, $header);
		echo json_encode($data);
	}
	
	public function hasil_spasial()
    {
		$valquery = $_REQUEST['valq'];
		$sumberdata = $_REQUEST['sdata'];
		$field = $_REQUEST['sfield'];

		$data['header'] = $field;
		$data['value'] = $this->Model_query->valuedata_spasial($valquery, $sumberdata, $field);

		echo json_encode($data);
	}
	
	public function getprovinsi()
	{
		// $kecamatan = $_REQUEST['val'];
		$provinsi = $this->Model_query->getprovinsi();
		echo json_encode($provinsi);
	}

	public function getdaerah()
	{
		$kel = $_REQUEST['kel'];
		$kec = $_REQUEST['kec'];
		$daerah = $this->Model_query->getdaerah($kel, $kec);
		echo json_encode($daerah);
	}

	public function getkelkec()
	{
		$kab = $_REQUEST['kab'];
		$kec = $_REQUEST['kec'];
		$daerah = $this->Model_query->getkelkec($kab, $kec);
		echo json_encode($daerah);
	}
}
?>