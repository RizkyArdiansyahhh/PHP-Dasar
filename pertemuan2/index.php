<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
    <style>
    .warna {
        background-color: skyblue;
    }

    .col-warna {
        background-color: yellow;
    }
    </style>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php for($i = 1 ; $i <= 3 ; $i++) :?>
        <?php if($i % 2 != 0) : ?>
        <tr class="warna">
            <?php else : ?>
        <tr>
            <?php endif ?>
            <?php for($j = 1 ; $j <= 5 ; $j++) : ?>
            <?php if($j % 2 == 0) : ?>
            <td class="col-warna">
                <?php else : ?>
            <td>
                <?php endif ?>
                <?= "$i,$j" ?>
            </td>
            <?php endfor?>
        </tr>
        <?php endfor ?>
    </table>
</body>

</html>