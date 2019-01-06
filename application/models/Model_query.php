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

    public function valuedata($valquery, $sumberdata, $dataheader)
    {   
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
			if(count($valquery) > 1){
                $val .= "'".$valquery[$j]."',";
            }else{
                $val .= "'%".$valquery[$j]."%',";
            }
        }
        
		$varfinal =substr_replace($val ,"", -1);

        if(count($valquery) > 1){
            for ($i=0; $i < count($dataheader); $i++) { 
                $where .= "`".$dataheader[$i]."` IN (".$varfinal.") OR ";
            }
        }else{
            for ($i=0; $i < count($dataheader); $i++) { 
                $where .= "`".$dataheader[$i]."` LIKE ".$varfinal." OR ";
            }
        }
        
        // for ($i=0; $i < count($dataheader); $i++) { 
            $select .= "COUNT(".$dataheader[0].") as jumlah, ";
        // }

        $wherefinal =substr_replace($where ,"", -3);
        $selectfinal =substr_replace($select ,"", -2);

        $sql = "SELECT tempat_lahir as daerah, ".$selectfinal." FROM $sumberdata WHERE ".$wherefinal." GROUP BY Tempat_lahir";

        $datavalue = $this->db->query($sql)->result_array();

        return $datavalue;
    }

    public function getwilayah()
    {
        $sql = "SELECT p.name as provinsi,
                    r.name as `kota/kab`,
                    d.name as `kel/kec`,
                    v.name as desa
                FROM provinces p
                JOIN regencies r
                    ON p.id = r.province_id
                JOIN districts d
                    ON r.id = d.regency_id
                JOIN villages v
                	ON d.id = v.district_id
                WHERE p.name = 'JAWA BARAT'";
        $wilayah = $this->db->query($sql)->result();

        // $sqlprovinsi = "SELECT * FROM provinces p WHERE p.name='JAWA BARAT'";
        // $provinsi = $this->db->query($sqlprovinsi)->row();

        // $sqlkotakab = "SELECT r.name as `kota/kab` FROM regencies r WHERE r.province_id=".$provinsi->id;
        // $kotakab = $this->db->query($sqlkotakab)->result();

        // $wilayah = array(
        //     'provinsi' => $provinsi
        // );

        return $wilayah;
    }
}
?>