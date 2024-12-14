<?php 
require('./koneksi.php');
require('./function.php');
if(isset($_POST['adminn'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];
    $sql = "insert into user(username,password,role) values('$username','$password','$role')";
    if(mysqli_query($koneksi,$sql)) {
        if(mysqli_affected_rows($koneksi) > 0 ){
            echo "<script>alert('Data berhasil di tambahkan')</script>";
            echo "<script>window.location.href='admin.php'</script>";
        }

    }
}

if(isset($_POST['transaksii'])) {
    $namaTransaksi =  htmlspecialchars($_POST['nama_user']);
    $tanggal = date("Y-m-d");
    $layanan = htmlspecialchars($_POST['layanan']);
    $harga = gethargaLayanan($layanan);
    $result = mysqli_query($koneksi, "select status from member where nama = '$namaTransaksi'");
    $data = mysqli_fetch_assoc($result);
    $status = $data['status'];
    
    $sql = "insert into transaksi(nama,tanggal,layanan,harga,member) values ('$namaTransaksi','$tanggal','$layanan',$harga, '$status')";
    if(mysqli_query($koneksi, $sql)){
        if(mysqli_affected_rows($koneksi) > 0){
            
            echo "<script>alert('Data berhasil di tambahkan')</script>";
            echo "<script>window.location.href='transaksi.php'</script>";
        } else {
            echo "<script>alert('Data gagal di tambahkan')</script>";
            echo "<script>window.location.href='transaksi.php'</script>";

        }
    }
    
}
?>