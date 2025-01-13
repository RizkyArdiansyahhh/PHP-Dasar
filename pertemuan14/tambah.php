<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';
if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        echo "
        <script>
        alert('Data berhasil di tambahkan')
        document.location.href = 'index.php'
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Data Tidak berhasil di tambahkan')
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
    <h1>Tambah data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for=" nim">Nim</label>
            <input id="nim" type="text" name="nim">
        </div>
        <div>
            <label for="nama">Nama</label>
            <input id="nama" type="text" name="nama">
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" type="text" name="email">
        </div>
        <div>
            <label for="jurusan">Jurusan</label>
            <input id="jurusan" type="text" name="jurusan">
        </div>
        <div>
            <label for="gambar">Gambar</label>
            <input id="gambar" type="file" name="gambar">
        </div>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>

</html>