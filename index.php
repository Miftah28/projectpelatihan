<?php

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
    <link rel="stylesheet" href="css/bootstrap.css">
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

        /* .d-flex #btn {
            position: absolute;
            color: #fff;
            left: 90%;
            top: 6px;
            font-size: 20px;
            height: 50px;
            width: 50px;
            text-align: center;
            line-height: 50px;
            transform: translateX(-50%);
        } */
    </style>
    <!-- Custom styles for this template -->
    <link href="css/sidebars.css" rel="stylesheet">
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
                <!-- <i class="bx bx-menu" id="btn"></i> -->
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link text-white " aria-current="page">
                        <i class='bx bx-home'></i>
                        <span>Home</span>
                    </a>
                </li> -->
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
                    <a href="Supir.php" class="nav-link text-white">
                        <i class='bx bx-user'></i>
                        <span>Supir</span>
                    </a>
                </li>
                <li>
                    <a href="peminjamanpengembalian.php" class="nav-link text-white">
                        <i class='bx bx-wallet'></i>
                        <span>Peminjaman/Pengembalian</span>
                    </a>
                </li>
                <li>
                    <a href="Laporan.php" class="nav-link text-white">
                        <i class='bx bx-file-blank'></i>
                        <span>Laporan</span>
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>

    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>