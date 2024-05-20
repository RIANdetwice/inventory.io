<?php 
$conn = new mysqli("localhost", "root", "", "db_inventori");

if($conn->connect_error) {
    die("koneksi gagal" . $conn->connect_error);
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$kode = $_POST['kode'];
$kategori = $_POST['kategori'];
$merk_tipe = $_POST['merk_tipe'];
$kondisi = $_POST['kondisi'];
$status_kepemilikan = $_POST['status_kepemilikan'];
$jumlah_barang = $_POST['jumlah_barang'];
$spesifikasi = $_POST['spesifikasi'];
$tahun_pembuatan =$_POST['tahun_pembuatan'];
$tahun_pembelian = $_POST['tahun_pembelian'];
$kepemilikan = $_POST['kepemilikan'];
// Membersihkan nilai ID dari spasi dan karakter non-standar lainnya
$id_clean = preg_replace("/[^0-9]/", "", $id);

// Nama file QR code baru
$qr_code_file_baru = "qrcodes/barang_" . $id_clean . ".png";

$query = "UPDATE barang SET nama='$nama', kode='$kode', kategori='$kategori', merk_tipe='$merk_tipe', kondisi='$kondisi', status_kepemilikan='$status_kepemilikan', jumlah_barang='$jumlah_barang', spesifikasi='$spesifikasi', tahun_pembuatan='$tahun_pembuatan', tahun_pembelian='$tahun_pembelian', kepemilikan='$kepemilikan' WHERE id=$id";

if($conn->query($query) === TRUE) {
    // Query untuk memperbarui data barang berhasil dieksekusi
    
    
    
    $data = "Nama Barang: $nama\n kode Barang: $kode\n Kategori: $kategori\n Merk: $merk_tipe\n Kondisi: $kondisi\n Status Kepemilikan: $status_kepemilikan\n Jumlah Barang: $jumlah_barang\n Spesifikasi: $spesifikasi\n Tahun Pembuatan: $tahun_pembuatan\n Tahun Pembelian: $tahun_pembelian";

    include "assets/libs/qrlib.php";

    
    $qr_code_file_lama = "qrcodes/barang_$id.png";

    // Memeriksa apakah file atau direktori ada
    if (file_exists($qr_code_file_lama)) {
        
        if (!unlink($qr_code_file_lama)) {

            echo "Gagal menghapus file QR code lama";
        }
    }

    $ukuran_qr_code = 2;
    
    // Buat QR code baru
    QRcode::png($data, $qr_code_file_baru, QR_ECLEVEL_L, $ukuran_qr_code );

    $sql_update_qr = "UPDATE barang SET qr_code = '$qr_code_file_baru' WHERE id = $id";

    if ($conn->query($sql_update_qr) === TRUE) {
       
        header('Location:barang.php?pesan=Data Berhasil di Edit');
        // Tampilkan gambar QR code
        readfile($qr_code_file_baru);
        exit;
    } else {
        header("Location:barang.php?pesan=Data Berhasil diedit, tetapi QR code tidak diperbarui");
    }
} else {
    header("Location:edit_barang.php?pesan=Data Gagal diedit");
}

$conn->close();
?>