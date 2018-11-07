<?php
/**
 *
 */
class Model_berita extends CI_Model
{	
	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
    }

    public function get_all()
    {
        return $this->db->select('*')
                        ->get('master_berita')
                        ->result();
    }

    public function get_all_detail($id)
    {
        return $this->db->select('*')
                        ->where('id_berita', $id)
                        ->get('detail_berita')
                        ->result();
    }

    public function get_data($id)
    {
        return $this->db->select('*')
                        ->from('master_berita')
                        ->where('id', $id)
                        ->get()
                        ->result();
    }

    public function get_detail($id, $tipe)
    {
        return $this->db->select('*')
                        ->from('detail_berita')
                        ->where('id_berita', $id)
                        ->where('tipe', $tipe)
                        ->get()
                        ->result();
    }

    public function add_($data)
    {
        return $this->db->insert('master_berita', $data);
    }

    public function edit_($id, $data)
    {
        return $this->db->where('id', $id)->update('master_berita', $data);
    }

    public function tambah_detail($data)
    {
        return $this->db->insert('detail_berita', $data);
    }

    public function get_($judul)
    {
        return $this->db->select('*')
                        ->from('master_berita')
                        ->where('judul_berita', $judul)
                        ->get()->result();
    }

    public function hapus_($id)
    {
        return $this->db->where('id', $id)->delete('master_berita');
    }

    public function hapus_detail($id)
    {
        return $this->db->where('id_berita', $id)->delete('detail_berita');
    }

    public function hapus_detail2($id)
    {
        return $this->db->where('id', $id)->delete('detail_berita');
    }
}
?>