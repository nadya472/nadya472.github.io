<?php
// koneksi data base
require '../koneksi.php';

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query) or die ("Eror in query: $query");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;

    }

    return $rows;
}
function registrasi($data) {

    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    

      // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                    alert('Konfirmasi password tidak sesuai!');
                </script>";
        return false;
    }

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username  FROM users WHERE
                username = '$username'");

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
         alert('Username sudah terdaftar')
         </script>";

         return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // tambahkan userbaru ke data base
    mysqli_query($conn, "INSERT INTO users VALUES ('','$username', '$password')");

    return mysqli_affected_rows($conn);



}

function hapus5 ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM users WHERE id =$id");
    return mysqli_affected_rows($conn);
}

function cari5 ($keyword) {
    $query = "SELECT * FROM users 
                WHERE 
                username LIKE '%$keyword%' OR
                id LIKE '%$keyword%'
              ";
    return query($query);
}



?>