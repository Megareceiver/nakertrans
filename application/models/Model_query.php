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
        
        for ($i=0; $i < count($dataheader); $i++) { 
            $where .= "`".$dataheader[$i]."` LIKE '%".$valquery[$i]."%' AND ";
        }

        $wherefinal =substr_replace($where ,"", -4);
        $sql1 = "SELECT tempat_lahir as `kota/kab`, COUNT(tempat_lahir) as jumlah FROM $sumberdata WHERE ".$wherefinal." GROUP BY tempat_lahir";
        $data1 = $this->db->query($sql1)->result_array();

        $sql2 = "SELECT `kel/desa`, COUNT(`kel/desa`) as jumlah FROM $sumberdata WHERE ".$wherefinal." GROUP BY `kel/desa`";
        $data2 = $this->db->query($sql2)->result_array();

        $sql3 = "SELECT kecamatan, COUNT(kecamatan) as jumlah FROM $sumberdata WHERE ".$wherefinal." GROUP BY kecamatan";
        $data3 = $this->db->query($sql3)->result_array();

        $data = array(
            "kota/kab" => $data1,
            "kel/desa" => $data2,
            "kecamatan" => $data3
        );

        return $data;
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

        // $sql = "SELECT 
        //             p.name as provinsi,
        //             r.name as `kota/kab`,
        //             d.name as `kel/desa`,
        //             v.name as kecamatan
        //         FROM provinces p
        //         JOIN regencies r
        //             ON p.id = r.province_id
        //         JOIN districts d
        //             ON r.id = d.regency_id
        //         JOIN villages v
        //         	ON d.id = v.district_id
        //         WHERE p.name = 'JAWA BARAT'";

//         SELECT
// 	df.tempat_lahir as `kota/kab`,
//     COUNT(df.tempat_lahir) as jumlah,
//     d.name
// FROM data_jabar2 df
// JOIN districts d
// 	ON df.kecamatan = d.name
// JOIN
// WHERE 
// 	df.jenis_kelamin LIKE '%laki - laki%'
// GROUP BY d.name

        $wilayah = $this->db->query($sql)->result_array();

        return $wilayah;
    }

    public function getkeldes($kotakab)
    {
        $sql = "SELECT 
                    d.id as idkel,
                    d.name as `kel/desa`
                FROM provinces p
                WHERE p.name = 'JAWA BARAT'";
    }
}
?>