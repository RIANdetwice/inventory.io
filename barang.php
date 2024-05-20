<?php 
include "index.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Barang</title>
    <style>
        .custom-margin {
            margin-right: 5px;
        }
        .action-icons a, .action-cetak a {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="main-content">
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Inventory Barang</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <a href="form_barang.php" class="btn btn-dark">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i> Tambah Barang Baru</div>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Verifikasi</th>
                                            <th>Nama Barang</th>
                                            <th>Kode Barang</th>
                                            <th>Kategori</th>
                                            <th>Merk</th>
                                            <th>Kondisi</th>
                                            <th>Status Kepemilikan</th>
                                            <th>Jumlah Barang</th>
                                            <th>Spesifikasi</th>
                                            <th>Tahun Pembuatan</th>
                                            <th>Tahun Pembelian</th>
                                            <th>Nama Pemilik</th>
                                            <th>QR code</th>
                                            <th class="action-icons">Action</th>
                                            <th>Cetak</th>
                                        </tr>     
                                    </thead>
                                    <tbody>
                                        <?php
                                            $conn = new mysqli("localhost", "root", "", "db_inventori");

                                            $query = "SELECT * FROM barang";
                                            $result = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($result) > 0) {

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["kode_verifikasi"] . "</td>";
                                                    echo "<td>" . $row["nama"] . "</td>";
                                                    echo "<td>" . $row["kode"] . "</td>";
                                                    echo "<td>" . $row["kategori"] . "</td>";
                                                    echo "<td>" . $row["merk_tipe"] . "</td>";
                                                    echo "<td>" . $row["kondisi"] . "</td>";
                                                    echo "<td>" . $row["status_kepemilikan"] . "</td>";
                                                    echo "<td>" . $row["jumlah_barang"] . " unit</td>";
                                                    echo "<td>" . $row["spesifikasi"] . "</td>";
                                                    echo "<td>" . date('Y', strtotime($row["tahun_pembuatan"])) . "</td>";
                                                    echo "<td>" . date('Y', strtotime($row["tahun_pembelian"])) . "</td>";
                                                    echo "<td>" . $row["kepemilikan"] . "</td>";
                                                    echo "<td><a href='hasil_scan.php?id=" . $row["id"] . "'><img src='qrcodes/barang_" . $row["id"] . ".png' alt='QR code'></a></td>";
                                                    echo "<td class='action-icons'>";
                                                    echo "<a class='btn btn-dark btn-sm custom-margin' href='edit_barang.php?id=" . $row["id"] . "'><i class='fas fa-edit'></i></a>";
                                                    echo "<a class='btn btn-dark btn-sm custom-margin' href='hapus_barang.php?id=" . $row["id"] . "'><i class='fas fa-trash-alt'></i></a>";
                                                    echo "</td>";
                                                    echo "<td class='action-cetak'>";
                                                    echo "<a class='btn btn-dark btn-sm' href='cetak_qrcode.php?id=" . $row["id"] . "' target='_blank'><i class='fas fa-print'></i> Cetak</a>"; 
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='15'>Tidak Ada data yang Tersedia.</td></tr>";
                                            }
                                            mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
