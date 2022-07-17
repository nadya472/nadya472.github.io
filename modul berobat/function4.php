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
    $result = mysqli_query($conn, $query) or die ("Eror in query: $query");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;

    }

    return $rows;
}


function hapus4 ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM berobat WHERE id_berobat =$id");
    return mysqli_affected_rows($conn);
}


function cari4 ($keyword) {
    $query = "SELECT * FROM berobat
                INNER JOIN pasien ON berobat.id_pasien = pasien.id_pasien
                INNER JOIN dokter ON berobat.id_dokter = dokter.id_dokter
                INNER JOIN obat ON berobat.id_obat = obat.id_obat
                WHERE 
                nama_pasien LIKE '%$keyword%' OR
                jenis_kelamin LIKE '%$keyword%' OR
                umur LIKE '%$keyword%' OR
                keluhan_pasien LIKE '%$keyword%' OR
                hasil_diagnosa LIKE '%$keyword%' OR
                nama_dokter LIKE '%$keyword%' OR
                nama_obat LIKE '%$keyword%' OR
                penatalaksanaan LIKE '%$keyword%' 
              ";
    return query($query);
}

function tambah4($berobat) {
    global $conn;

    $id_berobat = isset($data['id_berobat']) ? htmlspecialchars($data['id_berobat']) : '';
    $tgl_berobat = isset($data['tgl_berobat']) ? date('Y-m-d', strtotime($data['tgl_berobat'])) : '';
    $keluhan_pasien = isset($data['keluhan_pasien']) ? htmlspecialchars($data['keluhan_pasien']) : '';
    $hasil_diagnosa = isset($data['hasil_diagnosa']) ? htmlspecialchars($data['hasil_diagnosa']) : '';
    $penatalaksanaan = isset($data['penatalaksanaan']) ? htmlspecialchars($data('penatalaksanaan')) : '';

   
    $insert = query("INSERT INTO berobat  (id_berobat, id_pasien, id_dokter, id_obat, tgl_berobat, keluhan_pasien, hasil_diagnosa, penatalaksanaan)
                         VALUES 
                        ('',
                        '$_POST[id_pasien]',
                        '$_POST[id_dokter]',    
                        '$_POST[id_obat]',
                        '$_POST[tgl_berobat]',
                        '$_POST[keluhan_pasien]',
                        '$_POST[hasil_diagnosa]',
                        '$_POST[penatalaksanaan]'
                        )
                 ");

    mysqli_query($conn, $query);

    if ($insert) {
        echo 'Berhasil';
    }
    else {
        echo 'Gagal';
    }

    return mysqli_affected_rows($conn);
  
}





?>