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
        $sql1 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'db_nakertrans' AND TABLE_NAME = '$sumberdata'";
        $dataheader = $this->db->query($sql1)->result_array();

        return $dataheader;
    }

    public function valuedata($valquery, $sumberdata, $dataheader)
    {   
        $where = '';
        $val = '';
        
		if(count($valquery) == 1){
            for ($j=0; $j < count($valquery); $j++) { 
                $val .= "'%".$valquery[$j]."%',";
            }
        }else{
            for ($j=0; $j < count($valquery); $j++) { 
                $val .= "'".$valquery[$j]."',";
            }
        }
		$varfinal =substr_replace($val ,"", -1);

        if(count($valquery) > 1){
            for ($i=0; $i < count($dataheader); $i++) { 
                $where .= "`".$dataheader[$i]['COLUMN_NAME']."` IN (".$varfinal.") OR ";
            }
        }else{
            for ($i=0; $i < count($dataheader); $i++) { 
                $where .= "`".$dataheader[$i]['COLUMN_NAME']."` LIKE ".$varfinal." OR ";
            }
        }

        $wherefinal =substr_replace($where ,"", -3);
        $sql = "SELECT * FROM $sumberdata WHERE ".$wherefinal;

        $datavalue = $this->db->query($sql)->result_array();

        return $datavalue;
    }

    public function getprovinsi()
    {
        $sql = "SELECT 
                    p.name as provinsi,
                    r.id as idkab,
                    r.name as `kota/kab`
                FROM provinces p
                JOIN regencies r
                    ON p.id = r.province_id
                WHERE p.name = 'JAWA BARAT'";

        $wilayah = $this->db->query($sql)->result_array();

        return $wilayah;
    }

    public function valuedata_spasial($valquery, $sumberdata, $field)
    {
        $dataheader = $field;
        $where = '';
        $val = '';
        $select = '';
        
        for ($i=0; $i < count($dataheader); $i++) { 
            $where .= "`".$dataheader[$i]."` LIKE '%".$valquery[$i]."%' AND ";
        }

        $wherefinal =substr_replace($where ,"", -4);
        $sql1 = "SELECT
                    dm.tempat_lahir as kab,
                    dm.kecamatan as kec,
                    dm.`kel/desa` as kel,
                    COUNT(*) as jumlah
            
                FROM ".$sumberdata." dm
                WHERE
                    ".$wherefinal."
                GROUP BY
                    dm.tempat_lahir
        ";
        $kab = $this->db->query($sql1)->result_array();

        $sql2 = "SELECT
                    dm.tempat_lahir as kab,
                    dm.kecamatan as kec,
                    dm.`kel/desa` as kel,
                    COUNT(*) as jumlah
            
                FROM ".$sumberdata." dm
                WHERE
                    ".$wherefinal."
                GROUP BY
                    dm.tempat_lahir, dm.kecamatan";
        $kec = $this->db->query($sql2)->result_array();

        $sql3 = "SELECT
                    dm.tempat_lahir as kab,
                    dm.kecamatan as kec,
                    dm.`kel/desa` as kel,
                    COUNT(*) as jumlah
            
                FROM ".$sumberdata." dm
                WHERE
                    ".$wherefinal."
                GROUP BY
                    dm.tempat_lahir, dm.kecamatan, dm.`kel/desa`";
        $kel = $this->db->query($sql3)->result_array();

        $data = array(
            "kab" => $kab,
            "kel" => $kec,
            "kec" => $kel
        );

        return $data;
    }

    public function getdaerah($kel, $kec)
    {
        $sql ="SELECT 
                r.id as idkab,
                r.name as kab,
                d.id as idkec,
                d.name as kec,
                v.id as idkel,
                v.name as kel
            FROM regencies r
            JOIN districts d 
                ON r.id = d.regency_id
            JOIN villages v
                ON d.id = v.district_id
            WHERE
                d.name = '$kec'
                AND
                v.name = '$kel'";

        return $this->db->query($sql)->result();
    }

    public function getkelkec($kab, $kec)
    {
        $kab = str_replace("-"," ",$kab);
        $kec = str_replace("-"," ",$kec);

        $sql ="SELECT 
                r.id as idkab,
                r.name as kab,
                d.id as idkec,
                d.name as kec,
                v.id as idkel,
                v.name as kel
            FROM regencies r
            JOIN districts d 
                ON r.id = d.regency_id
            JOIN villages v
                ON d.id = v.district_id ";

        if($kab != '' && $kec !== ''){
            $sql .= " WHERE
                r.name = '$kab'
                AND
                d.name = '$kec'";
        }else if($kab == ''){
            $sql .= " WHERE
            d.name = '$kec'";
        }else if($kec == ''){
            $sql .= " WHERE
            r.name = '$kab' GROUP BY d.name";
        }

        return $this->db->query($sql)->result();
        // return $sql;
    }
}
?>