<?php
/**
 *
 */
class Model_bfrontend extends CI_Model
{	
	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
    }

    public function get_berita_terkini()
    {
        return $this->db->query("SELECT id, judul_berita, gambar_utama, tanggal AS history FROM master_berita")->result();
    }

    public function get_all_detail_berita($id)
    {
        return $this->db->select('*')
                        ->where('id_berita', $id)
                        ->get('detail_berita')
                        ->result();
    }

    public function get_data_berita($id)
    {
        return $this->db->select('*')
                        ->from('master_berita')
                        ->where('id', $id)
                        ->get()
                        ->result();
    }

    public function get_slide()
    {
        return $this->db->select('*')
                        ->from('master_slide')
                        ->get()
                        ->result();
    }
}
?>