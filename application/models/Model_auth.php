<?php
/**
 *
 */
class Model_auth extends CI_Model
{	
	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
    }

    public function checkuser($username)
    {
        return $this->db->select('*')
                        ->where('username', $username)
                        ->get('users')
                        ->row();
    }

    public function checklogin($username, $password)
    {
        return $this->db->select('*')
                        ->from('users')
                        ->where('username', $username)
                        ->where('password', md5($password))
                        ->get()
                        ->row();
    }
}
?>