<?php 
require 'functions.php';
if(isset($_POST["login"])){
    $login = login($_POST);
    if($login){
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    p {
        color: red;
        font-weight: 700;
    }

    .container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        border: 1px solid black;
        border-radius: 10px;
        padding: 30px;
        width: 250px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    form .button {
        display: flex;
        justify-content: center;
    }

    form .button button {
        padding: 10px
    }


    form div label {
        display: block;
    }

    form div input {
        width: 100%;
        padding-left: 10px;
        border_radius: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <?php if(isset($login)) : ?>
        <p>Username atau password tidak sesuai</p>
        <?php endif ?>
        <form action="" method="post">
            <div>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username" required placeholder="username">
            </div>
            <div>
                <label for="password">password : </label>
                <input type="password" name="password" id="password" required placeholder="password">
            </div>

            <div class="button">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </div>
</body>

</html>