<?php
require 'function4.php';

$id = $_GET["id"];

if(hapus4($id) > 0) {
    echo "<script>alert('Data Rekam Medis berhasil dihapus'); 
    window.location.href='berobat.php'</script>";
    } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Rekam Medis gagal dihapus');
      window.location.href='berobat.php'</script>";
    }


?>