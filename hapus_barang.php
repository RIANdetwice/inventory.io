<?php
    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "db_inventori");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil ID barang yang akan dihapus
    $id_barang = $_GET['id']; 

    // Hapus data barang berdasarkan ID
    $query_delete_barang = "DELETE FROM barang WHERE id = $id_barang";
    $result_delete_barang = $conn->query($query_delete_barang);

    if ($result_delete_barang === TRUE) {
        $pesan_notifikasi = "Data barang berhasil dihapus";
        
        $qr_code_file = "qrcodes/barang_" . $id_barang . ".png";

        if (file_exists($qr_code_file)) {
            unlink($qr_code_file); 
            // echo "Data barang dengan ID $id_barang dan QR code yang sesuai telah dihapus.";
           

        } else {
            echo "QR code untuk barang dengan ID $id_barang tidak ditemukan.";
        }
        header("Location:barang.php");

    } else {
        echo "Gagal menghapus data barang: " . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
?>
