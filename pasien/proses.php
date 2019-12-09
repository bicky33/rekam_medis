<?php
    require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


    if(isset($_POST['add'])){
        $uuid = Uuid::uuid4()->toString();
        $identitas = trim(mysqli_real_escape_string($con, $_POST['no_identitas']));
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
        $kelamin  = trim(mysqli_real_escape_string($con, $_POST['kelamin']));
        $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
        $telepon = trim(mysqli_real_escape_string($con, $_POST['no_telepon']));
        $sql_cek_identitas = mysqli_query($con,"select * from tb_pasien where no_identitas = '$identitas' ") or die(mysqli_error($con)); 
        if (mysqli_num_rows($sql_cek_identitas)>0){
            echo "<script>alert('Nomor Identitas Telah terdaftar sebelumnya!!!'); window.location='add.php';</script>";
        }else {
        mysqli_query($con,"insert into tb_pasien (id_pasien,no_identitas,nama_pasien,jenis_kelamin, alamat,no_telepon) values ('$uuid','$identitas', '$nama','$kelamin','$alamat','$telepon')") or die(mysqli_error($con)); 
        echo "<script>window.location='data.php';</script>";
        }
    }
    else if (isset($_POST['edit'])){
        $uuid = $_POST['id'] ;
        $identitas = trim(mysqli_real_escape_string($con, $_POST['no_identitas']));
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
        $kelamin  = trim(mysqli_real_escape_string($con, $_POST['kelamin']));
        $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
        $telepon = trim(mysqli_real_escape_string($con, $_POST['no_telepon']));
        // $sql_cek_identitas = mysqli_query($con,"select * from tb_pasien where no_identitas = '$identitas'and id_pasien != '$uuid' ") or die(mysqli_error($con)); 
        // if (mysqli_num_rows($sql_cek_identitas)>0){
        //     echo "<script>alert('Nomor Identitas Telah terdaftar sebelumnya!!!'); window.location='edit.php?id=$uuid';</script>";
        // }else {
        mysqli_query($con,"UPDATE tb_pasien set no_identitas = '$identitas',nama_pasien = '$nama', jenis_kelamin = '$kelamin', alamat = '$alamat', no_telepon = '$telepon' where id_pasien = '$uuid' ") or die(mysqli_error($con)); 
        echo "<script>window.location='data.php';</script>";
    // }
}
else if (isset($_POST['import'])){
    $file = $_FILES['file']['name']; 
    $ekstensi = explode(".",$file); 
    $file_name = "file-".round(microtime(true)).".".end($ekstensi); 
    $sumber = $_FILES['file']['tmp_name']; 
    $target_dir = "../_file/"; 
    $target_file = $target_dir.$file_name;
    $upload = move_uploaded_file($sumber,$target_file);  

    // if($upload){
    //     echo "Upload sukses "; 
    // }else {
    //     echo "Upload gagal";
    // }

    $obj = PHPExcel_IOFactory::load($target_file);
    $all_data = $obj->getActiveSheet()->toArray(null,true,true,true);

    $sql = "INSERT INTO tb_pasien (id_pasien, no_identitas, nama_pasien, jenis_kelamin, alamat, no_telepon) VALUES "; 
    //echo count($all_data);    
    for ($i=3; $i<= count($all_data); $i++) { 
            $uuid = Uuid::uuid4()->toString();
            $identitas = $all_data[$i]['A']; 
            $nama = $all_data[$i]['B']; 
            $kelamin = $all_data[$i]['C']; 
            $alamat = $all_data[$i]['D']; 
            $no_telepon = $all_data[$i]['E'];
            $sql .= " ('$uuid', '$identitas', '$nama', '$kelamin', '$alamat', '$no_telepon')," ; 
        }
        $sql = substr($sql,0,-1); 
        // echo $sql ; 
        mysqli_query( $con, $sql )or die(mysqli_error($con)); 
        echo "<script>window.location='data.php';</script>";



    unlink($target_file);

     
}


?>