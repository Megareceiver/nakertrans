<?php
/**
 *
 */
class Model_program extends CI_Model
{	
	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
    }

    public function get_all()
    {
        return $this->db->select('*')
                        ->get('master_program')
                        ->result();
    }

    public function add_($data)
    {
        return $this->db->insert('master_program', $data);
    }

    public function edit_($id, $data)
    {
        return $this->db->where('id', $id)->update('master_program', $data);
    }

    public function hapus_($id)
    {
        return $this->db->where('id', $id)->delete('master_program');
    }

    public function get_data_edit($id)
	{
		return $this->db->select('*')->where('id', $id)->get('master_program')->row();
    }
}
?>