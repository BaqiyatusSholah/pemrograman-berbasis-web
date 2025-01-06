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
    }

    if(isset($_REQUEST['content'])){
        $id = $_REQUEST['content'];
        $sql = mysqli_query($db, "SELECT * FROM tb_artikel WHERE id = $id");
        $result = mysqli_fetch_assoc($sql);
    }

    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['delete'];
        mysqli_query($db, "DELETE FROM tb_artikel WHERE id = $id");
        header("location: 01_Home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9cf0dfd347.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="01_style.css">
    <title>UserInput</title>
</head>
<body>
    <form method="POST" action="01_Home.php" enctype="multipart/form-data">
        <div class="wrapper-form">
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
        </div>
    </form>
    <div class="container-porto">
        <div class="card">
        <?php
            while ($isi = mysqli_fetch_array($result)) {
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
                echo '<a href=01_Home.php?delete='.$isi["id"].' name="delete" style="font-size: 20px; background-color: red; color: white; padding: 10px 15px; border-radius: 15px; border: none;">Delete</a>';
                echo '<a href=01_Edit.php?edit='.$isi["id"].' name="edit" style="font-size: 20px; background-color: rgb(215, 215, 64); color: white; padding: 10px 15px; border-radius: 15px; border: none;">Edit</a>';
                echo '<a href=01_Hasil.php?content='.$isi["id"].' name="more" style="font-size: 20px; background-color: blue; color: white; padding: 10px 15px; border-radius: 15px; border: none;">Read More</a>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
            };
        ?>
        </div>        
    </div>
</body>
</html>