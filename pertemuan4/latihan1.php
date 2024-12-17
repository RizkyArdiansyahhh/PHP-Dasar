<?php 
$numbers = [1,3,2,7,4,8];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .kotak {
        width: 100px;
        height: 100px;
        background-color: yellow;
        float: left;
        margin: 10px;
        text-align: center;
        line-height: 100px
    }

    .clear {
        clear: both
    }
    </style>
</head>

<body>
    <!-- cara pertama -->
    <?php for($i = 0 ; $i < count($numbers) ; $i++) { ?>
    <div class="kotak"><?= $numbers[$i] ?></div>
    <?php } ?>
    <div class="clear"></div>

    <!-- cara kedua -->
    <?php for($i = 0 ; $i < count($numbers) ; $i++) : ?>
    <div class="kotak"><?= $numbers[$i] ?></div>
    <?php endfor ?>

    <!-- Cara ketiga -->
    <?php foreach($numbers as $number) { ?>
    <div class="kotak"><?= $number ?></div>
    <?php } ?>

    <!-- Cara keempat -->
    <?php foreach($numbers as $number) : ?>
    <div class="kotak"><?= $number ?></div>
    <?php endforeach ?>
</body>

</html>