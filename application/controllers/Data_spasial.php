<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_spasial extends CI_Controller {

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
         $this->load->model('Model_data_spasial');
         $this->load->model('Model_sumberdata');
  	 }

	public function index()
	{
		if ($this->session->userdata("status_login") == 1){
            $data['menuaction'] ='
            <li class="naker-action">
                <a href="#modal-tambah" uk-toggle>Tambah</a></li>
            ';
            $data['breadcumbs'] ='<li class="naker-breadcumbs"><a href='. site_url("Data_spasial").'>Diagram</a></li>';
            $data['data_spasial'] = $this->Model_data_spasial->all_data();
            $data['sum_spasial'] = $this->Model_data_spasial->sum_data();
            $data['sumberdata'] = $this->Model_sumberdata->datasource();
            
			$this->template->load('template_backend', 'backend/data_spasial/index', $data);
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
        $judul = $_POST['judul'];
        $tipe = $_POST['tipe'];
        $data_source = $_POST['data_source'];
        $grouping = $_POST['grouping'];

        $data = array(
            "judul" => $judul,
            "tipe" => $tipe,
            "data_source" => $data_source,
            "grouping" => $grouping
        );

        $this->Model_data_spasial->add($data);
        redirect(site_url('Data_spasial'));
    }

    public function get_data_edit($id)
    {
        $data = $this->Model_data_spasial->get_data_edit($id);
        echo json_encode($data);
    }

    public function edit_()
    {   
        $id = $_POST['id2'];
        $judul = $_POST['judul2'];
        $tipe = $_POST['tipe2'];
        $data_source = $_POST['data_source2'];
        $grouping = $_POST['grouping2'];

        $data = array(
            "judul" => $judul,
            "tipe" => $tipe,
            "data_source" => $data_source,
            "grouping" => $grouping
        );

        $this->Model_data_spasial->edit($id, $data);
        redirect(site_url('Data_spasial'));
    }

    public function hapus_($id)
    {
        $this->Model_data_spasial->hapus($id);
        redirect(site_url('Data_spasial'));
    }

    public function hapus_multiple($id)
    {
        $this->Model_data_spasial->hapus($id);
    }
}
?>