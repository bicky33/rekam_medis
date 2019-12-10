<?php
include_once('../_header.php');


?> 
    <div class="box">
        <h1>Rekam Medis</h1>
            <h4>
               <small> Tambah Rekam Medis</small> 
               <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left">Kembali</i></a>
               </div>
            </h4>

            <div class="row">
                    <div class="col-lg-6 lg-offset-3">
                        <form action="proses.php" method="post">
                                    <div class="form-group">
                                            <label for="pasien" class="form-control" required>Pasien</label>
                                            <select name="pasien" id="pasien" class="form-control" required>
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    <?php
                                                            $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien") or die (mysqli_error($con)); 
                                                            while($data_pasien = mysqli_fetch_array($sql_pasien)){
                                                                    echo '<option value="'.$data_pasien['id_pasien'].'">'.$data_pasien['nama_pasien'].'</option>';
                                                            }
                                                    ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="keluhan">keluhan</label>
                                            <textarea name="keluhan" id="keluhan" rows="10" cols="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                            <label for="dokter" class="form-control" required>Dokter</label>
                                            <select name="dokter" id="dokter" class="form-control" required>
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    <?php
                                                            $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die (mysqli_error($con)); 
                                                            while($data_dokter = mysqli_fetch_array($sql_dokter)){
                                                                    echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                                                            }
                                                    ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="diagnosa">Diagnosa</label>
                                            <textarea name="diagnosa" id="diagnosa" rows="10" cols="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                            <label for="poli" class="form-control" required>Poliklinik</label>
                                            <select name="poli" id="poli" class="form-control" required>
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    <?php
                                                            $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik") or die (mysqli_error($con)); 
                                                            while($data_poli = mysqli_fetch_array($sql_poli)){
                                                                    echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
                                                            }
                                                    ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="obat" class="form-control" required>Obat</label>
                                            <select multiple name="obat[]" id="obat" class="form-control" size="7" required>
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    <?php
                                                            $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat") or die (mysqli_error($con)); 
                                                            while($data_obat = mysqli_fetch_array($sql_obat)){
                                                                    echo '<option value="'.$data_obat['id_obat'].'">'.$data_obat['nama_obat'].'</option>';
                                                            }
                                                    ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="tgl_periksa">Tanggal Periksa</label>
                                            <input name="tgl_periksa" id="tgl_periksa" type="date" value="<?=date('Y-m-d')?>" class="form-control"></input>
                                    </div>
                                    <div class="form-group pull-right">
                                            <input type="submit" name="add" value="Simpan" class="btn btn-success" >
                                            <input type="reset" name="reset" value="Reset" class="btn btn-danger" >
                                    </div>
                        </form>
                    </div>
                    <script>
                        CKEDITOR.replace('keluhan');
                        CKEDITOR.replace('diagnosa');
                    </script>
            </div>
    </div>
<?php
include_once('../_footer.php');
?>