<?php 
include_once('templat/header.php')
?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Transaksi</h2>
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BASIC EXAMPLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <?php 
                                require('./koneksi.php');
                                $sql = mysqli_query( $koneksi, "select * from transaksi");
                                $no = 1;
                                $simpen = '
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Layanan</th>
                                            <th>Member</th>
                                            <th>Harga</th>
                                            <th>
                                            aksi
                                            </th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                ';
                                foreach($sql as $data){
                                    $simpen .= "
                                    
                                    </tr>
                                        <tr>
                                            <td>$no</td>
                                            <td>{$data['tanggal']}</td>
                                            <td>{$data['nama']}</td>
                                            <td>{$data['layanan']}</td>
                                            <td>{$data['member']}</td>
                                            <td>{$data['harga']}</td>
                                            <td> <a type='button' class='btn btn-secondary'>Ubah
                                             <a type='button' class='btn btn-secondary'>Hapus</td>
                                        </tr>
                                    
                                
                                    ";
                                    $no++;
                                }
                                $simpen .= ' 
                                </tbody>
                                </table>';

                                echo $simpen;
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
</section>

<?php 
include_once('templat/footer.php')
?>