<?php
        include_once('../_header.php');
        require_once "../_config/config.php";

?>
        <div class="box">
            <h1>Pasien</h1>
            <h4>
               <small>Data Pasien</small> 
               <div class="pull-right">   
               <a href="data.php" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
               <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plush">Tambah Pasien</i></a>
               </div>
            </h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Identitas </th>
                                        <th>Nama Pasien </th>
                                        <th>Jenis Kelamin </th>
                                        <th>Alamat</th>
                                        <th>No. Telepon</th>
                                        <th> <center><i class="glyphicon glyphicon-cog"></i><center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                        </table>
                    </div>
              

        </div>


<?php
        include_once('../_footer.php');

?>