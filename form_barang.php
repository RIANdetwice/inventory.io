<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="theme_ocean">
    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title> Register || - Inventori - </title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/vendors.min.css">
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/theme.min.css">
    <style>
        header {
            margin-top: 50px; /* Menambahkan margin bawah pada header */
        }
    </style>
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <header>
        <h1 class="text-center">Inventory Barang</h1>
    </header>
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4 text-center">Form Data Barang</h2>
                        <form action="add_barang.php" method="post">
                    <!-- <div class="modal-body"> -->
                        <div class="mb-3">
                            <label for="nama">Nama Barang </label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>

                        <div class="mb-3">
                            <label for="kode">Kode Barang </label>
                            <input type="text" name="kode" class="form-control" id="kode">
                        </div>

                        <div class="mb-3">
                            <label for="kategori">Kategori </label>
                            <select name="kategori" id="kategori" class="form-control">
                                <?php
                                    $conn = new mysqli("localhost", "root", "", "db_inventori");
                                    $query = "SELECT nm_kategori FROM kategori";
                                    $result = mysqli_query($conn, $query);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" .$row["nm_kategori"] . "'>" . $row["nm_kategori"] .  "</option>";
                                        }
                                    }
                                    mysqli_close($conn);
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="merk_tipe">merk </label>
                            <select name="merk_tipe" id="merk_tipe" class="form-control">
                                <?php
                                    $conn = new mysqli("localhost", "root", "", "db_inventori");
                                    $query = "SELECT nm_merk FROM merk";
                                    $result = mysqli_query($conn, $query);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" .$row["nm_merk"] . "'>" . $row["nm_merk"] .  "</option>";
                                        }
                                    }
                                    mysqli_close($conn);
                                ?>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="kondisi">kondisi </label>
                            <input type="text" name="kondisi" class="form-control" id="kondisi">
                        </div>

                        <div class="mb-3">
                            <label for="status_kepemilikan">Status Kepemilikan </label>
                            <input type="text" name="status_kepemilikan" class="form-control" id="status_kepemilikan">
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_barang">jumlah barang </label>
                            <input type="number" name="jumlah_barang" class="form-control" id="jumlah_barang">
                        </div>

                        <div class="mb-3">
                            <label for="spesifikasi">spesifikasi </label>
                           <textarea name="spesifikasi" id="spesifikasi" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tahun_pembuatan">tahun pembuatan </label>
                            <input type="date" name="tahun_pembuatan" class="form-control" id="tahun_pembuatan">

                        </div>

                        <div class="mb-3">
                            <label for="tahun_pembelian">tahun pembelian </label>
                            <input type="date" name="tahun_pembelian" class="form-control" id="tahun_pembelian">
                        </div>

                        <div class="mb-3">
                            <label for="kepemilikan">Nama Pemilik Barang </label>
                            <input type="text" name="kepemilikan" class="form-control" id="kepemilikan">
                        </div>

                        <input type="submit" class="btn btn-primary text-center" value="Tambah Barang">
                        
                    <!-- </div> -->
                </form> 
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! BEGIN: Theme Customizer !-->
    <!--! ================================================================ !-->
    
    <!--! ================================================================ !-->
    <!--! END: Theme Customizer !-->
    <!--! ================================================================ !-->
    <!--! BEGIN: Main JavaScript Files !-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/theme.min.js"></script>
    <!--! END: Main JavaScript Files !-->
</body>

</html>
