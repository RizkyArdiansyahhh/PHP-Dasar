<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if(!empty($_POST["nama"])) : ?>
    <h1>Selamat Datang <?php echo $_POST["nama"] ?></h1>
    <?php else :  ?>
    <h1>Selamat Datang User</h1>
    <?php endif ?>

</body>

</html>