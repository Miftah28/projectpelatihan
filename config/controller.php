<?php

include 'koneksi.php';

function select($query)
{
    // panggil database
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// fungsi menambahkan data kendaraan
function create_kendaraan($post) {
    global $conn;

    $no_plat = strip_tags($post['no_plat']);
    $merek = strip_tags($post['merek']);
    $jenis = strip_tags($post['jenis']);
    $tahun = strip_tags($post['tahun']);
    $harga = strip_tags($post['harga']);

    //Query tambah data
    $query = "INSERT INTO kendaraan VALUES(null,'$no_plat','$merek','$jenis','$tahun','$harga')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}

// Hapus data kendaraan
function delete_kendaraan($idkendaraan){
    global $conn;

    //Query hapus data
    $query = "DELETE FROM kendaraan WHERE idkendaraan = $idkendaraan";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Edit data kendaraan
function update_kendaraan($post){
    global $conn;

    $idkendaraan    = strip_tags($post['idkendaraan']);
    $no_plat        = strip_tags($post['no_plat']);
    $merek          = strip_tags($post['merek']);
    $jenis          = strip_tags($post['jenis']);
    $tahun          = strip_tags($post['tahun']);
    $harga          = strip_tags($post['harga']);

    //Query update data
    $query = "UPDATE kendaraan SET no_plat = '$no_plat', merek = '$merek', Jenis = '$jenis', tahun = '$tahun', harga = '$harga' WHERE idkendaraan = $idkendaraan;";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

?>