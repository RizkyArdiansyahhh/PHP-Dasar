<?php 
$mahasiswa = [
    [
        "nama" => "Rizky ardiansyah",
        "nrp" => "203040068",
        "email" => "tH1Xw@example.com",
        "jurusan" => "Teknik Informatika"
    ],
    [
        "nama" => "bro",
        "nrp" => "203040068",
        "email" => "tH1Xw@example.com",
        "jurusan" => "Teknik industryi"
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
    body {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        justify-content: center;
        align-items: center;
        height: 100vh
    }

    .container {
        width: 200px;
        height: 100px;
        background-color: grey;
        border-radius: 15px;
        padding: 10px
    }
    </style>
</head>

<body>
    <?php foreach($mahasiswa as $mhs) : ?>
    <div class="container">
        <a
            href="latihan2.php?nama=<?= $mhs["nama"] ?>&nrp=<?= $mhs["nrp"] ?>&email=<?= $mhs["email"] ?>&jurusan=<?= $mhs["jurusan"] ?>"><?= $mhs["nama"] ?></a>
    </div>
    <?php endforeach ?>

</body>

</html>