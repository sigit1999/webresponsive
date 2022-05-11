<?php
error_reporting(0);

require 'function.php';
require 'ceklog.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Result Transaksi</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Result Transaksi</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <?php
                        $nama = mysqli_query($conn, "select * from login");
                        while ($list = mysqli_fetch_array($nama)) {
                            $name = $list['nama'];
                        ?>
                            <div>
                                <h3 class="sb-sidenav-menu-heading" style="margin-left: 35px;">Welcome <?= $name; ?></h3>
                                <img src="assets/img/settings.png" alt="" style="margin-left: 70px;">
                            </div>

                        <?php
                        }
                        ?>

                        <div class="sb-sidenav-menu-heading">Menu</div>
                         <a class="nav-link" href="index.php">
                            <div class="fa fa-home"><i class="fas fa-credit-card"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="penjualan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-layer-group"></i></div>
                            Stock
                        </a>
                        <a class="nav-link" href="pegawai.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                            Pegawai
                        </a>
                        <a class="nav-link" href="pembeli.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-bag"></i></div>
                            Pembeli
                        </a>
                        <a class="nav-link" href="transaksi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                            Transaksi
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Stock Penjualan Mobil Bekas</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hpmodal">
                                Tambah Stock
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Merk</th>
                                            <th>Tipe</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Spek</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $viewmobil = mysqli_query($conn, "SELECT * FROM `barang`");
                                        while ($data = mysqli_fetch_array($viewmobil)) {
                                            $id_mobil = $data['id_mobil'];
                                            $merk = $data['merk'];
                                            $tipe = $data['tipe'];
                                            $harga = $data['harga_mobil'];
                                            $stock = $data['stock_mobil'];
                                            $spek = $data['spesifikasi'];

                                        ?>
                                            <tr>
                                                <td><?= $id_mobil; ?></td>
                                                <td><?= $merk; ?></td>
                                                <td><?= $tipe; ?></td>
                                                <td><?= "Rp " . $harga; ?></td>
                                                <td><?= $stock ?></td>
                                                <td><?= $spek; ?></td>
                                                <td>
                                                    <button style="margin: 2px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalupdate<?= $id_mobil; ?>">Update</button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete<?= $id_mobil; ?>">Delete</button>
                                                </td>
                                            </tr>
                                            <!-- update modal -->
                                            <div class="modal fade" id="modalupdate<?= $id_mobil; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update KB</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <input type="text" name="merk" value="<?= $merk; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="text" name="tipe" value="<?= $tipe; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="number" name="harga_mobil" value="<?= $harga; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="number" name="stock_mobil" value="<?= $stock; ?>" class="form-control" required>
                                                                <br />
                                                                <textarea type="text" class="form-control" name="spesifikasi" rows="3" required><?= $spek; ?></textarea>
                                                                <input type="hidden" name="id_mobil" value="<?= $id_mobil; ?>">
                                                                <br />
                                                                <button type="submit" name="update_mobil" class="btn btn-warning">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- update modal -->

                                            <!-- delete modal -->
                                            <div class="modal fade" id="modaldelete<?= $id_mobil; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus KB</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <fieldset disabled>
                                                                    <input type="text" name="merk" value="<?= $merk; ?>" class="form-control" required>
                                                                    <br />
                                                                    <input type="text" name="tipe" value="<?= $tipe; ?>" class="form-control" required>
                                                                    <br />
                                                                </fieldset>
                                                                <br />
                                                                Apakah anda ingin menghapus stock Barang ini?
                                                                <br />
                                                                <br />
                                                                <input type="hidden" name="idmobil" value="<?= $id_mobil; ?>">
                                                                <button type="submit" name="delete_mobil" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- delete modal -->

                                        <?php
                                        };

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; <a href="https://acbagusid.anandanesia.com/about.html" style="text-decoration:none;">WEB | PRO 1</a></div>
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

<div class="modal fade" id="hpmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="text" name="merk" placeholder="merk" class="form-control" required>
                    <br />
                    <input type="text" name="tipe" placeholder="tipe" class="form-control" required>
                    <br />
                    <input type="number" name="harga_mobil" placeholder="harga" class="form-control" required>
                    <br />
                    <input type="number" name="stock_mobil" placeholder="stock" class="form-control" required>
                    <br />
                    <textarea type="text" placeholder="spesifikasi Mobil" class="form-control" name="spek" rows="3" required></textarea>
                    <br />
                    <button type="submit" name="insert_mobil" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>