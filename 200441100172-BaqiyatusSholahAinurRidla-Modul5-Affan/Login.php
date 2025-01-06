<?php
include "Database.php";

session_start();

$pesan = "";

if (isset($_SESSION['is_login']) == true) {
    header("location: Dashboard.php");
}

if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $katasandi = $_POST['katasandi'];

    $hash_katasandi = hash("sha256", $katasandi);

    $sql = "SELECT * FROM pengguna WHERE username='$username' AND katasandi='$hash_katasandi'";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION["username"] = $data["username"];
        $_SESSION["namalengkap"] = $data["nama_lengkap"];
        $_SESSION["nim"] = $data["nim"];
        $_SESSION["angkatan"] = $data["angkatan"];
        $_SESSION["is_login"] = true;

        header("location: Dashboard.php");
    }
    else{
        $pesan = "Akun Tidak Ditemukan";
    }
    $db->close();
}

if (isset($_POST['daftar'])) {
    header("location: Register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="halaman">
        <div class="container">
            <div class="box-login">
            <h1>KELASPEDIA</h1>
                <i><?= $pesan ?></i>
                <form action="Login.php" method="POST">
                    <input type="text" placeholder="username" name="username">
                    <input type="password" placeholder="password" name="katasandi">
                    <button name="masuk">Log In</button>
                    <button name="daftar">Sign Up</button>
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

    .box-login{
        width: 350px;
        height: 360px;
        border: solid 1px grey;
        border-radius: 10px;
    }

    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        height: 100%
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