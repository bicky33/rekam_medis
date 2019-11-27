
<?php

require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";


        $chk = @$_POST['checked'];
        if (!isset($chk)){
            echo "<script>alert('tidak adak data yang dipilih'); window.location='data.php' </script>"; 
        } else {

            foreach($chk as $id){

                $sql = mysqli_query($con, "Delete from tb_dokter where id_dokter='$id'") or die (mysqli_erorr($con)); 
                
            }
            if ($sql){
                echo "<script>alert('".count($chk)." Data Berhasil dihapus'); window.location='data.php'; </script>";
            } else {
                echo "<script>alert('Gagal menghapus data'); window.location='data.php'; </script>";
            }
}
?>