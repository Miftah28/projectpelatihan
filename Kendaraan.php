<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<?php

include 'config/app.php';
// jika tombol tambah di tekan jalankan script
if (isset($_POST['save'])) {
    if (create_kendaraan($_POST) > 0) {
        echo "  <script>
                        alert('Data Kendaraan Berhasil Di Simpan');
                        document.location.href = 'kendaraan.php';
                    </script>";
    } else {
        echo "  <script>
                        alert('Data Kendaraan Gagal Di Simpan');
                        document.location.href = 'kendaraan.php';
                    </script>";
    }
}

// jika tombol edit ditekan jalankan script
if (isset($_POST['edit'])) {
    if (update_kendaraan($_POST) > 0) {
        echo "  <script>
                        alert('Data Kendaraan Berhasil Di Edit');
                        document.location.href = 'kendaraan.php';
                    </script>";
    } else {
        echo "  <script>
                        alert('Data Kendaraan Gagal Di Edit');
                        document.location.href = 'kendaraan.php';
                    </script>";
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Boxicons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .d-flex .logo_content .logo {
            color: #fff;
            display: flex;
            height: 50px;
            width: 100%;
            align-items: center;
        }

        .logo_content .logo i {
            font-size: 28px;
            margin-right: 5px;
        }

        .logo_content .logo .logo_name {
            font-size: 20px;
            font-weight: 400;
        }
    </style>
    <title>Rental Mobile</title>
</head>

<body style="background:#eaeaea;">
    <main class="d-flex flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 " style="background: #11101D; width: 277px; height: 655px;">
            <div class="logo_content">
                <div class="logo">
                    <i class='bx bxs-car'></i>
                    <div class="logo_name">Rental Mobil</div>
                </div>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="index.php" class="nav-link text-white">
                        <i class='bx bx-grid-alt'></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="Kendaraan.php" class="nav-link active">
                        <i class='bx bxs-car-wash'></i>
                        <span>Kendaran</span>
                    </a>
                </li>
                </li>
                <li>
                    <a href="peminjamanpengembalian.php" class="nav-link text-white">
                        <i class='bx bx-wallet'></i>
                        <span>Peminjaman/Pengembalian</span>
                    </a>
                </li>
                <li>
                    <a href="transaksi.php" class="nav-link text-white">
                        <i class='bx bx-wallet'></i>
                        <span>Transaksi</span>
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <?php
                    $user = mysqli_query($conn, "SELECT * FROM users");
                    $row = mysqli_fetch_row($user);
                    ?>
                    <strong><?php echo "$row[1]" ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Sign out
                    </button>
                </ul>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda Ingin Keluar !!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-primary" href="logout.php"> Exit</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="card" style="position: relative; left: 25px; width: 1045px; padding: 8px 40px; height-max: 655px; border: 6px;">
            <div class="card-body">
                <h5 class="card-title text-center">DATA KENDARAAN</h5>
                <hr>
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modaltambah">
                    Tambah Kendaraan
                </button>
                <table class="table table-bordered table-striped mt-3" border="2" id="table">
                    <thead>
                        <tr>
                            <td class="table-dark text-center">No</td>
                            <td class="table-dark text-center">No Plat</td>
                            <td class="table-dark text-center">Merek</td>
                            <td class="table-dark text-center">Jenis</td>
                            <td class="table-dark text-center">Tahun</td>
                            <td class="table-dark text-center">Harga</td>
                            <td class="table-dark text-center">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php
                        $data_kendaraan = select("SELECT * FROM kendaraan");
                        foreach ($data_kendaraan as $kendaraan) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $kendaraan['no_plat']; ?></td>
                                <td><?= $kendaraan['merek']; ?></td>
                                <td><?= $kendaraan['jenis']; ?></td>
                                <td class="text-center"><?= $kendaraan['tahun']; ?></td>
                                <td>Rp. <?= number_format($kendaraan['harga'], 0, ',', '.'); ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modaledit<?= $kendaraan['idkendaraan']; ?>">Edit</button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $kendaraan['idkendaraan']; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- Modal tambah kendaran-->
    <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah kendaraan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="no_plat" class="form-label">No Plat</label>
                            <input type="text" class="form-control" name="no_plat" id="no_plat" placeholder="B 1232 ana" required>
                        </div>
                        <div class="mb-3">
                            <label for="merek" class="form-label">Merek</label>
                            <input type="text" class="form-control" name="merek" id="merek" placeholder="Honda" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select class="form-select" name="jenis" id="jenis" aria-label="Default select example" required>
                                <option selected>Pilih</option>
                                <option value="metic">Metic</option>
                                <option value="manual">Manual</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="2011" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga" placeholder="50000" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Back</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal hapus kendaraan-->
    <?php foreach ($data_kendaraan as $kendaraan) : ?>
        <div class="modal fade" id="modalhapus<?= $kendaraan['idkendaraan'] ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kendaraan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Menghapus data kendaraan : <?= $kendaraan['merek']; ?> ??</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Back</button>
                        <a href="hapuskendaraan.php?idkendaraan=<?= $kendaraan['idkendaraan']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal edit kendaran-->
    <?php foreach ($data_kendaraan as $kendaraan) : ?>
        <div class="modal fade" id="modaledit<?= $kendaraan['idkendaraan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah data kendaraan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <input type="hidden" name="idkendaraan" value="<?= $kendaraan['idkendaraan']; ?>">
                            <div class="mb-3">
                                <label for="no_plat" class="form-label">No Plat</label>
                                <input type="text" class="form-control" name="no_plat" id="no_plat" value="<?= $kendaraan['no_plat']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="merek" class="form-label">Merek</label>
                                <input type="text" class="form-control" name="merek" id="merek" value="<?= $kendaraan['merek']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <select class="form-select" name="jenis" id="jenis" aria-label="Default select example" required>
                                    <?= $jenis = $kendaraan['jenis']; ?>
                                    <option value="metic" <?= $jenis == 'metic' ? ' selected' : null; ?>>Metic</option>
                                    <option value="manual" <?= $jenis == 'manual' ? ' selected' : null; ?>>Manual</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" class="form-control" name="tahun" id="tahun" value="<?= $kendaraan['tahun']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" name="harga" id="harga" value="<?= $kendaraan['harga']; ?>" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-primary" name="edit">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>

</html>