<?php
/**
 *
 */
class Model_bdashboard extends CI_Model
{	
	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
    }

    public function get_all_spasial()
    {
        return $this->db->select("*")
                        ->from("master_spasial")
                        ->order_by("id","ASC")
                        ->get()->result();
    }

    public function get_data_from_source($tablename, $grouping)
    {
        $tables = $this->db->query("SELECT ".$grouping." AS labels, COUNT(".$grouping.") as data FROM ".$tablename." GROUP BY ".$grouping)->result();
        return $tables;
    }
}
?>