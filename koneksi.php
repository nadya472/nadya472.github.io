<?php
$host = "localhost";
$user = "adminklinik";
$pass = "312010110";
$db = "klinik_312010110";
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn == false)
{
    echo "Koneksi ke server gagal.";
    die();
} #else echo "Koneksi berhasil";

?>