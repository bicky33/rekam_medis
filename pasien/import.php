<?php
include_once('../_header.php');


?>
    <div class="box">
        <h1>Pasien</h1>
            <h4>
               <small> Import Data Pasien</small> 
               <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left">Kembali</i></a>
               </div>
            </h4>

            <div class="row">
                    <div class="col-lg-6 lg-offset-3">
                        <form action="proses.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <label for="file">File Excel</label>
                                            <input name="file" id="file" class="form-control " type="file" required></input>
                                    </div>
                                 
                                    <div class="form-group pull-right">
                                            <input type="submit" name="import" value="Import" class="btn btn-success" >
                                    </div>
                        </form>
                    </div>
            </div>
    </div>
<?php
include_once('../_footer.php');
?>