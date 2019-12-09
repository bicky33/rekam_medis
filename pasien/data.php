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
               <a href="import.php" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-import">Import Pasien </i></a>
               </div>
            </h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="pasien">
                                <thead>
                                    <tr>
                                        
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
                <script >
                                $(document).ready(function() {
                                $('#pasien').DataTable( {
                                    "processing" : true,
                                    "serverSide" : true,
                                    "ajax" : "pasien_data.php",
                                 //  scollY : "250px", 
                                    dom : "Bfrtip", 
                                    buttons : [
                                        {

                                            extend : 'pdf',
                                            oriented : 'potrait', 
                                            pageSieze : 'legal', 
                                            title : 'Data Pasien', 
                                            download : 'open'
                                        },
                                        'csv', 'excel', 'copy', 'print'
                                    ],
                                    columnDefs: [
                                        {
                                            "searchable": false, 
                                            "orderable": false, 
                                            "targets": 5,
                                            "render": function(data, type, rows){
                                                var btn = "<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a><a href=\"del.php?id="+data+"\" onclick=\"return confirm('Yakin menghapus data?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
                                                return btn;

                                            }

                                        }
                                    ] 
                                } );
                            } );
                </script>
        </div>


<?php
        include_once('../_footer.php');

?>