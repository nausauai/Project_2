
<?php 
require('./koneksi.php');
require('./function.php');

if(isset($_POST['simpan'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $nama = $_POST['nama'];
        $layanan = $_POST['layanan'];
        $member = $_POST['member'];
        $tanggal = date('Y-m-d');
        $harga = gethargaLayanan($layanan);

        $sql = "update transaksi set nama = '$nama', layanan ='$layanan', member = '$member', tanggal = '$tanggal', harga = '$harga' where id_layanan = '$id';";
        if(mysqli_query($koneksi, $sql)){
            if(mysqli_affected_rows($koneksi) > 0){
                echo '<script>alert("data berhasil di ubah")</script>';
                echo '<script>window.location.href="transaksi.php"</script>';
            }
        }
    }
}
?>
<form method="post" action="">
    <label for="nama">Nama Transaksi</label>
    <input type="text" name="nama" id="nama">
    <label for="nama">Nama Transaksi</label>
        <select name="layanan" id="layanan">
            <option value="potong_rambut">Cukur rambut</option>
            <option value="keramas_pijatkepala">keramas_pijat + kepala</option>
            <option value="smoothing">Smoothing</option>
            <option value="perming">Perming</option>
            <option value="paket1">Paket 1 (Cukur rambut + keramas + pijat kepala)</option>
        </select>
    <label for="nama">Member/Non member</label>
        <select name="member" id="member">
            <option value="yes">Iya</option>
            <option value="no">Bukan</option>
        </select>
    <br>
    <button name="simpan">simpan</button>
</form>