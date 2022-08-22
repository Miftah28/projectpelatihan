<?php

include 'config/app.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
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
    <!-- Custom styles for this template -->
    <link href="assets/css/sidebars.css" rel="stylesheet">
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
                    <a href="index.php" class="nav-link active">
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
        <div class="container text-center ">
            <div class="row justify-content-evenly ">
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-evenly ">
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- assets plugin datatables -->
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