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


    // sementara sebelum ada api
    public function headerdata($sumberdata)
    {
        $sql1 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'nakertrans' AND TABLE_NAME = '$sumberdata'";
        $dataheader = $this->db->query($sql1)->result_array();

        return $dataheader;
    }

    public function valuedata($valquery, $sumberdata)
    {
        $sql1 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'nakertrans' AND TABLE_NAME = '$sumberdata'";
        $dataheader = $this->db->query($sql1)->result_array();
        
        $where = '';
        $val = '';
        
		for ($j=0; $j < count($valquery); $j++) { 
			$val .= "'".$valquery[$j]."',";
		}
		$varfinal =substr_replace($val ,"", -1);

        if(count($valquery) > 1){
            for ($i=0; $i < count($dataheader); $i++) { 
                $where .= "`".$dataheader[$i]['COLUMN_NAME']."` IN (".$varfinal.") OR ";
            }
        }else{
            for ($i=0; $i < count($dataheader); $i++) { 
                $where .= "`".$dataheader[$i]['COLUMN_NAME']."` = ".$varfinal." OR ";
            }
        }

        $wherefinal =substr_replace($where ,"", -3);
        $sql = "SELECT * FROM $sumberdata WHERE ".$wherefinal;

        $datavalue = $this->db->query($sql)->result_array();

        return $datavalue;
    }

    public function valuedata_spasial($valquery, $sumberdata, $field)
    {
        $dataheader = $field;
        
        $where = '';
        $val = '';
        $select = '';
        
		for ($j=0; $j < count($valquery); $j++) { 
			$val .= "'".$valquery[$j]."',";
		}
		$varfinal =substr_replace($val ,"", -1);

        if(count($valquery) > 1){
            for ($i=0; $i < count($dataheader); $i++) { 
                $where .= "`".$dataheader[$i]."` IN (".$varfinal.") OR ";
            }
        }else{
            for ($i=0; $i < count($dataheader); $i++) { 
                $where .= "`".$dataheader[$i]."` = ".$varfinal." OR ";
            }
        }
        
        for ($i=0; $i < count($dataheader); $i++) { 
            $select .= "COUNT(".$dataheader[$i].") as ".$dataheader[$i].", ";
        }

        $wherefinal =substr_replace($where ,"", -3);
        $selectfinal =substr_replace($select ,"", -2);

        $sql = "SELECT Tempat_lahir, ".$selectfinal." FROM $sumberdata WHERE ".$wherefinal." GROUP BY Tempat_lahir";

        $datavalue = $this->db->query($sql)->result_array();

        return $datavalue;
    }
}
?>