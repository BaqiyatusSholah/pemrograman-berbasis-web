<?php
    include "01_Database.php";
    

    if (isset($_POST['ubah'])) {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $judul_pratinjau = $_POST['judul-pratinjau'];
        $subjudul = $_POST['subjudul'];
        $subjudul2 = $_POST['subjudul2'];
        $laman = $_POST['link'];
        $frasa = $_POST['frasa'];
        $deskripsi_utama = $_POST['deskripsi-utama'];
        $sub_deskripsi_satu = $_POST['sub-deskripsi-satu'];
        $sub_deskripsi_dua = $_POST['sub-deskripsi-dua'];
        $img_name_new = $_POST['img_old_name'];
        if (isset($_FILES['foto'])) {
            $img_name = $_FILES['foto']['name'];
            $img_size = $_FILES['foto']['size'];
            $tmp_name = $_FILES['foto']['tmp_name'];
            $error = $_FILES['foto']['error'];
            $img_ex = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
            $allow = array("jpg", "jpeg", "png");

            if(in_array($img_ex, $allow)) {
                $img_name_new = uniqid("IMG-").".".$img_ex;
                $img_location = "images/".$img_name_new;
                move_uploaded_file($tmp_name, $img_location);
            }
        }else {
            
        }

        $chg = "UPDATE tb_artikel SET
            judul_utama = '$judul',
            judul_pratinjau = '$judul_pratinjau',
            sub_judul_artikel_satu = '$subjudul',
            sub_judul_artikel_dua = '$subjudul2',
            link_pendukung = '$laman',
            frasa_kunci = '$frasa',
            deskripsi_utama = '$deskripsi_utama',
            sub_deskripsi_satu = '$sub_deskripsi_satu',
            sub_deskripsi_dua = '$sub_deskripsi_dua',
            gambar = '$img_name_new' WHERE id = $id"
            ;
            
        mysqli_query($db, $chg);
        if (!mysqli_query($db, $chg)) {
            echo "Error: " . mysqli_error($db);
        }

        header("location: 02_Home.php");
    } else {
        $id = $_REQUEST['edit'];
        $sql = mysqli_query($db, "SELECT * FROM tb_artikel WHERE id = $id");
        $result = mysqli_fetch_assoc($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9cf0dfd347.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="02_style.css">
    <title>UserInput</title>
</head>
<body>
    <form method="POST" action="01_Edit.php" enctype="multipart/form-data">
        <div class="box-kiri">
            <div class="box-content">
                <div class="content">
                    <label for="foto">Masukkan Foto</label>
                    <input style="background-color: rgb(135, 135, 216);" type="file" name="foto" id="foto">
                    <input type="hidden" value="<?= $result['gambar'] ?>" name="img_old_name">
                </div>
            </div>
        </div>
        <div class="box-kanan">
            <label for="judul">Judul Artikel</label><br>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input name="judul" type="text" id="judul" value="<?= $result['judul_utama'] ?>"><br>
            <label for="judul-pratinjau">Judul Pratinjau</label><br>
            <input name="judul-pratinjau" type="text" id="judul-pratinjau" value="<?= $result['judul_pratinjau'] ?>"><br>
            <label for="subjudul">Sub Judul</label><br>
            <input name="subjudul" type="text" id="subjudul" value="<?= $result['sub_judul_artikel_satu'] ?>"><br>
            <label for="subjudul2">Sub Judul 2</label><br>
            <input name="subjudul2" type="text" id="subjudul2" value="<?= $result['sub_judul_artikel_dua'] ?>"><br>
            <label for="link">Link Pendukung</label><br>
            <input name="link" type="url" id="link" value="<?= $result['link_pendukung'] ?>"><br>
            <label for="frasa">Frasa Kunci</label><br>
            <input name="frasa" type="text" id="frasa" value="<?= $result['frasa_kunci'] ?>"><br>
            <label for="deskripsi-utama">Isi Konten</label><br>
            <input type="text" name="deskripsi-utama" id="deskripsi-utama" value="<?= $result['deskripsi_utama'] ?>"><br>
            <label for="sub-deskripsi-satu">Sub Deskripsi satu</label><br>
            <input type="text" name="sub-deskripsi-satu" id="sub-deskripsi-satu" value="<?= $result['sub_deskripsi_satu'] ?>"><br>
            <label for="sub-deskripsi-dua">Sub Deskripsi Dua</label><br>
            <input type="text" name="sub-deskripsi-dua" id="sub-deskripsi-dua" value="<?= $result['sub_deskripsi_dua'] ?>"><br>
            <button name="ubah" style="font-size: 20px; color: white; background-color: rgb(67, 67, 194); padding: 10px 15px; border-radius: 15px; border: none;" type="submit">Simpan</button>
        </div>
    </form>