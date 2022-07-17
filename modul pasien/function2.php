<?php
// koneksi data base
require '../koneksi.php';

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;

    }

    return $rows;
}

function tambah2($data) {
    global $conn;
    $id = htmlspecialchars($data['id_pasien']);
    $nama_pasien = htmlspecialchars($data['nama_pasien']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $umur = htmlspecialchars($data['umur']);

    $query = "INSERT INTO pasien 
                VALUES 
                ('', '$nama_pasien', '$jenis_kelamin', '$umur')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

  
}

function hapus2 ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pasien WHERE id_pasien =$id");
    return mysqli_affected_rows($conn);
}

function ubah2 ($data) {
    global $conn;
    $id = htmlspecialchars($data['id_pasien']);
    $nama_pasien = htmlspecialchars($data['nama_pasien']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $umur = htmlspecialchars($data['umur']);

    $query = "UPDATE pasien SET
                id_pasien = '$id',
                nama_pasien = '$nama_pasien',
                jenis_kelamin = '$jenis_kelamin',
                umur= '$umur'
               WHERE id_pasien = $id
              ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function cari2 ($keyword) {
    $query = "SELECT * FROM pasien 
                WHERE 
                nama_pasien LIKE '%$keyword%' OR
                id_pasien LIKE '%$keyword%'
              ";
    return query($query);
}
?>