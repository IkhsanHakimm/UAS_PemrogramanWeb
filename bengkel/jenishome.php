<?php
    require 'koneksi.php';
    if (isset($_GET['id_jenis'])) {
        $id_jenis = htmlspecialchars($_GET["id_jenis"]);

        $sql = "DELETE FROM jenis WHERE id_jenis='$id_jenis'";
        $hasil = mysqli_query($kon, $sql);

        if ($hasil) {
            header("Location: jenishome.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>B - Jenis</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Manajemen Bengkel</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                                <a class="nav-link" href="index.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>                           
                            </div>
                            <div class="nav">
                                <a class="nav-link" href="kendaraanhome.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Data Kendaraan
                                </a>                           
                            </div>
                            <div class="nav">
                            <a class="nav-link" href="kubikasihome.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Data Kubikasi
                            </a>                           
                            </div>
                            <div class="nav">
                                <a class="nav-link" href="jenishome.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Data Jenis
                                </a>                           
                                </div>
                            <div class="nav">
                                <a class="nav-link" href="montirhome.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Data Montir
                                </a>                           
                            </div>
                            <div class="nav">
                                <a class="nav-link" href="penangananhome.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Data Penanganan
                                </a>                           
                            </div>
                        </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Jenis</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tabel Jenis </li>
                        </ol>
                        <div class="container">
                        <br>
                        <?php

                        $sql = "SELECT * FROM jenis ORDER BY id_jenis ASC";
                        $hasil = mysqli_query($kon, $sql);
                        $no = 0;
                        ?>

                        <table class="my-3 table table-bordered">
                            <thead class="table-primary">
                                <tr>        
                                    <th>No</th>
                                    <th>ID Jenis</th>
                                    <th>Jenis Kendaraan</th>
                                    <th colspan='2'>Aksi</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            while ($data = mysqli_fetch_array($hasil)) {
                                $no++;
                                ?>

                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $data["id_jenis"]; ?></td>
                                    <td><?php echo $data["jenis_kendaraan"]; ?></td>
                                    <td>
                                        <a href="updatejenis.php?id_kendaraan=<?php echo htmlspecialchars($data['id_jenis']); ?>" class="btn btn-warning" role="button">Update</a>
                                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_jenis=<?php echo $data['id_jenis']; ?>" class="btn btn-danger" role="button">Delete</a>
                                    </td>
                                </tr>

                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <a href="createjenis.php" class="btn btn-primary" role="button">Tambah Data</a>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2024</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
