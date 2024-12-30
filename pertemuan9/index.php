<?php
require 'functions.php';
$mahasiswa = (query("SELECT * FROM mahasiswa"));

   
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
    <a href="tambah.php">Tambah Mahasiswa</a>
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
        <?php foreach($mahasiswa as $mhs) :?>
        <tr>
            <td>1</td>
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
</body>

</html>