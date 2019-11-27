<?php
include_once('../_header.php');


?>
    <div class="box">
        <h1>Obat</h1>
            <h4>
               <small> Edit Data Dokter</small> 
               <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left">Kembali</i></a>
               </div>
            </h4>

            <div class="row">
                    <div class="col-lg-6 lg-offset-3">
                        <?php
                                $id = $_GET['id'];
                                $sql_obat = mysqli_query($con, "select *from tb_dokter where id_dokter = '$id' ")or die (mysqli_error($con));    
                                $data = mysqli_fetch_array($sql_obat);                   
                         ?>
                        <form action="proses.php" method="post">
                                    <div class="form-group">
                                            <label for="nama">Nama Dokter</label>
                                            <input type="hidden" name="id" value="<?=$data['id_dokter']?>">
                                            <input type="text" name="nama" class="form-control" id="nama" value="<?=$data['nama_dokter']?>" required autofocus>
                                    </div>
                                    <div class="form-group">
                                            <label for="spesialis">Spesialis</label>
                                            <input name="spesialis" id="spesialis" class="form-control" value="<?=$data['spesialis']?>"></input>
                                    </div>
                                    <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" id="alamat" rows="10" cols="20" class="form-control" ><?=$data['alamat']?></textarea>
                                    </div>
                                    <div class="form-group">
                                            <label for="no_telepon">No. Telepon</label>
                                            <input name="no_telepon" id="no_telepon" class="form-control" value="<?=$data['no_telepon']?>"></input>
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