<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
$screen = true;
if(isset($_POST["cari"])){
    if(empty(cari($_POST["keyword"]))){
        $mahasiswa = [];
        $screen = false;

    }else{
        $mahasiswa = cari($_POST["keyword"]);
    }
    
}

   
// 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <form action="" method="post">
        <input type="text" name="keyword" placeholder="masukkan kata kunci..." autocomplete="off" size=100>
        <button type="submit" name="cari">Cari</button>
    </form>
    <br>
    <a href="logout.php">Logout</a><br>
    <a href=" tambah.php">Tambah Mahasiswa</a>
    <?php if($screen && !empty($mahasiswa)) : ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $no = 1 ?>
        <?php foreach($mahasiswa as $mhs) :?>
        <tr>
            <td><?= $no++ ?></td>
            <td>
                <a href="ubah.php?id=<?= $mhs["id"] ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $mhs["id"] ?>"
                    onClick="return confirm('apakah anda yakin untuk menghapus?') ">Hapus</a>
            </td>
            <td>
                <img src="img/<?= $mhs["gambar"] ?>" alt="" width="100">
            </td>
            <td><?= $mhs["nim"] ?></td>
            <td><?= $mhs["nama"] ?></td>
            <td><?= $mhs["email"] ?></td>
            <td><?= $mhs["jurusan"] ?></td>
        </tr>
        <?php endforeach ?>
    </table>
    <?php else :  ?>
    <h1>Mohon Masukkan Kata Kunci Yang Sesuai</h1>
    <?php endif ?>
</body>

</html>