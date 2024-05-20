<?php
session_start();

// koneksi
$conn = new mysqli("localhost", "root", "", "db_inventori");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ambil data dari form registrasi
$username = $_POST['username'];
$password = $_POST['password'];

// enkripsi password 
$ecnrypted_password = md5($password);

// memasukkan data 
$sql = "INSERT INTO login (username, password) VALUES ('$username', '$ecnrypted_password')";

if ($conn->query($sql) === TRUE) {
    header("location:login.php?pesan=Register Berhasil!");
} else {
    echo "Error" . $sql . "<br>" . $conn->error;
}

$conn->close();