<?php
include_once('../_header.php');


?>
    <div class="box">
        <h1>Pasien</h1>
            <h4>
               <small> Edit Pasien</small> 
               <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left">Kembali</i></a>
               </div>
            </h4>

            <div class="row">
                    <div class="col-lg-6 lg-offset-3">
                        <?php
                            $id = $_GET['id'];  
                            $sql = mysqli_query($con, "SELECT * FROM tb_pasien WHERE id_pasien = '$id' ") or die (mysqli_error($con));
                            $data = mysqli_fetch_array($sql);  
                        ?>
                        <form action="proses.php" method="post">
                                    <div class="form-group">
                                            <input type="hidden" name="id" value="<?=$data['id_pasien']?>">
                                            <label for="no_identitas">Nomor Identitas</label>
                                            <input name="no_identitas" id="no_identitas" class="form-control " type="number" value="<?=$data['no_identitas']?>" required focus></input>
                                    </div>
                                    <div class="form-group">
                                            <label for="nama">Nama Pasien</label>
                                            <input type="text" name="nama" class="form-control" id="nama" value="<?=$data['nama_pasien']?>">
                                    </div>
                                    <div class="form-group">
                                            <label for="kelamin">Jenis Kelamin</label>
                                            <div>
                                                <label class="radion-inline">
                                                    <input type="radio" name="kelamin" id="kelamin" value="L" required <?=$data['jenis_kelamin'] == "L" ? "checked" : null ?> > Laki-Laki
                                                </label>
                                                <label class="radion-inline">
                                                    <input type="radio" name="kelamin" id="kelamin" value="P" required <?=$data['jenis_kelamin'] == "P" ? "checked" : null?> > Perempuan
                                                </label>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" id="alamat" rows="10" cols="10" class="form-control"><?=$data['alamat']?></textarea>
                                    </div>
                                    <div class="form-group">
                                            <label for="no_telepon">No telepon</label>
                                            <input name="no_telepon" id="no_telepon"  class="form-control" value="<?=$data['no_telepon']?>"></input>
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