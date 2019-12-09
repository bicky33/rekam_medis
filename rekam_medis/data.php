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
                        <table class="table table-striped table-bordered table-hover" id="dokter">
                                <thead>
                                    <tr>
                                        <th> <center><i class="glyphicon glyphicon-cog"></i><center></th>
                                        <th>No</th>
                                        <th>Tanggal Periksa </th>
                                        <th>Nama Pasien</th>
                                        <th>Keluhan</th>
                                        <th>Nama Dokter</th>
                                        <th>
                                                <center>
                                                    <input type="checkbox"  id="select_all">
                                                </center>
                                        </th>
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