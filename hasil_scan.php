<?php
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum, arahkan ke halaman login
    header("Location: login.php");
    exit();
}

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_inventori");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah 'id' tersedia dalam URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_barang = $_GET['id'];
} else {
    echo "ID tidak valid atau tidak tersedia.";
    exit();
}

// Ambil data dari database
$query = "SELECT * FROM barang WHERE id = $id_barang";
$result = $conn->query($query);

// Periksa apakah data ditemukan
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
            width: 80%;
            max-width: 600px;
            background-color: #007bff;
            color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
        }
        table th {
            width: 40%;
        }
        table td {
            width: 60%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Barang</h1>
        <table>
            <tr>
                <th>Kode Verifikasi</th>
                <td>: <?php echo htmlspecialchars($data['kode_verifikasi']); ?></td>
            </tr>
            <tr>
                <th>Nama Barang</th>
                <td>: <?php echo htmlspecialchars($data['nama']); ?></td>
            </tr>
            <tr>
                <th>Kode Barang</th>
                <td>: <?php echo htmlspecialchars($data['kode']); ?></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>: <?php echo htmlspecialchars($data['kategori']); ?></td>
            </tr>
            <tr>
                <th>Merk</th>
                <td>: <?php echo htmlspecialchars($data['merk_tipe']); ?></td>
            </tr>
            <tr>
                <th>Kondisi</th>
                <td>: <?php echo htmlspecialchars($data['kondisi']); ?></td>
            </tr>
            <tr>
                <th>Status Kepemilikan</th>
                <td>: <?php echo htmlspecialchars($data['status_kepemilikan']); ?></td>
            </tr>
            <tr>
                <th>Jumlah Barang</th>
                <td>: <?php echo htmlspecialchars($data['jumlah_barang']); ?> unit</td>
            </tr>
            <tr>
                <th>Spesifikasi</th>
                <td>: <?php echo htmlspecialchars($data['spesifikasi']); ?></td>
            </tr>
            <tr>
                <th>Tahun Pembuatan</th>
                <td>: <?php echo date('Y', strtotime($data['tahun_pembuatan'])); ?></td>
            </tr>
            <tr>
                <th>Tahun Pembelian</th>
                <td>: <?php echo date('Y', strtotime($data['tahun_pembelian'])); ?></td>
            </tr>
            <tr>
                <th>Nama Pemilik</th>
                <td>: <?php echo htmlspecialchars($data['kepemilikan']); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>

<?php 
// Tutup koneksi database
$conn->close();
?>
