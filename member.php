<?php 
require_once('function.php');
include_once('templat/header.php');
?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Member barbershop</h2>
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tabel Member
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
                            <table id="mainTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Member</th>
                                        <th>Alamat</th>
                                        <th>No_hp</th>
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
include_once('templat/footer.php')
?>