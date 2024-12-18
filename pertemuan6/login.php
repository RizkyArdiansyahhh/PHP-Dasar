<?php
// jika tombol login di klik baru bisa login
if(isset($_POST["btnLogin"])){
    if($_POST["username"] == "admin" && $_POST["password"] == "123"){
        header("Location: dashboard.php");
        exit;
    }else{
        $error = true;
    }
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
    <h1>Halaman Login</h1>
    <?php if(isset($error)): ?>
    <p style="color:red;text-style:italic">Username atau password salah</p>
    <?php endif ?>
    <form action="" method="post">
        <div>
            <label for="username">Username :</label>
            <input type="text" id="username" name="username">

        </div>
        <div>
            <label for="password">password :</label>
            <input type="text" id="password" name="password">
        </div>
        <button type="submit" name="btnLogin">Login</button>
    </form>
</body>

</html>