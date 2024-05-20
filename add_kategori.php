<?php
    // hanya akses dengan POST
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // koneksi ke data base
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_inventori";

        $conn = new mysqli($servername,$username,$password,$dbname);

        if($conn->connect_error) {
            die("koneksi gagal:" .$conn->connect_error);
        }

        $kategori = $_POST['nm_kategori'];

        $sql = "INSERT INTO kategori (nm_kategori) VALUES ('$kategori')";

        if($conn->query($sql) === TRUE) {
            header("Location:kategori.php?pesan=Data Berhasil ditambahkan! ");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Akses Ditolak";
    }
?>