<?php
/**
 *
 */
class Model_query extends CI_Model
{	
	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
    }

    public function lihat()
    {
        return $this->db->query('SELECT * FROM data_TKI')->result_array();
    }
}
?>