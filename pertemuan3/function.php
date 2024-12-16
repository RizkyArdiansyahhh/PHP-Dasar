<?php

function salam($waktu = "pagi", $nama = "admin"){
    return "$waktu, $nama";
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
    <h1>Selamat <?= salam( "rizky") ?></h1>
</body>

</html>