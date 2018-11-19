<?php
/**
 *
 */
class Model_profile extends CI_Model
{	
	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
    }
	// core
		public function tambah_($data)
		{
			return $this->db->insert('master_profile', $data);
		}

		public function hapus_($kategori, $id)
		{
			return $this->db->where('kategori', $kategori)
							->where('id', $id)
							->delete('master_profile');
		}

	// sejarah
		public function get_sejarah()
		{
			$data = $this->db->select('*')
						->where('kategori', 'sejarah')
						->get('master_profile')
						->result();
			return $data;
		}

	// visi misi
		public function get_visi()
		{
			$data = $this->db->select('*')
						->where('kategori', 'visi')
						->get('master_profile')
						->result();
			return $data;
		}

		public function get_misi()
		{
			$data = $this->db->select('*')
						->where('kategori', 'misi')
						->get('master_profile')
						->result();
			return $data;
		}
	// tupoksi
		public function get_kepbag()
		{
			$data = $this->db->select('*')
						->where('kategori', 'kepbag')
						->get('master_profile')
						->result();
			return $data;
		}

		public function get_subbag()
		{
			$data = $this->db->select('*')
						->where('kategori', 'subbag')
						->get('master_profile')
						->result();
			return $data;
		}

		public function get_seksi()
		{
			$data = $this->db->select('*')
						->where('kategori', 'seksi')
						->get('master_profile')
						->result();
			return $data;
		}
	// data publikasi
		public function get_dapub()
		{
			$data = $this->db->select('*')
						->where('kategori', 'dapub')
						->get('master_profile')
						->result();
			return $data;
		}

		public function get_dapub_row($id)
		{
			$data = $this->db->select('*')
						->where('kategori', 'dapub')
						->where('id', $id)
						->get('master_profile')
						->row();
			return $data;
		}

	// galeri
		public function get_galeri()
		{
			$data = $this->db->select('*')
						->where('kategori', 'galeri')
						->get('master_profile')
						->result();
			return $data;
		}
}
?>