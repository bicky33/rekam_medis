<?php
    require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


    if(isset($_POST['add'])){
        $uuid = Uuid::uuid4()->toString() ;
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
        $uuid = $_POST['id'];
        $identitas = trim(mysqli_real_escape_string($con, $_POST['no_identitas']));
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
        $spesialis  = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
        $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
        $telepon = trim(mysqli_real_escape_string($con, $_POST['no_telepon']));
        mysqli_query($con,"update tb_pasien set no_identitas='$identitas', nama_pasien ='$nama', kelamin='$kelamin', alamat = '$alamat', no_telepon = '$telepon' where id_dokter='$uuid' ") or die(mysqli_error($con)); 
        echo "<script>window.location='data.php';</script>";

    }

?>