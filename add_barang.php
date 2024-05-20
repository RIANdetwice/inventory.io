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

        $kode_verifikasi = bin2hex(random_bytes(16));
        $nama = $_POST['nama'];
        $kode = $_POST['kode'];
        $kategori = $_POST['kategori'];
        $merk_tipe = $_POST['merk_tipe'];
        $kondisi = $_POST['kondisi'];
        $status_kepemilikan = $_POST['status_kepemilikan'];
        $jumlah_barang = $_POST['jumlah_barang'];
        $spesifikasi = $_POST['spesifikasi'];
        $tahun_pembuatan = $_POST['tahun_pembuatan'];
        $tahun_pembelian = $_POST['tahun_pembelian'];
        $kepemilikan = $_POST['kepemilikan'];

        $sql = "INSERT INTO barang (nama, kode, kategori, merk_tipe, kondisi, status_kepemilikan, jumlah_barang, spesifikasi, tahun_pembuatan, tahun_pembelian, kepemilikan, kode_verifikasi) VALUES ('$nama', '$kode', '$kategori', '$merk_tipe', '$kondisi', '$status_kepemilikan', '$jumlah_barang', '$spesifikasi', '$tahun_pembuatan', '$tahun_pembelian', '$kepemilikan', '$kode_verifikasi')";
    
        if($conn->query($sql) === TRUE ) {

           $id_barang = $conn->insert_id;
           
        //  qr code 
            $data = "Nama Barang: $nama\n kode Barang: $kode\n Kategori: $kategori\n Merk: $merk_tipe\n Kondisi: $kondisi\n Status Kepemilikan: $status_kepemilikan\n Jumlah Barang: $jumlah_barang\n Spesifikasi: $spesifikasi\n Tahun Pembuatan: $tahun_pembuatan\n Tahun Pembelian: $tahun_pembelian\n nama pemilik barang: $kepemilikan";

            include "assets/libs/qrlib.php";

            $qr_code_file = "qrcodes/barang_$id_barang.png";

            

            $ukuran_qr_code = 2;
            
            QRcode::png($data, $qr_code_file, QR_ECLEVEL_L, $ukuran_qr_code);

            $sql_update = "UPDATE barang SET qr_code = '$qr_code_file' WHERE id = $id_barang";
            if ($conn->query($sql_update) === TRUE) {
                $pesan_notifikasi = "Data barang berhasil ditambahkan. QR code tersedia di: <a href='$qr_code_file'>$qr_code_file</a>";
            } else {
                echo "Error: " . $sql_update . "<br>" . $conn->error;
            }

        //  end qr code 

            header("Location:barang.php?pesan=Data Berhasil ditambahkan! ");
            exit();
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Akses Ditolak";
    }
?>