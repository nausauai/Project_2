<?php 
include_once('templat/header.php')
?>

<?php 
require('./koneksi.php');
if(isset($_GET['id']) && isset($_POST['role'])){

    $id = $_GET['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    
    $sql ="update user set username = '$username', password = '$password', role = '$role' where id_user = '$id'";
    if(mysqli_query($koneksi,$sql)){
        if(mysqli_affected_rows($koneksi) > 0) {
            echo "<script>alert('data berhasil di ubah')</script>";
            echo "<script>window.location.href='admin.php'</script>";
        } else {
            echo "<script>alert('data gagal di ubah')</script>";
            echo "<script>window.location.href='admin.php'</script>";

        }
    } else {
        echo "<script>alert('data gagal di ubah')</script>";
        echo "<script>window.location.href='admin.php'</script>";
    }
    
}

?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>UBAH ADMIN/USER</h2>
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
                            <form id="form_advanced_validation" method="POST" action="">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" maxlength="10" minlength="3" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password" min="10" max="200" required>
                                    </div>
                                </div>
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="role" id="role">
                                                <option value="operator">Operator</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                
                                <button type="submit" class="btn btn-danger waves-effect">Ubah...</button>
                                <!-- <button class="btn btn-primary waves-effect" >Ubah</button> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</section>
<!-- Jquery Core Js -->
<script src="../../plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../../plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Jquery Validation Plugin Css -->
<script src="../../plugins/jquery-validation/jquery.validate.js"></script>

<!-- JQuery Steps Plugin Js -->
<script src="../../plugins/jquery-steps/jquery.steps.js"></script>

<!-- Sweet Alert Plugin Js -->
<script src="../../plugins/sweetalert/sweetalert.min.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="../../js/admin.js"></script>
<script src="../../js/pages/forms/form-validation.js"></script>

<!-- Demo Js -->
<script src="../../js/demo.js"></script>
<?php 
include_once('templat/footer.php')
?>