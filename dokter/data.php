<?php
        include_once('../_header.php');
        require_once "../_config/config.php";

?>
        <div class="box">
            <h1>Dokter</h1>
            <h4>
               <small>Data Dokter</small> 
               <div class="pull-right">   
               <a href="data.php" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
               <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plush">Tambah Dokter</i></a>
               </div>
            </h4>
            <div style="margin-bottom: 10px;">
                    <form action="" class="form-inline" method="post" name="proses">
                        <div class="form-group">
                            <input type="text" name="pencarian" class="form-control" placeholder="Pencarian">
                        </div>
                        <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                        </div>                  
            </div>
                
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dokter">
                                <thead>
                                    <tr>
                                        <th> <center><i class="glyphicon glyphicon-cog"></i><center></th>
                                        <th>No</th>
                                        <th>Nama Dokter </th>
                                        <th>Spesialis</th>
                                        <th>Alamat</th>
                                        <th>No. Telp </th>
                                        <th>
                                                <center>
                                                    <input type="checkbox"  id="select_all">
                                                </center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                          <?php 
                                                    $no = 1;
                                                    $sql_poli = mysqli_query($con,"select * from tb_dokter order by nama_dokter asc") or die (mysqli_error($con));
                           
                                                         while($data = mysqli_fetch_array($sql_poli)){?>
                                                            <tr>
                                                                    <td align="center"><a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-warning btn-sm"> <i class="glyphicon glyphicon-edit"></i></a> </td>
                                                                    <td><?=$no++?></td>
                                                                    <td><?=$data['nama_dokter']?></td>
                                                                    <td><?=$data['spesialis']?></td>
                                                                    <td><?=$data['alamat']?></td>
                                                                    <td><?=$data['no_telepon']?></td>

                                                                    <td align="center">
                                                                            <input type="checkbox" name="checked[]"  class="check" value="<?=$data['id_dokter']?>">
                                                                    </td>
                                                            </tr>
                                                            <?php                                                         }
                                                                                                                                       
                                          ?>

                                </tbody>
                        </table>
                    </div>
                </form>
                        <div class="box pull-right">
                                       
                                        <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i>Hapus</button>
                        </div>

                    <div class="row " >

                    <center>
                    <h3 syle="text-align:center; "> Data Persebaran</h3>

                                                <div id="canvas-holder" style="width:50%;">
                                    <canvas id="chart-area"></canvas>
                                </div>

                                <?php
                                $con = mysqli_connect('localhost','root','','rekam_medis');
                                $sql = "SELECT COUNT(*) as num, alamat FROM tb_dokter GROUP BY alamat";
                                $query = mysqli_query($con, $sql);
                                $data = [];
                                while($row = mysqli_fetch_array($query)){
                                    $data[$row['alamat']] = $row['num'];
                                }
                                $total = array_sum($data);
                                foreach ($data as $alamat => $num) {
                                    $data[$alamat] = round($num*100/$total,2);
                                }
                                
                                $color = ['red', 'orange', 'yellow',  'green','blue'];
                                $str_value = implode(",", array_values($data));
                                $i = 0;
                                foreach($data as $asal => $presentase){
                                $str_color[]= "window.chartColors.".$color[$i];
                                $str_kota[] = $asal;
                                $i++;
                                
                                }
                                ?>
                                
                                <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
                                <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
                                <script>
                                    
                                    var config = {
                                        type: 'pie',
                                        data: {
                                            datasets: [{
                                                data: [
                                                    <?= $str_value; ?>
                                                ],
                                                backgroundColor: [
                                                    <?= implode(",", $str_color); ?>
                                                ],
                                                label: 'Dataset 1'
                                            }],
                                            labels: [
                                                '<?= implode("','", $str_kota); ?>'
                                            ]
                                        },
                                        options: {
                                            responsive: true
                                        }
                                    };
                                    window.onload = function() {
                                        var ctx = document.getElementById('chart-area').getContext('2d');
                                        window.myPie = new Chart(ctx, config);
                                    };
                                </script>

                    </div>
                    </center>
                    <script>
                                $(document).ready(function(){//

                                    $('#dokter').DataTable(
                                        {
                                            columnDefs: [
                                                    // "searchable": false,
                                                    // "orderable" : false, 
                                                    // "targets"   : [0,6]  
                                            ],

                                            "order" : [1, "asc"]
                                        }
                                    );

                                    $('#select_all').on('click', function(){//
                                        if(this.checked){//
                                            $('.check').each(function(){//
                                                this.checked = true ; //
                                            }) 
                                            }else {//
                                                $('.check').each(function(){
                                                this.checked = false ;                                  
                                                }) 

                                            }
                                    
                                });

                                $('.check').on('click', function(){
                                    if($('.check:checked').length == $('.check').length) {
                                        $('#select_all').prop('checked',true) 
                                    }else {
                                        $('#select_all').prop('checked',false)
                                    }
                                })
                            });
                            function hapus(){
                                var conf = confirm('Yakin ingin menghapus data?');
                                if (conf){
                                    document.proses.action='del.php';
                                    document.proses.submit();
                                }
                               
                            }

                    </script>
                    </div>
        </div>


<?php
        include_once('../_footer.php');

?>