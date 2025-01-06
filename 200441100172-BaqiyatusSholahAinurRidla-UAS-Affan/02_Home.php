<?php
    include "01_Database.php";

    $sql = "SELECT * FROM tb_artikel";
    $result = mysqli_query($db, $sql);

    if (isset($_POST['buat']) && isset($_FILES['foto'])) {
        $judul = $_POST['judul'];
        $judul_pratinjau = $_POST['judul-pratinjau'];
        $subjudul = $_POST['subjudul'];
        $subjudul2 = $_POST['subjudul2'];
        $laman = $_POST['link'];
        $frasa = $_POST['frasa'];
        $deskripsi_utama = $_POST['deskripsi-utama'];
        $sub_deskripsi_satu = $_POST['sub-deskripsi-satu'];
        $sub_deskripsi_dua = $_POST['sub-deskripsi-dua'];
        $img_name = $_FILES['foto']['name'];
        $img_size = $_FILES['foto']['size'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $error = $_FILES['foto']['error'];
        $img_ex = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $allow = array("jpg", "jpeg", "png");

        if(in_array($img_ex, $allow)) {
            $img_name_new = uniqid("IMG-").".".$img_ex;
            $img_location = 'images/'.$img_name_new;
            move_uploaded_file($tmp_name, $img_location);
        }

        $sql = "INSERT INTO `tb_artikel`(`judul_utama`, `judul_pratinjau`, `sub_judul_artikel_satu`, `sub_judul_artikel_dua`, `link_pendukung`, `frasa_kunci`, `deskripsi_utama`, `sub_deskripsi_satu`, `sub_deskripsi_dua`, `gambar`) 
        VALUES ('$judul','$judul_pratinjau','$subjudul','$subjudul2','$laman','$frasa','$deskripsi_utama','$sub_deskripsi_satu','$sub_deskripsi_dua', '$img_name_new')";

        if (!mysqli_query($db, $sql)) {
            echo "Error: " . mysqli_error($db);
        }
        header("location: 02_Home.php");
    }

    if(isset($_REQUEST['content'])){
        $id = $_REQUEST['content'];
        $sql = mysqli_query($db, "SELECT * FROM tb_artikel WHERE id = $id");
        $result = mysqli_fetch_assoc($sql);
    }

    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['delete'];
        mysqli_query($db, "DELETE FROM tb_artikel WHERE id = $id");
        header("location: 02_Home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="02_Style.css">
    <script src="https://kit.fontawesome.com/9cf0dfd347.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Home</title>
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
    <section id="awal">
        <div class="container-awal">
            <div class="box-pengantar">
                <h1 style="color: white; font-size: 36px;">EKSPLORASI KEKAYAAN BUDAYA MELAULI FESTIVAL INDONESIA</h1>
                <p style="color: white; font-size: 26px;">Selamat Datang di Eksplorasi Kekayaan Budaya Melalui Festival Indonesia, Tempat
                    dimana Keindahan Tradisi dan Seni Berkumpul dalam Harmini yang Tak Terlupakan
                </p>
                <div class="tombol" style="display: flex; gap: 2rem; width: 100%; margin-top: 3rem;">
                    <span>
                        <button style="width: 300px; padding: 15px 0; background-color: rgb(67, 67, 194);border: none; border-radius: 10px;"><a href="" style="font-size: 28px; color: white; text-decoration: none;"><i style="margin: 0 10px;" class="fa-brands fa-apple"></i>Download</a></button>
                    </span>
                    <span>
                        <button style="width: 300px; padding: 15px 0; background-color: transparent; border: 2px solid rgb(67, 67, 194); border-radius: 10px;"><a href="" style="font-size: 28px; color: white; text-decoration: none;"><i style="margin: 0 10px;" class="fa-brands fa-google-play"></i>Download</a></button>
                    </span>
                </div>
            </div>
            <div class="box-foto">
                <img src="foto-home.png" alt="" style="width: 500px; height: 400px;">
            </div>
        </div>
    </section>
    <section id="jarak"></section>
    <section id="kedua">
        <p align="center" style="color: black; font-size: 26px;">Kisah Petualangan</p>
        <h1 align="center" style="color: black; font-size: 36px;">Kilas Balik Festival Budaya</h1>
        <p align="center" style="color: black; font-size: 26px;">Temukan, Jelajahi, dan Nikmati Festival di Indonesia</p>
        <div class="grup-foto">
            <img src="cr1.png" alt="" style="width: 184px; height: 520px;">
            <img src="cr2.png" alt="" style="width: 920px; height: 520px;">
            <img src="cr3.png" alt="" style="width: 184px; height: 520px;">
        </div>
    </section>
    <section id="jarak"></section>
    <section id="ketiga">
        <div class="box-judul">
            <div class="judul-ketiga">
                <h1 style="font-size: 20px;">Buat Artikel</h1>
            </div>
        </div>
        <form method="POST" action="02_Home.php" enctype="multipart/form-data">
            <div class="box-kiri">
                <div class="box-content">
                    <div class="content">
                        <label for="foto">Masukkan Foto</label>
                        <input style="background-color: rgb(135, 135, 216);" type="file" name="foto" id="foto">
                    </div>
                </div>
            </div>
            <div class="box-kanan">
                <label for="judul">Judul Artikel</label><br>
                <input name="judul" type="text" id="judul"><br>
                <label for="judul-pratinjau">Judul Pratinjau</label><br>
                <input name="judul-pratinjau" type="text" id="judul-pratinjau"><br>
                <label for="subjudul">Sub Judul</label><br>
                <input name="subjudul" type="text" id="subjudul"><br>
                <label for="subjudul2">Sub Judul 2</label><br>
                <input name="subjudul2" type="text" id="subjudul2"><br>
                <label for="link">Link Pendukung</label><br>
                <input name="link" type="url" id="link"><br>
                <label for="frasa">Frasa Kunci</label><br>
                <input name="frasa" type="text" id="frasa"><br>
                <label for="deskripsi-utama">Isi Konten</label><br>
                <input type="text" name="deskripsi-utama" id="deskripsi-utama"><br>
                <label for="sub-deskripsi-satu">Sub Deskripsi satu</label><br>
                <input type="text" name="sub-deskripsi-satu" id="sub-deskripsi-satu"><br>
                <label for="sub-deskripsi-dua">Sub Deskripsi Dua</label><br>
                <input type="text" name="sub-deskripsi-dua" id="sub-deskripsi-dua"><br>
                <button name="buat" style="font-size: 20px; color: white; background-color: rgb(67, 67, 194); padding: 10px 15px; border-radius: 15px; border: none;" type="submit">Buat</button>
            </div>
        </form>
    </section>
    <section id="jarak"></section>
    <section id="keempat">
        <h1 align="center" style="color: black; font-size: 36px;">Kemeriahan Acara</h1>
        <p align="center" style="color: black; font-size: 26px;">Dalam Kemeriahan Acara, Seni, dan Kebudayaan Bersatu
            dalam Kegembiaraan Sejati
        </p>
        <div class="container-porto">
                <?php
                while ($isi = mysqli_fetch_array($result)) {
                echo '<div class="box-1">';
                echo '<div class="content-foto">';
                echo '<img src="images/'.$isi["gambar"].'" alt="" style="height: 100%; width: 100%; border-radius: 15px 0px 0px 15px;">';
                echo '</div>';
                echo '<div class="content-tulisan">';
                echo '<div class="judul">';
                echo '<h1 style="color: black; font-size: 36px;">'.$isi["judul_pratinjau"].'</h1>';
                echo '</div>';
                echo '<div class="isi">';
                echo '<p style="color: grey; font-size: 20px; font-weight: bold;">'.$isi["sub_judul_artikel_satu"].'</p>';
                echo '<p>'.$isi["sub_deskripsi_satu"].'</p>';
                echo '</div>';
                echo '<form class="pilih" acion="POST" style="margin-top: 2rem;">';
                echo '<div class="atur-tombol" style="width: 90%; gap: 1rem;" >';
                echo '<a href=02_Home.php?delete='.$isi["id"].' name="delete" style="font-size: 20px; background-color: red; color: white; padding: 10px 15px; border-radius: 15px; border: none;">Delete</a>';
                echo '<a href=01_Edit.php?edit='.$isi["id"].' name="edit" style="font-size: 20px; background-color: rgb(215, 215, 64); color: white; padding: 10px 15px; border-radius: 15px; border: none;">Edit</a>';
                echo '<a href=01_Hasil.php?content='.$isi["id"].' name="more" style="font-size: 20px; background-color: blue; color: white; padding: 10px 15px; border-radius: 15px; border: none;">Read More</a>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                };
                ?>
        </div>
    </section>
    <section id="jarak"></section>
    <section id="kelima">
        <h1 align="center" style="color: black; font-size: 36px;">Galery</h1>
        <p align="center" style="color: black; font-size: 26px;">Dalam Kemeriahan Acara, Seni, dan Kebudayaan Bersatu
            dalam Kegembiaraan Sejati
        </p>
        <div class="container-galery">
            <img src="gal-1.png" alt="" style="width: 370px; height: 265px;">
            <img src="gal-2.png" alt="" style="width: 370px; height: 265px;">
            <img src="gal-3.png" alt="" style="width: 370px; height: 265px;">
            <img src="gal-4.png" alt="" style="width: 370px; height: 265px;">
            <img src="gal-5.png" alt="" style="width: 370px; height: 265px;">
            <img src="gal-6.png" alt="" style="width: 370px; height: 265px;">
            <img src="gal-7.png" alt="" style="width: 370px; height: 265px;">
            <img src="gal-8.png" alt="" style="width: 370px; height: 265px;">
            <img src="gal-9.png" alt="" style="width: 370px; height: 265px;">
            <img src="gal-10.png" alt="" style="width: 370px; height: 265px;">
            <img src="gal-11.png" alt="" style="width: 370px; height: 265px;">
            <img src="gal-12.png" alt="" style="width: 370px; height: 265px;">
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