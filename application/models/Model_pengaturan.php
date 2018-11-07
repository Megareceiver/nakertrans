<?php
/**
 *
 */
class Model_pengaturan extends CI_Model
{	
	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
    }

    public function get_user()
    {
        return $this->db->select('*')
                        ->from('users')
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

    public function get_program()
    {
        return $this->db->select('*')
                        ->from('master_program')
                        ->get()
                        ->result();
    }

    public function tambah_slide($data)
    {
        return $this->db->insert('master_slide', $data);
    }

    public function hapus_slide($id)
    {
        return $this->db->where('id', $id)->delete('master_slide');
    }

    public function get_slide_($id)
    {
        return $this->db->select('*')
                        ->from('master_slide')
                        ->where('id', $id)
                        ->get()
                        ->row();
    }

    public function get_data_user($id)
    {
        return $this->db->select('*')
                        ->from('users')
                        ->where('id', $id)
                        ->get()
                        ->row();
    }

    public function tambah_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function edit_user($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }
}
?>