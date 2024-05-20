<?php 
    $conn = new mysqli("localhost", "root", "", "db_inventori");
    
    if($conn->connect_error) {
        die("koneksi gagal" . $conn->connect_error);
    }

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    

    $query = "UPDATE kategori SET nm_kategori='$nama' WHERE id=$id";

    if($conn->query($query) === TRUE) {

        header("Location:kategori.php");
        
    } else {
        header("Location:edit_barang.php?pesan=Data Gagal diedit");
    }

    $conn->close();
?> 