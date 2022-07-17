<?php

require 'function2.php';

$id = $_GET["id"];

if(hapus2($id) > 0) {
    echo "<script>alert('Data Pasien berhasil dihapus'); 
    window.location.href='pasien.php'</script>";
    } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data dokter gagal dihapus');
      window.location.href='pasien.php'</script>";
    }

?>