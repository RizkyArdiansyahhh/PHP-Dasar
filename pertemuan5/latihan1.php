<?php 

$mahasiswa = [
    [
        "nama" => "Rizky ardiansyah",
        "nim" => "2203110502",
        "jurusan" => "riski@gmail.com",
        "img" => "1.jpg"
    ],
    [
        "nama" => "Rizky ardiansyah",
        "nim" => "2203110502",
        "jurusan" => "riski@gmail.com",
        "img" => "1.jpg"
    ],
    [
        "nama" => "Rizky ardiansyah",
        "nim" => "2203110502",
        "jurusan" => "riski@gmail.com",
        "img" => "1.jpg"
    ]
]


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    img {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
    </style>
</head>


<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach($mahasiswa as $mhs) : ?>
        <li><img src="img/<?= $mhs["img"] ?>" alt=""></li>
        <li><?= $mhs["nama"] ?></li>
        <li><?= $mhs["nim"] ?></li>
        <li><?= $mhs["jurusan"] ?></li>
        <?php endforeach ?>
    </ul>
</body>

</html>