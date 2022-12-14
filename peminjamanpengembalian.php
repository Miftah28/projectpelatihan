<?php

include 'config/app.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
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
                    <a href="Kendaraan.php" class="nav-link text-white">
                        <i class='bx bxs-car-wash'></i>
                        <span>Kendaran</span>
                    </a>
                </li>
                <li>
                    <a href="peminjamanpengembalian.php" class="nav-link active">
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
                    <!-- <li><a class="dropdown-item" href="logout.php">Sign out</a></li> -->
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
        <form action="" method="post">
            <div class="card" style="position: relative; left: 25px; width: 1045px; padding: 8px 40px; height-max: 655px; border: 6px;">
                <div class="card-body">
                    <h5 class="card-title text-center">Special title treatment</h5>
                    <table class="table" border="2">
                        <thead>
                            <tr>
                                <th class="table-dark" scope="col">No</th>
                                <th class="table-dark" scope="col">Nama</th>
                                <th class="table-dark" scope="col">Jaminan</th>
                                <th class="table-dark" scope="col">Notelp</th>
                                <th class="table-dark" scope="col">Alamat</th>
                                <th class="table-dark" scope="col">Sewa</th>
                                <th class="table-dark" scope="col">lama Sewa</th>
                                <th class="table-dark" scope="col">Bayar</th>
                                <th class="table-dark" scope="col">Status Bayar</th>
                                <th class="table-dark" scope="col">Sisa Pembayaran</th>
                                <th class="table-dark" scope="col">Status Kendaraan</th>
                                <th class="table-dark" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Mark</td>
                                <td>Otto</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>