<?php
        include_once('../_header.php');
        require_once "../_config/config.php";

?>
        <div class="box">
            <h1>Rekam Medis</h1>
            <h4>
               <small>Data Rekam Medis</small> 
               <div class="pull-right">   
               <a href="data.php" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
               <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plush">Tambah Rekam Medis</i></a>
               </div>
            </h4>
            <div style="margin-bottom: 10px;">              
            </div>
                
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="rekam_medis">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Periksa </th>
                                        <th>Nama Pasien</th>
                                        <th>Keluhan</th>
                                        <th>Nama Dokter</th>
                                        <th>Diagnosa</th>
                                        <th>Poliklinik</th>
                                        <th>Data Obat</th>
                                        <th> <center><i class="glyphicon glyphicon-cog"></i><center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                                <?php
                                                        $no = 1 ; 
                                                        $query = "SELECT * FROM tb_rekammedis 
                                                        INNER JOIN tb_pasien on tb_rekammedis.id_pasien = tb_pasien.id_pasien 
                                                        INNER JOIN tb_dokter on tb_rekammedis.id_dokter = tb_dokter.id_dokter 
                                                        INNER JOIN tb_poliklinik on tb_rekammedis.id_poli = tb_poliklinik.id_poli 
                                                        ";
                                                        $sql_rm = mysqli_query($con, $query) or die (mysqli_error($con));
                                                        while ($data = mysqli_fetch_array($sql_rm)) {?>
                                                                <tr>
                                                                        <td><?=$no++?></td>
                                                                        <td><?=tgl_indo($data['tgl_periksa'])?></td>
                                                                        <td><?=$data['nama_pasien']?></td>
                                                                        <td><?=$data['keluhan']?></td>
                                                                        <td><?=$data['nama_dokter']?></td>
                                                                        <td><?=$data['diagnosa']?></td>
                                                                        <td><?=$data['nama_poli']?></td>
                                                                        <td>
                                                                                <?php
                                                                                        $sql_obat = mysqli_query($con, "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat where id_rm = '$data[id_rm]' ") or die (mysqli_error($con));
                                                                                        while ($data_obat = mysqli_fetch_array($sql_obat)) {
                                                                                                echo $data_obat['nama_obat']."<br>"; 
                                                                                        }
                                                                                ?>
                                                                        </td>
                                                                        <td>
                                                                        <a href="del.php?id=<?=$data['id_rm']?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data?')"> <i class="glyphicon glyphicon-trash"></i></a>
                                                                        </td>
                                                                </tr>
                                                                <?php
                                                        } 
                                                ?>
                                </tbody>
                        </table>
                    </div>
                    <script type="text/javascript">
                                $(document).ready(function(){//

                                $('#rekam_medis').DataTable(
                                {
                                        columnDefs: [
                                                {
                                                "searchable": false,
                                                "orderable" : false, 
                                                "targets"   : 8 
                                                }
                                        ],

                                        "order" : [1, "asc"]
                                });
                        });

                    </script>
        </div>


<?php
        include_once('../_footer.php');

?>