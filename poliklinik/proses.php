<?php
    require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;



if(isset($_POST['add'])){
    
    $total = $_POST['total']; 
        for ($i=1; $i<=$total; $i++) { 
            $uuid = Uuid::uuid4()->toString() ;
            $nama = trim(mysqli_real_escape_string($con, $_POST['nama-' .$i]));
            $gedung  = trim(mysqli_real_escape_string($con, $_POST['gedung-' .$i]));   
           $sql =  mysqli_query($con,"insert into tb_poliklinik (id_poli,nama_poli, gedung) values ('$uuid','$nama','$gedung')") or die(mysqli_error($con)); 
           
        }
        if($sql){
            echo $_POST['total'];
            echo "<script>alert('".$total." data berhasil ditambahkan'); window.location='data.php'; </script>";

        } else {
            echo "<script>alert('".$total." Gagal tambah data coba lagi'); window.location='generate.php'; </script>";
        } 
    }else if (isset($_POST['edit'])){
     
    }

?>