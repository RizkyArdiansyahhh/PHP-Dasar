<?php
$conn = mysqli_connect("localhost","root","","phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $conn;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
  
    // code untuk upload gambar
    $gambar = upload();
    if(!$gambar) {
        return false;
    }

    $query = "INSERT INTO 
                mahasiswa 
                (nim,nama,email,jurusan,gambar)
                VALUES
                ('$nim','$nama','$email','$jurusan','$gambar')";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload(){
    $direktori = "img/";
    if(!is_dir($direktori)){
        mkdir($direktori, 0777, true);
    }

    $files = $_FILES["gambar"];
    $namaGambar = $files["name"];
    $tmpName = $files["tmp_name"];
    $error = $files["error"];
    $fileSize = $files["size"];

    // cek apakah ada file yang di upload
    if($error === 4){
        echo "
        <script>
        alert('Pilih gambar terlebih dahulu');
        </script>
        ";
        return false;
    }

    // cek apakah yang di upload adalah gambar
    $ektensiAllow = ["jpg", "jpeg", "png"];
    $maksSize = 2 * 1024 * 1024;
    $ektensiGambar = explode(".", $namaGambar);
    $ektensiGambar = strtolower($ektensiGambar[count($ektensiGambar) - 1]);

    // cek apakah ektensi file yang di upload sesuai dengan yang di izinkan dan maksimal size sesuai dengan yang di izinkan
    if(in_array($ektensiGambar, $ektensiAllow) &&  $fileSize <= $maksSize){
        // membuat direktori baru
        $uniqeName = uniqid() . "_" . $namaGambar;
        $destination = $direktori . $uniqeName;
        if(move_uploaded_file($tmpName, $destination)){
            return $uniqeName;
        }else{
            echo "
            <script>
            alert('gambar gagal di upload')
            </script>
            ";
            return false;
        }
    }else{
        echo "
        <script>
        alert('file yang di upload tidak sesuai')
        </script>
        ";
    }
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data, $id, $gambarCurrent){
    global $conn;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $gambar = ($_Files["gambar"]["error"] === 4) ? $gambarCurrent : upload();

    $query = "UPDATE mahasiswa SET 
                nim = '$nim',
                nama = '$nama',
                email = '$email',
                jurusan ='$jurusan',
                gambar = '$gambar'
            WHERE id = $id
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa
                WHERE 
                nim LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ";
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){
    global $conn;
    $username = strtolower(htmlspecialchars($data["username"]));
    $password = htmlspecialchars($data["password"]);
    $confirmPassword = htmlspecialchars($data["password2"]);

    // Mengambil data username di database
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    // Validasi data
    if(empty($username) || empty($password) || empty($confirmPassword)){
        echo "
        <script>
        alert('Semua Kolom Wajib Diisi');
        </script>
        ";
        return false;
    }else if(mysqli_fetch_assoc($result)){
        echo "
        <script>
        alert('Username Sudah Terdaftar');
        </script>
        ";
        return false;
    }else if(strlen($password) < 8){
        echo "
        <script>
        alert('Minimal Karakter Password adalah 8');
        </script>
        ";
        return false;
    }
    else if($password !== $confirmPassword){
        echo "
        <script>
        alert('Konfirmasi Password Tidak Cocok');
        </script>
        ";
        return false;
    }else{
        // Setelah data tervalidasi
        // Mengenkripsi Password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO users (username,password) VALUES ('$username', '$passwordHash')");
        return mysqli_affected_rows($conn);
    }
}
?>