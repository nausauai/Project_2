<?php 
include_once('templat/header.php')
?>



<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Data User</h2>
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data user
                            </h2>
                            <div class="card-header py-3">
                                    <button type="button" class=" btn bg-deep-orange waves-effect " data-toggle="modal" data-target="#modal-tambah"data-toggle="modal" >
                                        <span class="icon text-white-50">
                                            <i class="material-icons">add</i>
                                        </span>
                                        <span class="text" >Data admin</span>
                                    </button>
                                </div>                            <ul class="header-dropdown m-r--5">
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
                        <div class="body table-responsive">
                            <?php 
                            require('./koneksi.php');
                            $sql = mysqli_query($koneksi, "select * from user");
                            $simpen = '
                            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Password</th>
                                            <th>User_Role</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            ';
                            $no = 1;
                            forEach($sql as $data){
                                $simpen .= "
                                        <tr>
                                            <th scope='row'>$no</th>
                                            <td>{$data['username']}</td>
                                            <td>{$data['password']}</td>
                                            <td>{$data['role']}</td>
                                            <td>
                                            <a class='btn btn-success' type='button' href='edit_atmin.php?id={$data['id_user']}'>Ubah</a>
                                            
                                            <a class='btn btn-danger' type='submit'  data-toggle='modal' data-target='#modal-hapus'>Hapus</a>
                                            <div class='modal fade' tabindex='-1' id='modal-hapus'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title'>Hapus member</h5>
                                                        <!-- <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button> -->
                                                    </div>
                                                    <div class='modal-body'>
                                                        <p>Yakin ingin menghapus member ini??</p>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button  class='btn btn-secondary' data-dismiss='modal'>
                                                            Close
                                                            
                                                        </button>
                                                        <a type='button' class='btn btn-danger' href='hapus.php?idmin={$data['id_user']}'>Hapus...</a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </td>
                                        </tr>
                                        
                                    
                                    
                                ";
                                $no++;
                            }
                            $simpen .= "
                            </tbody>
                            </table>";
                            echo $simpen 
                            ?>
                            
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
<!-- modal tambah atmim -->

<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="margin-bottom: 25px; margin-top: 50px">
                <h5 class="modal-title" id="formModalLabel">Tambah Data</h5>
            </div> <hr>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="./aksi/tambah.php">
                    <div class="row clearfix" style="margin-bottom: 20px;">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="username">Username</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Masukan Username ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" style="margin-bottom: 20px;">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="masukan Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-left: 40px;">
                        <label for="role" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="role" id="role">
                                <option value="operator">Operator</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="adminn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



