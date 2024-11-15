<?php 
require('./koneksi.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($koneksi, "delete from member where id_member = '$id'");
    echo "<script>alert('data berhasil di hapus')</script>";
    echo "<script>window.location.href='member.php'</script>";

} 

if(isset($_GET['idmin'])){
    $id = $_GET['idmin'];
    $sql = "delete from user where id_user = '$id'";
    if(mysqli_query($koneksi,$sql)) {
        if(mysqli_affected_rows($koneksi) > 0) {
            echo "<script>alert('data berhasil di hapus')</script>";
            echo "<script>window.location.href='admin.php'</script>";

        }
        else {
            echo "<script>alert('data gagal di hapus')</script>";

        }

    }
}

if(isset($_GET['idtrans'])){
    $id = $_GET['idtrans'];
    mysqli_query($koneksi, "delete from transaksi where id_layanan = '$id'");
    if(mysqli_affected_rows($koneksi)> 0){
        echo "<script>alert('data berhasil di hapus')</script>";
        echo "<script>window.location.href='transaksi.php'</script>";
    } else {
        echo "<script>alert('data gagal di hapus')</script>";
            echo "<script>window.location.href='transaksi.php'</script>";
    }
}

?>