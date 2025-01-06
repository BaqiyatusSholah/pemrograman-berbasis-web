<?php
session_start();

if (isset($_SESSION['is_login']) == false) {
    header("location: Beranda.html");
}

if (isset($_POST['keluar'])) {
    session_unset();
    session_destroy();
    header("location: Beranda.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="halaman">
        <div class="container">
            <div class="box-profil">
                <table align="center">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?= $_SESSION["namalengkap"] ?></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><?= $_SESSION["nim"] ?></td>
                    </tr>
                    <tr>
                        <td>Angkatan</td>
                        <td>:</td>
                        <td><?= $_SESSION["angkatan"] ?></td>
                    </tr>
                </table>
                <form action="Dashboard.php" method="POST">
                    <button name="keluar">Log Out</button>
                </form>
            </div>
            <div class="box-pengantar">
                <div class="content-pengantar">
                    <h1>Selamat Datang, <?= $_SESSION["username"] ?></h1>
                    <p>ini adalah website kelas pemrograman web 2B</p>
                    <p>untuk melihat daftar mahasiswa</p>
                    <a href="DaftarTeman.php">klik disini</a>
                </div>
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
        width: 90%;
        height: 90vh;
    }

    .box-profil{
        width: 25%;
        height: 100%;
    }

    .box-pengantar{
        width: 75%;
        height: 100%;
    }

    .content-pengantar{
        margin-left: 2rem;
    }

    h1{
        font-size: 75px;
        font-family: "Open Sans";
    }

    p{
        font-size: 20px;
        font-family: "Poppins";
    }

    td{
        padding: 5px;
        font-family: "Poppins";
    }

    a{
        font-size: 20px;
        text-decoration: none;
        font-family: "Poppins";
    }

    button{
        width: 80px;
        height: 40px;
        background-color: #0064e0;
        border-radius: 15px;
        margin: 10px 0px 0px 2.5rem;
        border: solid white;
        color: white;
        cursor: pointer;
        font-family: "Poppins";
    }
</style>