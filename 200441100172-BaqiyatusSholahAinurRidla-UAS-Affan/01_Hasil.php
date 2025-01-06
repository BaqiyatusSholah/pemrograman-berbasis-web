<?php
    include "01_Database.php";
    
    $id = $_REQUEST['content'];
    $sql = "SELECT * FROM tb_artikel WHERE id = $id";
    $result = mysqli_query($db, $sql);
    $total = mysqli_fetch_assoc($result);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="02_Style.css">
    <script src="https://kit.fontawesome.com/9cf0dfd347.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Hasil</title>
</head>
<body>
<nav class="navbar">
        <div class="navdiv">
            <div class="logo"><img src="logo.png" alt=""></div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="01_Event.html">Event</a></li>
            </ul>
            <div class="bahasa-foto">
                <span class="material-symbols-outlined" style="font-size: 20px; display: flex; align-items: center; ">language</span>
                <span class="bahasa" style="font-size: 20px; display: flex; align-items: center; ">ID</span>
                <span class="profil" style="margin-left: 1rem;"><img src="pp.png" alt=""></span>
            </div>
        </div>
    </nav>
    <section id="event">
            <h1 align="center" style="width: 80%; color: black; font-size: 36px;"><?= $total['judul_utama'] ?></h1>
            <p align="center" style="width: 80%; color: black; font-size: 18px;"><?= $total['deskripsi_utama'] ?></p>
            <img src="images/<?= $total['gambar'] ?>" style="width: 100%; height: 760px;" alt="">
            <div class="keterangan-event">
                <div class="ket-kanan" style="width: 40%;">
                    <p style="color: black; font-size: 24px;"><?= $total['sub_judul_artikel_satu'] ?></p>
                    <p style="color: black; font-size: 18px;"><?= $total['sub_deskripsi_satu'] ?></p>
                </div>
                <div class="ket-kiri" style="width: 40%;">
                    <p style="color: black; font-size: 24px;"><?= $total['sub_judul_artikel_dua'] ?></p>
                    <p style="color: black; font-size: 18px;"><?= $total['sub_deskripsi_dua'] ?></p>
                </div>
            </div>
    </section>
    <section id="jarak"></section>
    <section id="keenam">
        <div class="container-footer">
            <div class="container-about">
                <div class="box-sosmed">
                    <img  src="logo.png" style="width: 100px; height: 100px;" alt="">
                    <p style="color: black; font-size: 16px;">Our Vision is to Show the Vibrant Diversity of Indonesian Culture
                    </p>
                    <div class="logo-sosmed">
                        <span style="padding: 10px; background-color: white; border-radius: 50%;"><i style="font-size: 20px;" class="fa-brands fa-facebook-f"></i></span>
                        <span style="padding: 10px; background-color: white; border-radius: 50%;"><i style="font-size: 20px;" class="fa-brands fa-twitter"></i></span>
                        <span style="padding: 10px; background-color: white; border-radius: 50%;"><i style="font-size: 20px;" class="fa-brands fa-instagram"></i></span>
                    </div>
                </div>
                <div class="box-link">
                    <div class="link">
                        <p style="font-size: 20px;">Community</p>
                        <a style="text-decoration: none; font-size: 16px;" href="">Events</a><br>
                        <a style="text-decoration: none; font-size: 16px;" href="">Blog</a><br>
                        <a style="text-decoration: none; font-size: 16px;" href="">Podcast</a><br>
                        <a style="text-decoration: none; font-size: 16px;" href="">Invite a Friend</a>
                    </div>
                    <div class="link">
                        <p style="font-size: 20px;">Socials</p>
                        <a style="text-decoration: none; font-size: 16px;" href="">Discord</a><br>
                        <a style="text-decoration: none; font-size: 16px;" href="">Instagram</a><br>
                        <a style="text-decoration: none; font-size: 16px;" href="">Twitter</a><br>
                        <a style="text-decoration: none; font-size: 16px;" href="">Facebook</a>
                    </div>
                </div>
            </div>
            <div class="garis"></div>
            <div class="container-bawah">
                <div class="copyright" style="width: 65%;">
                    <p>&copy; Company Name. All Rights Reserved</p>
                </div>
                <div class="SK" style="display: flex; justify-content: flex-start; gap: 2rem; width: 50%;">
                    <p>Privacy & Policy</p>
                    <p>Terms & Condition</p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>