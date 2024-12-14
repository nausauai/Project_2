<?php 
include_once('templat/header.php')
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
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

                        <!-- Filter Tanggal dan Tombol Export -->
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-9">
                                    <form method="post" action="">
                                        <div class="row clearfix">
                                            <div class="col-sm-5">
                                                <label for="tanggal_awal">Tanggal Awal:</label>
                                                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control">
                                            </div>
                                            <div class="col-sm-5">
                                                <label for="tanggal_akhir">Tanggal Akhir:</label>
                                                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" >
                                            </div>
                                            <div class="col-sm-2">
                                                <label>&nbsp;</label>
                                                <button type="submit" class="btn btn-primary btn-block" name="filter">Filter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <form action="./export_excel.php" method="post">
                                    <input type="hidden" name="tanggal_awal" value="<?php
                                        if(isset($_POST['filter'])){
                                            echo htmlspecialchars(($_POST['tanggal_awal']));
                                        }
                                    ?>">
                                    <input type="hidden" name="tanggal_akhir" value="
                                    <?php 
                                        if(isset($_POST['filter'])){
                                            echo htmlspecialchars($_POST['tanggal_akhir']);
                                        }
                                    ?>">
                                    <div class="col-sm-3 text-right">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-success btn-block" type="submit" name="export">Export Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Tabel Data -->
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Layanan</th>
                                            <th>Status</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        require "./koneksi.php";
                                        if(isset($_POST['filter'])){
                                            //total
                                            $tanggal_awal = $_POST['tanggal_awal'];
                                            $tanggal_akhir = $_POST['tanggal_akhir'];
                                            $result_total = mysqli_query($koneksi, "select sum(harga) as total_harga from transaksi where tanggal between '$tanggal_awal' and '$tanggal_akhir' ");
                                            $data_total = mysqli_fetch_assoc($result_total);

                                            ?>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Total: </th>
                                            <th><?= $data_total['total_harga']; ?></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            
                                            $result = mysqli_query($koneksi,"select * from transaksi where tanggal between '$tanggal_awal' and '$tanggal_akhir'");
                                            $no = 1;
                                                while($dataa = mysqli_fetch_assoc($result)) {
                                            
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $dataa['tanggal']; ?></td>
                                            <td><?= $dataa['nama']; ?></td>
                                            <td><?= $dataa['layanan']; ?></td>
                                            <td><?= $dataa['member']; ?></td>
                                            <td><?= $dataa['harga']; ?></td>
                                        </tr>
                                        
                                        <?php }} ?>
                                    </tbody>
                                </table>
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
