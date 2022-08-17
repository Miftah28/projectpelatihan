<?php

include 'config/app.php';

// menerima id kendaraan yang akan di hapus
$idkendaraan =(int)$_GET['idkendaraan'];

if(delete_kendaraan($idkendaraan) > 0){
    echo "  <script>
    alert('Data Kendaraan Berhasil Di Hapus');
    document.location.href = 'kendaraan.php';
</script>";
} else {
echo "  <script>
    alert('Data Kendaraan Gagal Di Hapus');
    document.location.href = 'kendaraan.php';
</script>";
}
