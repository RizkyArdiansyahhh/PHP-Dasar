<?php 
require 'functions.php';

$id = $_GET["id"];
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if(isset($_POST["edit"])){
    if(update($_POST, $id) > 0){
        echo "
        <script>
        document.location.href = 'index.php';
        alert('Data Berhasil Diubah');
        </script>
        ";
    }else{
        echo "
        <script>
        document.location.href = 'index.php';
        alert('Data Tidak Berhasil Diubah');
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
    <link href="./src/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="h-screen">
    <div class="flex justify-center items-center flex-col h-full  ">
        <div class="w-1/3 bg-primary p-5 rounded-lg">
            <h1 class="text-center text-xl font-semibold text-white">Edit Mahasiswa</h1>
            <form action="" method="post">
                <div class="flex flex-col">
                    <label class="text-white " for="nim">NIM</label>
                    <input class="border rounded-lg py-2 px-2  border-slate-800" type="text" id="nim" name="nim"
                        placeholder="nim" value="<?= $mahasiswa["nim"] ?>">
                </div>
                <div class="flex flex-col">
                    <label class="text-white " for="nama">Nama</label>
                    <input class="border rounded-lg py-2 px-2  border-slate-800" type="text" id="nama" name="nama"
                        placeholder="nama" value="<?= $mahasiswa["nama"] ?>">
                </div>
                <div class="flex flex-col">
                    <label class="text-white " for="email">Email</label>
                    <input class="border rounded-lg py-2 px-2  border-slate-800" type="text" id="email" name="email"
                        placeholder="email" value="<?= $mahasiswa["email"] ?>">
                </div>
                <div class="flex flex-col">
                    <label class="text-white " for="jurusan">Jurusan</label>
                    <input class="border rounded-lg py-2 px-2  border-slate-800" type="text" id="jurusan" name="jurusan"
                        placeholder="jurusan" value="<?= $mahasiswa["jurusan"] ?>">
                </div>
                <div class="flex flex-col">
                    <label class="text-white " for="gambar">Gambar</label>
                    <input class="border rounded-lg py-2 px-2  border-slate-800" type="text" id="gambar" name="gambar"
                        placeholder="gambar" value="<?= $mahasiswa["gambar"] ?>">
                </div>
                <div class="flex justify-center">
                    <button
                        class="bg-yellow-400 px-5 py-2 border border-transparent hover:text-primary hover:border-yellow-400 hover:bg-white transition duration-200 font-bold text-white rounded-lg mt-7"
                        type="submit" name="edit">Edit</button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>