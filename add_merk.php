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

        $merk = $_POST['nm_merk'];

        $sql = "INSERT INTO merk (nm_merk) VALUES ('$merk')";

        if($conn->query($sql) === TRUE) {
            header("Location:merk.php?pesan=Data Berhasil ditambahkan! ");
            exit();
        } else {
            header("Location:merk.php?pesan=Data Gagal Ditambahkan");
        }

        $conn->close();
    } else {
        echo "Akses Ditolak";
    }
?>