<?php
// koneksi data base
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

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;

    }

    return $rows;
}

function tambah3($data) {
    global $conn;
    $id = htmlspecialchars($data['id_obat']);
    $nama_obat = htmlspecialchars($data['nama_obat']);

    $query = "INSERT INTO obat 
                VALUES 
                ('', '$nama_obat')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  
}


function hapus3 ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM obat WHERE id_obat =$id");
    return mysqli_affected_rows($conn);
}

function ubah3 ($data) {
    global $conn;

    $id = htmlspecialchars($data['id_obat']);
    $nama_obat = htmlspecialchars($data['nama_obat']);

    $query = "UPDATE obat SET
                id_obat = '$id',
                nama_obat = '$nama_obat'
               WHERE id_obat = $id
              ";
    mysqli_query($conn, $query) or die ("Eror in query: $query");



    return mysqli_affected_rows($conn);
}

function cari3 ($keyword) {
    $query = "SELECT * FROM obat
                WHERE 
                nama_obat LIKE '%$keyword%' OR
                id_obat LIKE '%$keyword%'
              ";
    return query($query);
}



?>