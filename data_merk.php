<?php 
    include "index.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<main class="nxl-container">
        <div class="nxl-content">
           <div class="main-content">
           <div class="container-fluid px-4">
                        <h1 class="mt-4"> Data Merk </h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i> Tambah merk Baru</div>
                                </button>
                            </div>
                             <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered"  id="datatablesSimple" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>nama merk </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $conn = new mysqli("localhost", "root", "", "db_inventori");

                                                $query = "SELECT * FROM merk";
                                                $result = mysqli_query($conn, $query);

                                                if(mysqli_num_rows($result) > 0) {

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["nm_merk"] . "</td>";
                                                        echo "<td class='action-icons'>";
                                                        echo "<a class='btn btn-dark btn-sm me-2' href='edit_merk.php?id=" . $row["id"] . "'><i class='fas fa-edit'></i></a>";
                                                        echo "<a class='btn btn-info btn-sm' href='hapus_merk.php?id=" . $row["id"] . "'><i class='fas fa-trash-alt'></i></a>";
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='11'>Tidak Ada data yang Tersedia.</td></tr>";
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