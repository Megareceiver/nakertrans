<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sumberdata extends CI_Controller {

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
	     $this->load->library('Excel_reader');
		 $this->load->model('Model_sumberdata');
		 $this->load->library('excel');

  	 }

	public function index()
	{
		if ($this->session->userdata("status_login") == 1){
			$data['menuaction'] ='
				<li class="naker-action">
					<a href="#modal-import" uk-toggle>Import</a>
				</li>
				<li class="naker-action">
					<a href="#modal-export" onclick="gettable()" uk-toggle>Export</a></li>
				<li class="naker-action">
					<a href="#modal-sortir" uk-toggle>Sortir</a></li>
				<li class="naker-action">
					<a onclick="hapus()">Hapus</a></li>';
			$data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Sumberdata").'>Sumber Data</a></li>';
			$data['datasource'] = $this->Model_sumberdata->datasource();

			$this->template->load('template_backend', 'backend/sumberdata/index', $data);
		}else{
			redirect(base_url());
		}
	}

	public function datasource()
	{
		$data = $this->Model_sumberdata->datasource();
		echo json_encode($data);
	}

	public function sortir_datasource()
	{
		$data_opt = $_POST['data_opt'];
		$data_sort = $_POST['data_sort'];
		$table_name = $_POST['table_name'];

		$data['menuaction'] ='
				<li class="naker-action">
					<a href="#modal-import" uk-toggle>Import</a>
				</li>
				<li class="naker-action">
					<a href="#modal-export" onclick="gettable()" uk-toggle>Export</a></li>
				<li class="naker-action">
					<a href="#modal-sortir" uk-toggle>Sortir</a></li>
				<li class="naker-action">
					<a>Hapus</a></li>';
		$data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Sumberdata").'>Sumber Data</a></li>';
		$data['datasource'] = $this->Model_sumberdata->sortir_datasource($data_opt, $data_sort, $table_name);
		// echo json_encode($data);
		$this->template->load('template_backend', 'backend/sumberdata/index', $data);
	}

	public function importdata()
	{
		$nametable = $_POST['nametable'];
		$tmp = $_FILES['file']['tmp_name'];
		$publikasi = $_POST['publikasi'];

		$nametable = str_replace(" ","_",$nametable);

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
				$col[$key]	= $coloumn.'1';
			}

			for($i = 2; $i <= $maxRow; $i++){
				foreach($maxCol as $k => $coloumn){
					$sql[$field[$k]]  = $_sheet->getCell($coloumn.$i)->getCalculatedValue();
				}
				array_push($value, $sql);
			}
		}

		$data['nametable'] = $nametable;
		$data['header'] = $field;
		$data['header_column'] = $col;
		$data['values'] = $value;
		$data['publikasi'] = $publikasi;

		echo json_encode($data);
		// $this->Model_sumberdata->importdata($nametable, $data);
		
		// redirect(site_url('Sumberdata'));
	}

	public function submitimport()
	{
		$nametable = $_POST['nametable'];
		$tmp = $_FILES['file']['tmp_name'];
		$publikasi = $_POST['publikasi'];

		$nametable = str_replace(" ","_",$nametable);

		$this->load->library('excel');
		
		$read   = PHPExcel_IOFactory::createReaderForFile($tmp);
		$read->setReadDataOnly(true);
		$excel  = $read->load($tmp);
		$sheets = $read->listWorksheetNames($tmp);

		foreach($sheets as $sheet){

			$_sheet = $excel->setActiveSheetIndexByName($sheet);//Kunci sheet
			$maxRow = $_sheet->getHighestRow();
			$maxCol = $_sheet->getHighestColumn();
			$field  = array();
			$sql    = array();
			$value  = array();
			$maxCol = range('A',$maxCol);

			foreach($maxCol as $key => $coloumn){
				$field[$key]    = strtolower($_sheet->getCell($coloumn.'1')->getCalculatedValue());//Kolom pertama sebagai field list pada table
			}

			for($i = 2; $i <= $maxRow; $i++){
				foreach($maxCol as $k => $coloumn){
					$sql[$field[$k]]  = $_sheet->getCell($coloumn.$i)->getCalculatedValue();
				}
				array_push($value, $sql);
			}
		}

		sort($field);

		$data['header'] = $field;
		$data['values'] = $value;

		$data_publikasi = array(
			"data_source" => "data_".$nametable,
			"publikasi" => $publikasi,
			"dibuat" => date('Y-m-d'),
		);

		$first = $this->Model_sumberdata->importdata($nametable, $data);
		echo json_encode($first);
		die;
		if($first == true){
			$second = $this->Model_sumberdata->publikasi($data_publikasi);
			echo json_encode($second);
		}else{
			redirect(site_url('Sumberdata'));
		}
	}

	public function import_fapi($nametable)
	{
		$header = $_REQUEST['header'];
		$value = $_REQUEST['value'];

		$nametable = str_replace("%20","_",$nametable);
		$data['header'] = $header;
		$data['values'] = $value;

		$return = $this->Model_sumberdata->importdata_api($nametable, $data);
		echo json_encode($return);
	}
	 
	public function droptable($namesource)
	{
		$this->Model_sumberdata->dropdata($namesource);
		redirect(site_url('Sumberdata'));
	}

	public function drop_multipe($namesource)
	{
		$this->Model_sumberdata->dropdata($namesource);
		// echo json_encode($namesource);
	}

	public function exportdata_multiple()
	{

		$name_table = $_POST['table_name'];

		for ($i=0; $i < count($name_table); $i++) { 

			$query[$i] = $this->db->get($name_table[$i]);

			// if(!$query[$i])
			// return false;
			// Starting the PHPExcel library
			
			//load our new PHPExcel library
			$this->load->library('excel');
			//activate worksheet number 1
			$this->excel->setActiveSheetIndex(0);
			//name the worksheet
			$this->excel->getActiveSheet()->setTitle('Users list');
			$fields = $query[$i]->list_fields();
			$col = 0;
			foreach ($fields as $field)
			{
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
				$col++;
			}
			// Fetching the table data
			$row = 2;
			foreach($query[$i]->result() as $data)
			{
				$col = 0;
				foreach ($fields as $field)
				{
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
					$col++;
				}
				$row++;
			}
			$this->excel->setActiveSheetIndex(0);
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
			// Sending headers to force the user to download the file
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="data_'.$name_table[$i].'.xlsx"');
			header('Cache-Control: max-age=0');
			$objWriter->save('php://output');
		}
		redirect(site_url('Sumberdata'));
	}

	public function exportdata($table_name)
	{

		$name_table = $table_name;

		$query = $this->db->get($name_table);

		if(!$query)
		return false;
		// Starting the PHPExcel library
		
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Users list');
		// Field names in the first row
		$fields = $query->list_fields();
		$col = 0;
		foreach ($fields as $field)
		{
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
			$col++;
		}
		// Fetching the table data
		$row = 2;
		foreach($query->result() as $data)
		{
			$col = 0;
			foreach ($fields as $field)
			{
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
				$col++;
			}
			$row++;
		}
		$this->excel->setActiveSheetIndex(0);
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		// Sending headers to force the user to download the file
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$name_table.'.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
		
		redirect(site_url('Sumberdata'));
	}

	public function detail_data($table_name)
	{

		if(isset($_POST['data_valid'])){
			$data_valid = $_POST['data_valid'];
			$kriteria = $_POST['kriteria'];
			$kolom = $_POST['kolom'];
			$head = array();

			for ($i=0; $i < count($kolom); $i++) { 
				array_push($head, array("COLUMN_NAME"=>$_POST['kolom'][$i]));
			}

			$data['header'] = $head;
			$data['values'] = $this->Model_sumberdata->valuesdata_sorting($table_name, $kolom, $data_valid, $kriteria);
			// echo json_encode($data);
			// die();
		}else{
			$data['header'] = $this->Model_sumberdata->headerdata($table_name);
			$data['values'] = $this->Model_sumberdata->valuesdata($table_name);
		}
		$data['header2'] = $this->Model_sumberdata->headerdata($table_name);
		
		$data['table_name'] = $table_name;
		$data['menuaction'] ='
			<li class="naker-action">
                <a href="'.site_url('Sumberdata').'">Kembali</a></li>
			<li class="naker-action">
				<a href="#modal-sortir" uk-toggle>Filter</a></li>';
		$data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Sumberdata").'>Sumber Data</a></li><li class="naker-breadcumbs"><a href='. site_url("Sumberdata/detail_data/".$table_name).'>'.str_replace("_"," ",$table_name).'</a></li>';
		
		$this->template->load('template_backend', 'backend/sumberdata/detail', $data);


	}

	public function get_data_($table_name)
	{
		$data = $this->Model_sumberdata->valuesdata($table_name);
		echo json_encode($data);
	}

	public function validasi_data($table_name)
	{
		$header = $_REQUEST['header'];
		$value = $_REQUEST['value'];

		$forvalidate = $value['noRegistrasi'];

		$header_table = $this->Model_sumberdata->headerdata($table_name);
		$data = $this->Model_sumberdata->validasi_sumberdata($table_name,$header_table, $forvalidate);

		echo json_encode($data);
	}

	public function validasi_belum($table_name)
	{
		$data = $this->Model_sumberdata->belum_valid($table_name);
		echo json_encode($data);
	}
	
}
?>