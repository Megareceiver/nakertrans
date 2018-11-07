<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dexternal extends CI_Controller {

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
		 $this->load->model('Model_bexternal');
		 $this->load->model('Model_sumberdata');
  	 }

	public function index()
	{
		$this->template->load('template_external', 'external/index', '');
	}

	public function hasil_pencapaian($program)
	{
		$program = str_replace("%20"," ",$program);
		$tmp = $_FILES['file']['tmp_name'];

		$this->load->library('excel');
		
		$read   = PHPExcel_IOFactory::createReaderForFile($tmp);
		$read->setReadDataOnly(true);
		$excel  = $read->load($tmp);
		$sheets = $read->listWorksheetNames($tmp);

		foreach($sheets as $sheet){

			$_sheet = $excel->setActiveSheetIndexByName($sheet);//Kunci sheetnye biar kagak lepas :-p
			$maxRow = $_sheet->getHighestRow();
			$maxCol = $_sheet->getHighestColumn();
			$field  = array();
			$sql    = array();
			$value  = array();
			$maxCol = range('A',$maxCol);

			foreach($maxCol as $key => $coloumn){
				$field[$key]    = $_sheet->getCell($coloumn.'1')->getCalculatedValue();//Kolom pertama sebagai field list pada table
			}

			for($i = 2; $i <= $maxRow; $i++){
				foreach($maxCol as $k => $coloumn){
					$sql[$field[$k]]  = $_sheet->getCell($coloumn.$i)->getCalculatedValue();
				}
				array_push($value, $sql);
			}
		}

		// $data['header'] = $field;
		$data['values'] = $value;
		$data_program = $this->Model_bexternal->get_data_program($program);
		$header = $this->Model_sumberdata->headerdata($data_program->sumber_data);
		// echo "<pre>";
		// echo $data_program->sumber_data;
		// echo "</pre>";

		// echo "<pre>";
		// echo json_encode($data['values']);
		// echo "</pre>";

		for ($i=0; $i < count($data['values']); $i++) { 
			
			$this->Model_bexternal->update_program_sumberdata($data_program->sumber_data, $header, $data['values'][$i]);
			
		}

		$this->Model_bexternal->tidak_tercapai($data_program->sumber_data);

		redirect( site_url('Dexternal/hasil_/'.str_replace(" ","%20",$program)));
	}

	public function hasil_($program)
	{
		$program = str_replace("%20"," ",$program);
		$data_program = $this->Model_bexternal->get_data_program($program);
		$data['header'] = $this->Model_sumberdata->headerdata($data_program->sumber_data);
		$data['values'] = $this->Model_sumberdata->valuesdata($data_program->sumber_data);

		$tercapai = array();
		$tidak_tercapai = array();
		for ($i=0; $i < count($data['values']); $i++) { 
			if ($data['values'][$i]['tercapai'] == "ya"){
				array_push($tercapai, $data['values'][$i]);
			}else{
				array_push($tidak_tercapai, $data['values'][$i]);
			}
		}

		$persentase = (count($tercapai) / count($data['values'])) * 100;
		$this->Model_bexternal->update_persentase_program($program, $persentase);
		
		$this->template->load('template_external', 'external/hasil', $data);
	}
}
?>