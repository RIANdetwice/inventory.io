<?php
// mulai sesi 
session_start();

// hapus data sesi
session_unset();

// hancurkan data sesi
session_destroy();

// redirect ke halaman login
header("Location:login.php");
?>