<?php
    require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


    if(isset($_POST['add'])){
        $uuid = Uuid::uuid4()->toString() ;
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
        $spesialis  = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
        $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
        $telepon = trim(mysqli_real_escape_string($con, $_POST['no_telepon']));
        mysqli_query($con,"insert into tb_dokter (id_dokter,nama_dokter, spesialis, alamat, no_telepon) values ('$uuid','$nama','$spesialis','$alamat','$telepon')") or die(mysqli_error($con)); 
        echo "<script>window.location='data.php';</script>";
    }
    else if (isset($_POST['edit'])){
        $uuid = $_POST['id'];
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
        $spesialis  = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
        $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
        $telepon = trim(mysqli_real_escape_string($con, $_POST['no_telepon']));
        mysqli_query($con,"update tb_dokter set nama_dokter ='$nama', spesialis='$spesialis', alamat = '$alamat', no_telepon = '$telepon' where id_dokter='$uuid' ") or die(mysqli_error($con)); 
        echo "<script>window.location='data.php';</script>";

    }

?>