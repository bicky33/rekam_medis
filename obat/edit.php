<?php
include_once('../_header.php');


?>
    <div class="box">
        <h1>Obat</h1>
            <h4>
               <small> Edit Data Obat</small> 
               <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left">Kembali</i></a>
               </div>
            </h4>

            <div class="row">
                    <div class="col-lg-6 lg-offset-3">
                        <?php
                                $id = $_GET['id'];
                                $sql_obat = mysqli_query($con, "select *from tb_obat where id_obat = '$id' ")or die (mysqli_error($con));    
                                $data = mysqli_fetch_array($sql_obat);                   
                         ?>
                        <form action="proses.php" method="post">
                                    <div class="form-group">
                                            <label for="nama">Nama Obat</label>
                                            <input type="hidden" name="id" value="<?=$data['id_obat']?>">
                                            <input type="text" name="nama" class="form-control" id="nama" value="<?=$data['nama_obat']?>" required autofocus>
                                    </div>
                                    <div class="form-group">
                                            <label for="ket">Keterangan Obat</label>
                                            <textarea name="ket" id="ket" cols="30" rows="10" class="form-control" value="<?=$data['ket_obat']?>"></textarea>
                                    </div>
                                    <div class="form-group pull-right">
                                            <input type="submit" name="edit" value="Edit" class="btn btn-success" >
                                    </div>
                        </form>
                    </div>
            </div>
    </div>
<?php
include_once('../_footer.php');
?>