<?php
    require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


    
    if(isset($_POST['add'])){

        $uuid = Uuid::uuid4()->toString() ;
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
        $ket  = trim(mysqli_real_escape_string($con, $_POST['ket']));
        mysqli_query($con,"insert into tb_obat (id_obat,nama_obat, ket_obat) values ('$uuid','$nama','$ket')") or die(mysqli_error($con)); 
        echo "<script>window.location='data.php';</script>";
    }else if (isset($_POST['edit'])){

    }

?>