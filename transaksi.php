<?php 
include_once('templat/header.php');

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
                                Transaksi
                            </h2>
                            <div class="card-header py-3">
                                    <button type="button" class=" btn bg-deep-orange waves-effect "  data-target="#tambahModal" data-toggle="modal" >
                                        <span class="icon text-white-50">
                                            <i class="material-icons">add</i>
                                        </span>
                                        <span class="text" >Data Transaksi</span>
                                    </button>
                                </div>
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
                                $result = mysqli_query($koneksi, "select sum(harga) as harga from transaksi");
                                $data = mysqli_fetch_assoc($result);
                                $total = $data['harga'];
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
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Total :</th>
                                            <th>'. $total .'</th>
                                            <th>

                                            </th>
                                        
                                        </tr>
                                    </tfoot>
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
                                            <td> 
                                                <a type='button' class='btn btn-success' href='edit_transaksi.php?id={$data['id_layanan']}'>Ubah<a>
                                                <a type='button' class='btn btn-danger' href='hapus.php?idtrans={$data['id_layanan']}'>Hapus</a>
                                            </td>
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

<!-- Modal tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="tambahModalLabel">Tambah Transaksi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="tambah.php" >

                                    <div class="form-group row">
                                    <label for="nama_user" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="nama_user" id="nama_user">
                                                <?php 
                                                    $sql = "select * from member";
                                                    $result = mysqli_query($koneksi, $sql);
                                                    

                                                    while($data = mysqli_fetch_assoc($result)){
                                                ?>
                                                
                                                <option value="<?= $data['nama']; ?>"> <?= $data['nama']; ?> - <?= $data['alamat']; ?> - <?= $data['status']; ?></option>
                                                <?php 
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>

                                
                                    
                                
                                    <div class="form-group row">
                                    <label for="layanan" class="col-sm-3 col-form-label">Layanan</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="layanan" id="layanan">
                                                <option value="potong_rambut">Cukur rambut </option>
                                                <option value="keramas_pijatkepala">keramas_pijat + kepala</option>
                                                <option value="smoothing">Smoothing</option>
                                                <option value="perming">Perming</option>
                                                <option value="paket1">Paket 1 (Cukur rambut + keramas + pijat kepala)</option>
                                            </select>
                                        </div>
                                    </div>

                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">keluar</button>
                                        <button type="submit" class="btn btn-primary" name="transaksii">simpan</button>
                                        </div>
                                    </form>
                                </div>
                                        
                            </div>
                        </div>
                    </div>

<?php 
include_once('templat/footer.php')
?>