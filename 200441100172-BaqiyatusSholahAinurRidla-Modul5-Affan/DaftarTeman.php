<?php
include "Database.php";

session_start();

$pesan = "";
$editform = "";

if (isset($_SESSION['is_login']) == false) {
    header("location: Beranda.html");
}

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $angkatan = $_POST['angkatan'];
    $prodi = $_POST['prodi'];

    $sql = "INSERT INTO daftarteman (nama, nim, angkatan, prodi) VALUES ('$nama', '$nim', '$angkatan', '$prodi')";

    if (!mysqli_query($db, $sql)) {
        echo "Error: " . mysqli_error($db);
    }
    
    $pesan = "Data Berhasil Ditambah";
}


if(isset($_REQUEST['edit'])){
    $id = $_REQUEST['edit'];
    $sql = mysqli_query($db, "SELECT * FROM daftarteman WHERE id = $id");
    $result = mysqli_fetch_assoc($sql);

    $editform = '<form action="DaftarTeman.php" method="POST">
        <input type="hidden" name="id" value='.$result["id"].'>
        <input type="text" placeholder="Nama Lengkap" name="nama" value='.$result["nama"].'>
        <input type="text" placeholder="NIM" name="nim" value='.$result["nim"].'>
        <input type="text" placeholder="Angkatan(ex.2023)" name="angkatan" value='.$result["angkatan"].'>
        <input type="text" placeholder="Sistem Prodi" name="prodi" value='.$result["prodi"].'>
        <button name="simpan">Save</button>
    </form>';
}

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $angkatan = $_POST['angkatan'];
    $prodi = $_POST['prodi'];

    $sql = "UPDATE daftarteman SET
            nama = '$nama',
            nim = '$nim',
            angkatan = '$angkatan',
            prodi = '$prodi' WHERE id = $id
            ";

    mysqli_query($db, $sql);

    if (!mysqli_query($db, $sql)) {
        echo "Error: " . mysqli_error($db);
    }

    $pesan = "Data Berhasil ubah";
}

if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['delete'];
    mysqli_query($db, "DELETE FROM daftarteman WHERE id = $id");
    header("location: DaftarTeman.php");
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
    <title>Daftar Mahasiswa</title>
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
            <div class="box-tabel">
                <table>
                    <thead>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Angkatan</th>
                        <th>Sistem Prodi</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM daftarteman";
                        $result = mysqli_query($db, $sql);
                        $total = mysqli_num_rows($result);
                        
                        while ($teman = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>".$teman['nama']."</td>";
                            echo "<td>".$teman['nim']."</td>";
                            echo "<td>".$teman['angkatan']."</td>";
                            echo "<td>".$teman['prodi']."</td>";
                            echo "<td>";
                            echo "<td><a href=DaftarTeman.php?edit=".$teman['id'].">Edit</a></td>";
						    echo "<td><a href=DaftarTeman.php?delete=".$teman['id'].">Delete</a></td>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <?= $editform ?>
                <form action="DaftarTeman.php" method="POST">
                    <input type="text" placeholder="Nama Lengkap" name="nama">
                    <input type="text" placeholder="NIM" name="nim">
                    <input type="text" placeholder="Angkatan(ex.2023)" name="angkatan">
                    <input type="text" placeholder="Sistem Prodi" name="prodi">
                    <button name="tambah">Add</button>
                </form>
                <i><?= $pesan ?></i>
                <p>Total Teman : <?= $total ?></p>
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

    .box-tabel{
        width: 75%;
        height: 100%;
    }

    th, p{
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