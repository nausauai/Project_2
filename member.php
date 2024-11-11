<?php 
require_once('function.php');
include_once('templat/header.php');
?>


<?php
    if(isset($_POST['simpan'])) {
        if(tambah_member($_POST) > 0) {
?>   
            <div class="alert alert-success" role="alert">
                 Data Berhasil disimpan!
             </div>

             <script>
                window.location.href = 'member.php';
             </script>

        <?php
        } else {
        ?>
            <div class="alert alert-danger" role="alert">
                 Data Gagal disimpan!
            </div>

        <?php
            } 
        }
        ?>


<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 >
                                Tabel Member
                            </h2>
                            <br>
                            <div class="card-header py-3">
                            <button type="button" class=" btn bg-deep-orange waves-effect " data-toggle="modal" data-target="#tambahModal">
                                <span class="icon text-white-50">
                                    <i class="material-icons">add</i>
                                </span>
                                <span class="text" >Data Member</span>
                            </button>
                        </div>
                        </div>
                        <div class="body">
                            <table id="mainTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Member</th>
                                        <th>Alamat</th>
                                        <th>No. Telepon</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;

                                    $barbershop = query("SELECT * FROM member");
                                    foreach($barbershop as $member) : ?>
                                    
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $member['tanggal'] ?></td>
                                        <td><?= $member['nama'] ?></td>
                                        <td><?= $member['alamat'] ?></td>
                                        <td><?= $member['no_hp'] ?></td>
                                        <td><?= $member['status'] ?></td>
                                        <td>
                                            <form action="" method="post"></form><button class="btn btn-success" type="button">Ubah</button>
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </td>
                                        
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                               
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            </div>
        </div>
</section>



<?php
    $query = mysqli_query($koneksi, "SELECT max(id_member) as kodeTerbesar FROM member");
    $data = mysqli_fetch_array($query);
    $kodeMember = $data['kodeTerbesar'];


    $urutan = (int) substr($kodeMember, 2, 3);

    $urutan++;


    $huruf = "mb";
    $kodeMember = $huruf . sprintf("%03s", $urutan);
?>
<!-- Modal tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="tambahModalLabel">Tambah Member</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <input type="hidden" name="id_member" id="id_member" value="<?=$kodeMember?>">
                                    <div class="form-group row">                       
                                        <label for="nama_tamu" class="col-sm-3 col-form-label"> Nama Member</label>
                                        <div class="col-sm-8">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="nama_member" name="nama_member">
                                            </div>  
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label"> Alamat</label>
                                        <div class="col-sm-8">
                                            <div class="form-line">
                                                <textarea class ="form-control" id="alamat" name="alamat"></textarea>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_hp" class="col-sm-3 col-form-label"> No. Telepon</label>
                                        <div class="col-sm-8">
                                            <div class="form-line">
                                            <input type="text" class="form-control" id="no_hp" name="no_hp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="status" id="status">
                                                <option value="regular">Regular</option>
                                                <option value="vip">VIP</option>
                                            </select>
                                        </div>
                                    </div>

                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">keluar</button>
                                        <button type="submit" name="simpan"  class="btn btn-primary">simpan</button>
                                        </div>
                                    </form>
                                </div>
                                        
                            </div>
                        </div>
                    </div>



<?php 
include_once('templat/footer.php')
?>