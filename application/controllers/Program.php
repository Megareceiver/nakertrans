<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

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
         $this->load->model('Model_program');
         $this->load->model('Model_sumberdata');
  	 }

	public function index()
	{
        if ($this->session->userdata("status_login") == 1){
            $data['menuaction'] ='
            <li class="naker-action">
                <a href="#modal-tambah" uk-toggle>Tambah</a></li>
            <li class="naker-action">
                <a onclick="hapus()">Hapus</a></li>
            ';
            $data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Program").'>Program</a></li>';
            $data['program'] = $this->Model_program->get_all();
            $data['sumberdata'] = $this->Model_sumberdata->datasource();
            
			$this->template->load('template_backend', 'backend/program/index', $data);
		}else{
			redirect(base_url());
		}
    }

    public function get_cloumn_data_source($nametable)
    {
        $column_header = $this->Model_sumberdata->headerdata($nametable);
        echo json_encode($column_header);
    }

    public function add_()
    {
        $nama_program = $_POST['nama_program'];
        $sumber_data = $_POST['data_source'];
        $kriteria = $_POST['grouping'];
        $kriteria_value = $_POST['kriteria_value'];
        $tanggal_mulai = $_POST['tanggal_mulai'];
        $tanggal_selesai = $_POST['tanggal_selesai'];

        $data = array(
            "nama_program" => $nama_program,
            "sumber_data" => $sumber_data,
            "kriteria" => $kriteria,
            "kriteria_value" => $kriteria_value,
            "tanggal_mulai" => $tanggal_mulai,
            "tanggal_selesai" => $tanggal_selesai,
        );

        $this->Model_program->add_($data);
        redirect(site_url('Program'));
    }

    public function edit_()
    {   
        $id = $_POST['id2'];
        $nama_program = $_POST['nama_program2'];
        $sumber_data = $_POST['data_source2'];
        $kriteria = $_POST['grouping2'];
        $kriteria_value = $_POST['kriteria_value2'];
        $tanggal_mulai = $_POST['tanggal_mulai2'];
        $tanggal_selesai = $_POST['tanggal_selesai2'];

        $data = array(
            "nama_program" => $nama_program,
            "sumber_data" => $sumber_data,
            "kriteria" => $kriteria,
            "kriteria_value" => $kriteria_value,
            "tanggal_mulai" => $tanggal_mulai,
            "tanggal_selesai" => $tanggal_selesai,
        );

        $this->Model_program->edit_($id, $data);
        redirect(site_url('Program'));
    }

    public function hapus_($id)
    {
        $this->Model_program->hapus_($id);
        redirect(site_url('Program'));
    }

    public function hapus_multiple($id)
    {
        $this->Model_program->hapus_($id);
    }

    public function get_data_edit($id)
    {
        $data = $this->Model_program->get_data_edit($id);
        echo json_encode($data);
    }

    public function detail_data($table_name, $nama_program, $kriteria="", $kriteria_value="")
	{
        if($kriteria_value != ""){
            $kriteria_value = str_replace("%20"," ", $kriteria_value);
        }

		$data['header'] = $this->Model_sumberdata->headerdata($table_name);
        $data['values'] = $this->Model_sumberdata->valuesdata_wkriteria($table_name, $kriteria, $kriteria_value);
        
		$data['menuaction'] ='
			<li class="naker-action">
                <a href="'.site_url('Program').'">Kembali</a></li>
			<li class="naker-action">
				<a href="#modal-sortir" uk-toggle>Filter</a></li>';
		$data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Program").'>Program</a></li><li class="naker-breadcumbs"><a href='. site_url("Program/detail_data/".$table_name."/".$kriteria."/".$kriteria_value."/".$nama_program).'>'.str_replace("%20"," ",$nama_program).'</a></li>';
		
		$this->template->load('template_backend', 'backend/program/detail', $data);
	}
}
?>