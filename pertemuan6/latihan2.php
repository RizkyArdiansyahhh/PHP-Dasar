<?php
if(!isset($_GET["nama"]) && !isset($_GET["nrp"]) && !isset($_GET["email"]) && !isset($_GET["jurusan"])){
   header("Location: latihan1.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <li>Nama : <?= $_GET["nama"] ?></li>
        <li>NRP : <?= $_GET["nrp"] ?></li>
        <li>Email : <?= $_GET["email"] ?></li>
        <li>Jurusan : <?= $_GET["jurusan"] ?></li>

    </ul>
</body>

</html>