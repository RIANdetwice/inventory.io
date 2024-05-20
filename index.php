<?php 
    
    session_start();

    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['username'])) {
        // Jika belum, arahkan ke halaman login
        header("Location: login.php");
        exit();
    }

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="theme_ocean" />
    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title> inventory Barang || Dashboard</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/vendors.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/daterangepicker.min.css" />
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/theme.min.css" />
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
			<script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>
    <!--! ================================================================ !-->
    <!--! [Start] Navigation Manu !-->
    <!--! ================================================================ !-->
    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="barang.php" class="b-brand">
                    <h4 class="logo logo-lg" > Inventory Barang</h4>
                    <img src="assets/images/inventory.png" alt="" class="logo logo-sm" >
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboards</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="data_merk.php">data Merk</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="kategori.php">Data Kategori</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-power"></i></span>
                            <span class="nxl-mtext">authentication</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="register.php">register</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="login.php">login</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!--! ================================================================ !-->
    <!--! [End]  Navigation Manu !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! [Start] Header !-->
    <!--! ================================================================ !-->
    <header class="nxl-header">
        <div class="header-wrapper">
            <!--! [Start] Header Left !-->
            <div class="header-left d-flex align-items-center gap-4">
                <!--! [Start] nxl-head-mobile-toggler !-->
                <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <!--! [Start] nxl-head-mobile-toggler !-->
                <!--! [Start] nxl-navigation-toggle !-->
                <div class="nxl-navigation-toggle">
                    <a href="javascript:void(0);" id="menu-mini-button">
                        <i class="feather-align-left"></i>
                    </a>
                    <a href="javascript:void(0);" id="menu-expend-button" style="display: none">
                        <i class="feather-arrow-right"></i>
                    </a>
                </div>
                <!--! [End] nxl-navigation-toggle !-->
                <!--! [Start] nxl-lavel-mega-menu-toggle !-->
                <div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
                    <a href="javascript:void(0);" id="nxl-lavel-mega-menu-open">
                        <i class="feather-align-left"></i>
                    </a>
                </div>
                <!--! [End] nxl-lavel-mega-menu-toggle !-->
                <!--! [Start] nxl-lavel-mega-menu !-->
                <div class="nxl-drp-link nxl-lavel-mega-menu">
                    <div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
                        <a href="javascript:void(0)" id="nxl-lavel-mega-menu-hide">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <!--! [Start] nxl-lavel-mega-menu-wrapper !-->
                    <!--! [End] nxl-lavel-mega-menu-wrapper !-->
                </div>
                <!--! [End] nxl-lavel-mega-menu !-->
            </div>
            <!--! [End] Header Left !-->
            <!--! [Start] Header Right !-->
            <div class="header-right ms-auto">
    <div class="d-flex align-items-center">
        <div class="nxl-h-item d-none d-sm-flex">
            <div class="full-screen-switcher">
                <a href="javascript:void(0);" class="nxl-head-link me-0" onclick="$('body').fullScreenHelper('toggle');">
                    <i class="feather-maximize maximize"></i>
                    <i class="feather-minimize minimize"></i>
                </a>
            </div>
        </div>
        <div class="nxl-h-item dark-light-theme">
            <a href="javascript:void(0);" class="nxl-head-link me-0 dark-button">
                <i class="feather-moon"></i>
            </a>
            <a href="javascript:void(0);" class="nxl-head-link me-0 light-button" style="display: none">
                <i class="feather-sun"></i>
            </a>
        </div>
        <div class="dropdown nxl-h-item">
            <a class="nxl-head-link me-3" data-bs-toggle="dropdown" href="#" role="button" data-bs-auto-close="outside">
                <i class="feather-bell"></i>
                <span class="badge bg-danger nxl-h-badge">3</span>
            </a>
            
    <!-- Contoh pesan notifikasi -->
    <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-notifications-menu">
    <div class="d-flex justify-content-between align-items-center notifications-head">
        <h6 class="fw-bold text-dark mb-0">Notifications</h6>
        <a href="javascript:void(0);" class="fs-11 text-success text-end ms-auto" data-bs-toggle="tooltip" title="Make as Read">
            <i class="feather-check"></i>
            <span>Make as Read</span>
        </a>
    </div>
    <!-- Pesan Notifikasi -->
    <?php if (!empty($pesan_notifikasi)) { ?>
        <div class="notifications-item">
            <div class="notifications-desc">
                <a href="javascript:void(0);" class="font-body text-truncate-2-line">
                    <span class="fw-semibold text-dark"><?php echo $pesan_notifikasi; ?></span>
                </a>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="notifications-date text-muted border-bottom border-bottom-dashed"><?php echo date("Y-m-d H:i:s"); ?></div>
                    <div class="d-flex align-items-center float-end gap-2">
                        <a href="javascript:void(0);" class="d-block wd-8 ht-8 rounded-circle bg-gray-300" data-bs-toggle="tooltip" title="Make as Read"></a>
                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" title="Remove">
                            <i class="feather-x fs-12"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <div class="text-center notifications-footer">
        <a href="javascript:void(0);" class="fs-13 fw-semibold text-dark">All Notifications</a>
    </div>
</div>

        </div>
        <div class="dropdown nxl-h-item">
            <a href="javascript:void(0);" data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside">
                <i class="feather-user img-fluid user-avtar me-0 btn"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                <div class="dropdown-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="text-dark mb-0">
                                <?php
                                    if (isset($_SESSION['username'])) {
                                            echo $_SESSION['username'];
                                    } else {
                                            echo "Tamu";
                                    }
                                ?>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0);" class="dropdown-item">
                    <i class="feather-user"></i>
                    <span>Profile Details</span>
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <i class="feather-settings"></i>
                    <span>Account Settings</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="./auth-login-minimal.html" class="dropdown-item">
                    <i class="feather-log-out"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
</div>

    </header>
    <!--! ================================================================ !-->
    <!--! [End] Header !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! BEGIN: Theme Customizer !-->
    <!--! ================================================================ !-->
    
    <!--! ================================================================ !-->
    <!--! [End] Theme Customizer !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! Footer Script !-->
    <!--! ================================================================ !-->
    <!--! BEGIN: Vendors JS !-->
    <script src="assets/vendors/js/vendors.min.js"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="assets/vendors/js/daterangepicker.min.js"></script>
    <script src="assets/vendors/js/apexcharts.min.js"></script>
    <script src="assets/vendors/js/circle-progress.min.js"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="assets/js/common-init.min.js"></script>
    <script src="assets/js/dashboard-init.min.js"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="assets/js/theme-customizer-init.min.js"></script>
    <!--! END: Theme Customizer !-->
</body>

</html>