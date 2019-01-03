<?php
/**
 *
 */
class Model_sumberdata extends CI_Model
{	
	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
	}

	public function datasource()
	{
		$tables = $this->db->query("SELECT t.TABLE_NAME FROM INFORMATION_SCHEMA.TABLES AS t WHERE t.TABLE_SCHEMA = 'nakertrans' AND t.TABLE_NAME LIKE 'data%' ")->result_array();
		// foreach($tables as $key => $val) {
		// 	echo $val['myTables']."<br>";// myTables is the alias used in query.
		// }
		return $tables;
	}

	public function sortir_datasource($opt, $sort, $name)
	{
		$sortir = "ORDER BY t.TABLE_NAME ".$sort;

			$tables = $this->db->query("SELECT t.TABLE_NAME FROM INFORMATION_SCHEMA.TABLES AS t WHERE t.TABLE_SCHEMA = 'nakertrans' AND t.TABLE_NAME LIKE 'data%' ".$sortir)->result_array();
			
			for ($i=0; $i < count($tables); $i++) { 
				$sum[] = $this->db->query("SELECT MAX(".$tables[$i]['TABLE_NAME'].".id) AS sumdata FROM ".$tables[$i]['TABLE_NAME'])->result_array();
			}

			for ($i=0; $i < count($tables); $i++) { 
				$data[] = array(
					"TABLE_NAME"=>$tables[$i]['TABLE_NAME'],
					"SUMDATA"=>$sum[$i][0]['sumdata'],
				);
			}

		return $data;
	}

	public function importdata($nametable, $data) {
		$head = str_replace(" ","_",$data['header']);
		$sql1 = "CREATE TABLE data_".$nametable." (
		id INT (11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		`".implode('` TEXT ,`', $head)."` TEXT
		)";

		$this->db->query($sql1);
		
		$tes = array();
		for ($i=0; $i < count($data['values']); $i++) { 
			// $sql2 = "INSERT INTO data_".$nametable." VALUES (NULL,"."'".implode("','", $data['values'][$i])."'".")";
			for ($j=0; $j < count($data['header']); $j++) { 
				array_push($tes, $data['values'][$i][$data['header'][$j]]);
			}

			$sql2 = 'INSERT INTO data_'.$nametable.' VALUES (NULL,'.'"'.implode('","', $tes).'"'.')';
			$this->db->query($sql2);
			// $this->db->query($sql2);
			unset($tes);
			$tes = array();
		}

		$sql3 = "ALTER TABLE data_".$nametable." ADD `validasi` VARCHAR(255) NOT NULL DEFAULT 'belum', ADD `tercapai` VARCHAR(255) NOT NULL,  ADD `referensi` VARCHAR(255) NOT NULL";
		return $this->db->query($sql3);
	}

	public function publikasi($data_publikasi)
	{
		return $this->db->insert('master_sumberdata', $data_publikasi);
	}

	public function importdata_api($nametable, $data) {

		$sql1 = "CREATE TABLE data_".$nametable." (
		id INT (11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		".implode(' TEXT ,', str_replace(" ","_",$data['header']))." TEXT
		)";

		$this->db->query($sql1);

		for ($i=0; $i < count($data['values']); $i++) { 
			$sql2 = 'INSERT INTO data_'.$nametable.' VALUES (NULL,'.'"'.implode('","', $data['values'][$i]).'"'.')';
			$this->db->query($sql2);
		}

		$sql3 = "ALTER TABLE data_".$nametable." ADD `validasi` VARCHAR(255) NOT NULL DEFAULT 'belum', ADD `tercapai` VARCHAR(255) NOT NULL,  ADD `referensi` VARCHAR(255) NOT NULL";
		$this->db->query($sql3); 
		return "success";
	}

	public function dropdata($nametable){
		$sql1 = "DROP TABLE ".$nametable;
		$this->db->query($sql1);
		$this->db->where('data_source', $nametable)->delete('master_sumberdata');
	}

	public function headerdata($nametable)
	{
		$sql1 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'nakertrans' AND TABLE_NAME = '".$nametable."'";
		$data = $this->db->query($sql1)->result_array();
		return $data;
	}

	public function valuesdata($nametable)
	{
		$sql1 = "SELECT * FROM ".$nametable;
		$data = $this->db->query($sql1)->result_array();
		return $data;
	}

	public function valuesdata_sorting($nametable, $kolom, $data_valid, $kriteria)
	{	
		$kol = "";
		for ($i=0; $i < count($kolom); $i++) { 
			$kol .= " ".$kolom[$i].","; 
		}
		$newarraykolom=substr_replace($kol ,"", -1);
		$sql1 = "SELECT ".$newarraykolom." FROM ".$nametable;
		
		if($data_valid !="" || $kriteria !=""){
			$sql1 .= " WHERE";
		}

		if ($data_valid !="") {
			$sql1 .= " validasi = '".$data_valid."'";
		}

		// if ($kriteria !="") {
		// 	$sql1 .= " validasi = '".$data_valid."'";
		// }

		$data = $this->db->query($sql1)->result_array();
		return $data;
	}

	public function valuesdata2($nametable, $header, $search)
	{
		$sql1 = "SELECT * FROM ".$nametable." WHERE ";
		for ($i=0; $i <= count($header); $i++) { 
			if (isset($header[$i])){
				$sql1 .=" ".$header[$i]['COLUMN_NAME']." LIKE '%".$search."%' OR ";
			}
		}
		$newarraynama=substr_replace($sql1 ,"", -3);

		$data = $this->db->query($newarraynama)->result_array();
		return $data;
	}

	public function valuesdata_wkriteria($nametable, $kriteria, $kriteria_value)
	{

		$sql1 = "SELECT * FROM ".$nametable."";

		if($kriteria != ""){
			$sql1 .= " WHERE ".$kriteria."='".$kriteria_value."'";
		}
		
		$data = $this->db->query($sql1)->result_array();
		return $data;
	}

	public function valuesdata_wkriteria_sorting($nametable, $kriteria, $kriteria_value, $kolom)
	{

		$kol = "";
		for ($i=0; $i < count($kolom); $i++) { 
			$kol .= " ".$kolom[$i].","; 
		}
		$newarraykolom=substr_replace($kol ,"", -1);
		$sql1 = "SELECT ".$newarraykolom." FROM ".$nametable;
		
		if($kriteria != ""){
			$sql1 .= " WHERE ".$kriteria."='".$kriteria_value."'";
		}
		
		$data = $this->db->query($sql1)->result_array();
		return $data;
	}

	public function validasi_sumberdata($nametable, $header, $value)
	{
		$sql1 = "UPDATE ".$nametable." SET validasi='valid' WHERE ";
		for ($i=0; $i <= count($header); $i++) { 
			if (isset($header[$i])){
				$sql1 .=" ".$header[$i]['COLUMN_NAME']." IN (".$value.") OR ";
			}
		}
		$newarraynama=substr_replace($sql1 ,"", -3);

		$data = $this->db->query($newarraynama);

		return $data;
	}

	public function belum_valid($nametable)
	{
		return $this->db->query("UPDATE ".$nametable." SET validasi = 'tidak ditemukan' WHERE validasi = 'belum' OR validasi = '' ");
	}

	// for front end
	public function datasource_spasial()
	{
		$tables = $this->db->select('*')
						->where('publikasi', 'Ya')
						->get('master_sumberdata')
						->result();

		return $tables;
	}
}
?>
