<?php
$conn = mysqli_connect("localhost", "root", "" , "phpdasar");
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $nim = $data["nim"];
    $nama = $data["nama"];
    $email = $data["email"];
    $jurusan = $data["jurusan"];
    $gambar = $data["gambar"];

    $query = "INSERT INTO mahasiswa
                (nim, nama, email, jurusan, gambar)
                VALUES 
                ('$nim', '$nama', '$email', '$jurusan', '$gambar')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
 ?>