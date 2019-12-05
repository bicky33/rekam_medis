<?php
include_once('../_header.php');


?>
    <div class="box">
        <h1>Pasien</h1>
            <h4>
               <small> Tambah Pasien</small> 
               <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left">Kembali</i></a>
               </div>
            </h4>

            <div class="row">
                    <div class="col-lg-6 lg-offset-3">
                        <form action="proses.php" method="post">
                                    <div class="form-group">
                                            <label for="no_identitas">Nomor Identitas</label>
                                            <input name="no_identitas" id="no_identitas" class="form-control " type="number"></input>
                                    </div>
                                    <div class="form-group">
                                            <label for="nama">Nama Pasien</label>
                                            <input type="text" name="nama" class="form-control" id="nama" required autofocus>
                                    </div>
                                    <div class="form-group">
                                            <label for="kelamin">Jenis Kelamin</label>
                                            <div>
                                                <label class="radion-inline">
                                                    <input type="radio" name="kelamin" id="kelamin" value="L" require> Laki-Laki
                                                </label>
                                                <label class="radion-inline">
                                                    <input type="radio" name="kelamin" id="kelamin" value="P" require> Perempuan
                                                </label>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" id="alamat" rows="10" cols="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                            <label for="no_telepon">No telepon</label>
                                            <input name="no_telepon" id="no_telepon"  class="form-control"></input>
                                    </div>
                                    <div class="form-group pull-right">
                                            <input type="submit" name="add" value="simpan" class="btn btn-success" >
                                    </div>
                        </form>
                    </div>
            </div>
    </div>
<?php
include_once('../_footer.php');
?>