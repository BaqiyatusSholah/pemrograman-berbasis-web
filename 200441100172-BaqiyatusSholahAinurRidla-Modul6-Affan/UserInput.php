<?php
include "Database.php";

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $fakultas=$_POST['fakultas'];
    $prodi = $_POST['prodi'];
    $asal = $_POST['asal'];

    $sql = "INSERT INTO datamahasiswa (nama, umur, nim, fakultas, prodi, asal) VALUES ('$nama', '$umur', '$nim', '$fakultas', '$prodi', '$asal')";

    mysqli_query($db, $sql);
    
    echo "<script>
    alert('Data Berhasil Ditambah')
    window.location.href = 'HasilInput.php'
    </script>
    ";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
</head>
<body>
    <h1 align="center">Formulir Data Mahasiswa</h1>
    <form action="" method="post">
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama"><br>
        <label for="nim">NIM</label><br>
        <input type="text" name="nim" id="nim"><br>
        <label for="umur">Umur</label><br>
        <input type="number" name="umur" id="umur"><br>
        <label for="asal">Asal Kota</label><br>
        <input type="text" name="asal" id="asal"><br>
        <label for="fakultas">Fakultas</label><br>
        <input type="text" name="fakultas" id="fakultas"><br>
        <label for="prodi">Prodi</label><br>
        <input type="text" name="prodi" id="prodi"><br>
        <button name="simpan">Tambah Data</button>
    </form>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    h1{
        font-family: "Open Sans";
    }

    form{
        padding: 2rem 2rem;
    }

    button{
        margin-left: 2rem;
        width: 150px;
        height: 30px;
        padding: 5px 5px;
        border-radius: 15px;
        border: none;
        background-color: green;
        color: white;
        font-family: "Poppins";
    }

    input{
        width: 40%;
        height: 20px;
        padding: 5px;
        border: none;
        border-bottom: 1px solid black;
        margin-bottom: 10px;
        font-family: "Poppins";
    }

    label, p{
        font-size: 20px;
        font-family: "Poppins";
    }

    select{
        width: 20%;
        height: 25px;
        margin-bottom: 10px;
        border-radius: 10px;
        font-family: "Poppins";
    }
</style>