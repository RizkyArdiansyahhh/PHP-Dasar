<?php 
require 'functions.php';
if(isset($_POST["registrasi"])){
    if(registrasi($_POST) > 0){
        echo "
        <script>
        alert('user berhasil di tambahkan');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        border: 1px solid black;
        border-radius: 10px;
        padding: 30px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    form div label {
        display: block;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Registasi</h1>
        <form action="" method="post">
            <div>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username" required placeholder="username">
            </div>
            <div>
                <label for="password">password : </label>
                <input type="password" name="password" id="password" required placeholder="password">
            </div>
            <div>
                <label for="password2">Confirm Password : </label>
                <input type="password" name="password2" id="password2" required placeholder="password2">
            </div>
            <button type="submit" name="registrasi">Registasi</button>
        </form>
    </div>
</body>

</html>