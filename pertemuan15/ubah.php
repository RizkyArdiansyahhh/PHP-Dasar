<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$id = $_GET["id"];


$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
$gambarCurrent = $mhs["gambar"];

if(isset($_POST["submit"])){
    if(ubah($_POST, $id, $gambarCurrent) > 0){
        echo "
        <script>
        alert('Data berhasil di Ubah')
        document.location.href = 'index.php'
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Data Tidak berhasil di Ubah')
        </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>

</head>

<body>
    <h1>Ubah data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="nim">Nim</label>
            <input id="nim" type="text" name="nim" value="<?= $mhs["nim"] ?>">
        </div>
        <div>
            <label for="nama">Nama</label>
            <input id="nama" type="text" name="nama" value="<?= $mhs["nama"] ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" type="text" name="email" value="<?= $mhs["email"] ?>">
        </div>
        <div>
            <label for="jurusan">Jurusan</label>
            <input id="jurusan" type="text" name="jurusan" value="<?= $mhs["jurusan"] ?>">
        </div>
        <div>
            <label for="gambar">Gambar</label>
            <br>
            <img src="img/<?= $mhs["gambar"] ?>" alt="" width="60">
            <br>
            <input id="gambar" type="file" name="gambar" value="<?= $mhs["gambar"] ?>">
        </div>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>

</html>