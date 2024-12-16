<?php 

// 100 hari dari sekarang
echo date("l", time() + (60 * 60 * 24 * 100));
echo "<br>";

// mktime
// kasus : hari pada tanggal 06 juni 2004
echo date("l",mktime(0,0,0,6,6,2004));
echo "<br>";

// strtotime
// kasus : hari pada tanggal 06 juni 2004
$ultah = strtotime("06-06-2025");
$sekarang = time();
$selisihUltah = $ultah - $sekarang;
$result = floor($selisihUltah / (60 * 60 * 24));
echo "sisa ultah saya adalah $result hari lagi"
?>