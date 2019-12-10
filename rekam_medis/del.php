<?php
    require_once "../_config/config.php";

    mysqli_query($con,"delete from tb_rekammedis where id_rm = '$_GET[id]'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
?>