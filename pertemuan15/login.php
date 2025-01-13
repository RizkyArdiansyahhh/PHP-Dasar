<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION["username"]) && isset($_COOKIE["remember_token"])){
    $token = $_COOKIE["remember_token"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE token IS NOT NULL");

    while($user = mysqli_fetch_assoc($result)){
        if(password_verify($_COOKIE["remember_token"], $user["token"])){
            $_SESSION["username"] = $user["username"];
            break;
        }
    }
}

if(isset($_SESSION["username"])){
    header("Location: index.php");
    exit;
}

if(isset($_POST["login"])){
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // AMBIL DATA DARI DATABASE SESUAI USERNAME YANG DI INPUT
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        
        // CEK password
        if(password_verify($password, $row["password"])){
            // Set Session
            $_SESSION["username"] = $username;

            // Cek remember me
            if(isset($_POST["remember"])){
                // bikin token
                $token = bin2hex(random_bytes(32));

                // buat cookie
                setcookie("remember_token", $token, time() + 60);

                // Simpan kedatabase
                $hashToken = password_hash($token, PASSWORD_DEFAULT);
                mysqli_query($conn, "UPDATE users SET token = '$hashToken' WHERE username = '$username'");
            }
            header("Location: index.php");
            exit;
        }
        $login = true;
    }
    $login = true;
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


    form div .label {
        display: block;
    }

    form div .input {
        width: 100%;
        padding-left: 10px;
        border_radius: 10px;
    }

    /* form .input-checkbox {
        display: flex;
    } */
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
                <label class="label" for="username">Username : </label>
                <input class="input" type="text" name="username" id="username" required placeholder="username">
            </div>
            <div>
                <label class="label" for="password">password : </label>
                <input class="input" type="password" name="password" id="password" required placeholder="password">
            </div>
            <div class="input-checkbox">
                <input type="checkbox" name="remember" id="remember" placeholder="remember">
                <label for="remember">Remember Me </label>
            </div>

            <div class="button">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </div>
</body>

</html>