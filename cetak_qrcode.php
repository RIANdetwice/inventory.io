<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = new mysqli("localhost", "root", "", "db_inventori");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $query = "SELECT * FROM barang WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $qr_code_path = "qrcodes/barang_" . $row["id"] . ".png";
        $verification_code = "nopqrstuvwxyzABCDEFGHI";  // Contoh kode verifikasi
    } else {
        echo "Data Tidak Ditemukan";
        exit();
    }

    mysqli_close($conn);
} else {
    echo "ID barang tidak ditemukan";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak QR Code - Inventori Barang</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .scan-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid #000;
            padding: 20px;
            background-color: #fff;
        }

        .scan-header {
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 15px;
        }

        .qrcode {
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
            border: 5px solid #000;
        }

        .verification-code {
            width: 100%;
            height: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            position: relative;
            border-radius: 15px;
        }

        .verification-code::after {
            content: "";
            position: absolute;
            width: 80%;
            height: 1px;
            background-color: #fff;
            top: 50%;
            transform: translateY(-50%);
        }

        .verification-code span {
            background-color: #007bff;
            padding: 0 10px;
            z-index: 1;
        }

        .button {
            margin-top: 20px;
            text-align: center;
        }

        .button button {
            padding: 10px 20px;
            font-size: 16px;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                -webkit-print-color-adjust: exact; /* Chrome, Safari */
                color-adjust: exact; /* Firefox */
            }
            .scan-container {
                width: 7cm;
                height: 6cm;
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .scan-header, .verification-code {
                width: 100%;
                height: 100px;
                background-color: #007bff !important;
                color: #fff;
                font-size: 16px;
                font-weight: bold;
                text-align: center;
                margin-top: 20px;
                position: relative;
                border-radius: 15px;
            }
            .qrcode {
                width: 6.5cm;
                height: auto;
                border: 5px solid #000;
            }
            .button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="scan-container">
        <div class="scan-header">SCAN ME</div>
        <img src="<?php echo $qr_code_path; ?>" alt="QR code" class="qrcode">
        <div class="verification-code">
            <span>Kode Verifikasi</span>
            <span><?php echo $verification_code; ?></span>
        </div>
    </div>
    <div class="button">
        <button onclick="window.print();">Cetak</button>
        <button onclick="window.close();">Tutup</button>
    </div>
</body>
</html>
