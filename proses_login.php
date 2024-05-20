<?php

session_start();

// koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_inventori");

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

// ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// enkirpsi password
$encrypted_password = md5($password);

// query untuk mencari username dan password dalam database
$sql = "SELECT * FROM login WHERE username='$username' AND password='$encrypted_password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header("Location: index.php");
} else {
    echo "username atau password salah";
}

$conn->close();