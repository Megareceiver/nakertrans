<?php
/**
 *
 */
class Model_data_spasial extends CI_Model
{	
	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
    }

    public function all_data()
    {
        return $this->db->select('*')
                        ->get('master_spasial')
                        ->result();
    }

    public function sum_data()
    {
        return $this->db->from('master_spasial')->count_all_results();
    }

    public function add($data)
    {
        return $this->db->insert('master_spasial', $data);
    }

    public function get_data_edit($id)
	{
		return $this->db->select('*')->where('id', $id)->get('master_spasial')->row();
    }
    
    public function edit($id, $data)
    {
        return $this->db->where('id', $id)->update('master_spasial', $data);
    }

    public function hapus($id)
    {
        return $this->db->where('id', $id)->delete('master_spasial');
    }
}
?>