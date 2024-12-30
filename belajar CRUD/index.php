<?php 
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/output.css" rel="stylesheet">
</head>

<body>
    <div class="h-screen flex flex-row">
        <div class="w-1/4 bg-primary h-full">
            <div class="flex flex-col items-center gap-y-4 pt-5">
                <h2 class="text-2xl text-white font-bold">CRUD App</h2>
                <div class="h-[1px] bg-slate-300 w-11/12"></div>
            </div>
            <div class="flex flex-col items-center gap-y-4 py-10">
                <div class="text-lg text-white font-semibold bg-sky-900 inline-block px-14 py-2 rounded-md">
                    Dashboard
                </div>
                <div class="text-lg text-white font-medium">
                    Home
                </div>
                <div class="text-lg text-white font-medium">
                    Logout
                </div>
            </div>
        </div>
        <div class="w-3/4 bg-light h-full ">
            <div class="h-[20vh] bg-black w-full">

            </div>
            <div class=" h-[80vh] w-full py-10 px-2 flex flex-row">
                <div
                    class="daftar-mahasiswa border border-slate-700 rounded-lg h-full w-1/2 overflow-hidden p-2 flex flex-col gap-y-1 overflow-y-scroll">

                    <?php foreach($mahasiswa as $mhs) :?>
                    <div class="card bg-slate-300 flex flex-row rounded-lg ">
                        <div class="p-2"><img src="img/<?= $mhs["gambar"] ?>" alt=""
                                class="w-[100px] h-[100px] object-cover rounded-full"></div>
                        <div class="flex flex-col justify-center">
                            <p class="text-lg font-semibold "><?= $mhs["nama"] ?></p>
                            <p class="text-xs font-normal text-slate-500"><?= $mhs["jurusan"] ?></p>
                            <div class="pt-4">
                                <a href=""
                                    class="bg-green-500 px-4 py-2 rounded-md text-white font-bold border border-transparent hover:text-primary hover:border-green-500 hover:bg-white transition duration-200">More</a>
                                <a href=""
                                    class="bg-yellow-400 px-4 py-2 rounded-md text-white font-bold border border-transparent hover:text-primary hover:border-yellow-400 hover:bg-white transition duration-200">Edit</a>
                                <a href=""
                                    class="bg-red-500 px-4 py-2 rounded-md text-white font-bold border border-transparent hover:text-primary hover:border-red-500 hover:bg-white transition duration-200">Edit</a>

                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="w-1/2">
                    <h1>Tambah Data Mahasiswa</h1>
                </div>
            </div>
        </div>
    </div>
</body>

</html>