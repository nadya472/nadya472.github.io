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

function tambah($data) {
    global $conn;
    $id = htmlspecialchars($data['id_dokter']);
    $nama_dokter = htmlspecialchars($data['nama_dokter']);

    $query = "INSERT INTO dokter 
                VALUES 
                ('', '$nama_dokter')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

  
}

function hapus ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM dokter WHERE id_dokter =$id");
    return mysqli_affected_rows($conn);
}

function ubah ($data) {
    global $conn;

    $id = htmlspecialchars($data['id_dokter']);
    $n_dokter = htmlspecialchars($data['nama_dokter']);

    $query = "UPDATE dokter SET
                id_dokter = '$id',
                nama_dokter = '$n_dokter'
               WHERE id_dokter = $id
              ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function cari ($keyword) {
    $query = "SELECT * FROM dokter 
                WHERE 
                nama_dokter LIKE '%$keyword%' OR
                id_dokter LIKE '%$keyword%'
              ";
    return query($query);
}
?>