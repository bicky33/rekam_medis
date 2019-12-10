<?php

    date_default_timezone_set('Asia/Jakarta'); 
    session_start(); 

    require_once "conn.php"; 
    $con = mysqli_connect($conn['host'],$conn['user'],$conn['pass'],$conn['db']);

    if (mysqli_connect_errno()){

        echo mysqli_connect_error();
    }

    function base_url($url = null){
        $base_url = "http://localhost/rekam_medis"; 
            if ($url != null){
                return $base_url."/".$url; 
            } else {
                return $base_url; 
            }
    }

    function get_rekap_asal(){
        $con = mysqli_connect('localhost','root','','rekam_medis');
		$sql = "SELECT COUNT(*) as num, alamat FROM kuliah GROUP BY alamat";
		$query = mysqli_query($con, $sql);
		$data = [];
		while($row = mysqli_fetch_array($query)){
			$data[$row['alamat']] = $row['num'];
		}
		$total = array_sum($data);
		foreach ($data as $alamat => $num) {
			$data[$alamat] = round($num*100/$total,2);
		}
		return $data;
    }
    
    function tgl_indo($tgl){
        $tanggal = substr( $tgl, 8, 2 );
        $bulan = substr( $tgl, 5, 2 );
        $tahun = substr( $tgl, 0, 4 );

        return $tanggal."/".$bulan."/".$tahun; 

    }


?>