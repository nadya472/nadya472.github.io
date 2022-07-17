<?php

require 'function.php';

$id = $_GET["id"];

if(hapus($id) > 0) {
    echo "<script>alert('Data Dokter berhasil dihapus'); 
    window.location.href='dokter.php'</script>";
    } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Dokter gagal dihapus');
      window.location.href='dokter.php'</script>";
    }

?>