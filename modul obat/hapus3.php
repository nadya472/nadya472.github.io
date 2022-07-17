<?php
require 'function3.php';

$id = $_GET["id"];

if(hapus3($id) > 0) {
    echo "<script>alert('Data Obat berhasil dihapus'); 
    window.location.href='obat.php'</script>";
    } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Obat gagal dihapus');
      window.location.href='obat.php'</script>";
    }


?>