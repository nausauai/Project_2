<?php
require_once('koneksi.php');

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


//tambah data member
function tambah_member($data) {
    global $koneksi;

    $kode = htmlspecialchars($data["id_member"]);
    $tanggal =  date("Y-m-d");
    $nama_member = htmlspecialchars($data["nama_member"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $status = htmlspecialchars($data["status"]);  

    $query = "INSERT INTO member VALUES('$kode', '$tanggal', '$nama_member', '$alamat', '$no_hp', '$status')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function gethargaLayanan($layanan){
    $result = 0;
    if($layanan == 'smoothing'){
        $result = 150000;
    }
    if($layanan == 'potong_rambut'){
        $result = 20000;
    }
    if($layanan == 'perming'){
        $result = 250000;
    }
    if($layanan == 'keramas_pijatkepala'){
        $result = 15000;
    }
    if($layanan == 'paket1'){
        $result = 45000;
    }
    return $result;
}


?>