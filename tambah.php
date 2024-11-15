<?php 
require('./koneksi.php');
if(isset($_POST['adminn'])){
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

if(isset($_POST['transaksii'])) {
    $namaTransaksi =  htmlspecialchars($_POST['nama_transaksi']);
    $member = htmlspecialchars($_POST['member']);
    $tanggal = date("Y-m-d");
    $layanan = htmlspecialchars($_POST['layanan']);
    $harga = htmlspecialchars($_POST['harga']);
    if($layanan == 'smoothing'){
        $harga = 150000;
    }
    if($layanan == 'potong_rambut'){
        $harga = 20000;
    }
    if($layanan == 'perming'){
        $harga = 250000;
    }
    if($layanan == 'keramas_pijatkepala'){
        $harga = 15000;
    }
    if($layanan == 'paket1'){
        $harga = 45000;
    }
    $harga_titik = number_format($harga,0,',','.');

    $sql = "insert into transaksi(nama,tanggal,layanan,harga,member) values ('$namaTransaksi','$tanggal','$layanan',$harga,'$member')";
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