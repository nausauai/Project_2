<?php 
require('./koneksi.php');
if(isset($_POST)){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $sql = "insert into user(username,password,role) values('$username','$password','$role')";
    if(mysqli_query($koneksi,$sql)) {
        if(mysqli_affected_rows($koneksi) > 0 ){
            echo "<script>alert('Data berhasil di tambahkan')</script>";
            echo "<script>window.location.href='admin.php'</script>";
        }

    }
}
?>