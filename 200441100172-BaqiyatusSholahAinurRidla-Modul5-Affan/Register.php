<?php
include "Database.php";

session_start();

$pesan = "";

if (isset($_SESSION['is_login']) == true) {
    header("location: Dashboard.php");
}

if (isset($_POST['daftar'])) {
    $namalengkap = $_POST['namalengkap'];
    $nim = $_POST['nim'];
    $angkatan = $_POST['angkatan'];
    $username = $_POST['username'];
    $katasandi = $_POST['katasandi'];

    $hash_katasandi = hash("sha256", $katasandi);

    try {
        $sql = "INSERT INTO pengguna (nama_lengkap, nim, angkatan, username, katasandi) VALUES
        ('$namalengkap', '$nim', '$angkatan', '$username', '$hash_katasandi')";

        if (!mysqli_query($db, $sql)) {
            echo "Error: " . mysqli_error($db);
        }

        $pesan = "Akun sudah dibuat, silahkan login";
        
    } catch (mysqli_sql_exception) {
        $pesan = "Username Sudah Digunakan, mohon diganti";
    }
    $db->close();
}

if (isset($_POST['masuk'])) {
    header("location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<div class="halaman">
        <div class="container">
            <div class="box-daftar">
                <h1>KELASPEDIA</h1>
                <i><?= $pesan ?></i>
                <form action="Register.php" method="POST">
                    <input type="text" placeholder="Nama Lengkap" name="namalengkap">
                    <input type="text" placeholder="NIM" name="nim">
                    <input type="text" placeholder="Angkatan(ex.2023)" name="angkatan">
                    <input type="text" placeholder="username" name="username">
                    <input type="password" placeholder="password" name="katasandi">
                    <button name="daftar">Sign Up</button>
                    <button name="masuk">Log In</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body{
        padding: 0;
        margin: 0;
    }

    .halaman{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
    }

    .container{
        display: flex;
        justify-content: space-evenly;
        width: 935px;
        height: 630px;
    }

    .box-daftar{
        width: 350px;
        height: 510px;
        border: solid 1px grey;
        border-radius: 10px;
    }

    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        height: 100%;

    }

    h1{
        text-align: center;
        font-family: "Open Sans";
    }

    input{
        width: 200px;
        height: 30px;
        margin: 10px 0px;
        font-family: "Poppins";
    }

    button{
        width: 200px;
        height: 40px;
        background-color: #0064e0;
        border-radius: 15px;
        margin: 10px 0px;
        border: solid white;
        color: white;
        cursor: pointer;
        font-family: "Poppins";
    }
</style>