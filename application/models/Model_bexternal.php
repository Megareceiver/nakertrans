<?php
/**
 *
 */
class Model_bexternal extends CI_Model
{	
	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
	}
	
	public function get_data_program($namaprogram)
	{
		return $this->db->select('*')
						->where('nama_program', $namaprogram)
						->get('master_program')
						->row();
	}

	public function update_program_sumberdata($namatable, $header, $values)
	{
		$sql1 = "UPDATE ".$namatable." SET tercapai='ya' , referensi = '".$values['referensi']."' WHERE ";
		// ('".implode("','", $values)."')
		for ($i=0; $i <= count($header); $i++) { 
			if (isset($header[$i])){
				$sql1 .=" ".$header[$i]['COLUMN_NAME']." IN ('".implode("','", $values)."') OR";
			}
		}
		$newquery=substr_replace($sql1 ,"", -3);
		$data = $this->db->query($newquery);
		return $data;
	}

	public function tidak_tercapai($nametable)
	{
		return $this->db->query("UPDATE ".$nametable." SET tercapai = 'tidak' WHERE validasi = '' OR referensi = '' ");
	}

	public function update_persentase_program($namaprogram, $persentase)
	{
		return $this->db->where('nama_program', $namaprogram)->update('master_program', array("pencapaian"=>$persentase));
	}
}
?>