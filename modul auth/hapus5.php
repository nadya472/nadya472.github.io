<?php
require 'function5.php';

$id = $_GET["id"];

if(hapus5($id) > 0) {
    echo "<script>alert('Data User berhasil dihapus'); 
    window.location.href='users.php'</script>";
    } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data User Medis gagal dihapus');
      window.location.href='user.php'</script>";
    }


?>