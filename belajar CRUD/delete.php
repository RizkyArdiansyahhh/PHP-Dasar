<?php 
require 'functions.php';
$id = $_GET["id"];

if(delete($id) > 0){
    echo "
    <script>
    document.location.href = 'index.php';
    alert('Data Berhasil Dihapus');
    </script>
    ";
}else{
    echo "
    <script>
    document.location.href = 'index.php';
    alert('Data Tidak Berhasil Dihapus');
    </script>
    ";
}

?>