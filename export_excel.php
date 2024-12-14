
<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=laporan-barber.xls");
    

?>
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
                                        if(isset($_POST['export'])){
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