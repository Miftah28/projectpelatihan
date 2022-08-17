<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "rentalmobil";
$conn = mysqli_connect($server, $user, $password, $nama_database);
// echo "berhasil terkoneksi..... ";
if( !$conn ){
die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>