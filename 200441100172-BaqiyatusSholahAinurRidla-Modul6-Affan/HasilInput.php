<?php
include "Database.php";

if(isset($_REQUEST['edit'])){
    $id = $_REQUEST['edit'];
    $sql = mysqli_query($db, "SELECT * FROM daftarteman WHERE id = $id");
    $result = mysqli_fetch_assoc($sql);
}

if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['delete'];
    mysqli_query($db, "DELETE FROM daftarteman WHERE id = $id");
    header("location: DaftarTeman.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <table align="center" style="border: 1px solid black;">
        <thead>
            <th style="padding: 8px 10px;">Nama</th>
            <th style="padding: 8px 10px;">UMUR</th>
            <th style="padding: 8px 10px;">NIM</th>
            <th style="padding: 8px 10px;">Fakultas</th>
            <th style="padding: 8px 10px;">Sistem Prodi</th>
            <th style="padding: 8px 10px;">Asal Kota</th>
            <th style="padding: 8px 10px;" colspan="2">Opsi</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM datamahasiswa";
            $result = mysqli_query($db, $sql);
            
            while ($mahasiswa = mysqli_fetch_array($result)) {
                echo "<tr align='center'>";
                echo "<td>".$mahasiswa['nama']."</td>";
                echo "<td>".$mahasiswa['umur']."</td>";
                echo "<td>".$mahasiswa['nim']."</td>";
                echo "<td>".$mahasiswa['fakultas']."</td>";
                echo "<td>".$mahasiswa['prodi']."</td>";
                echo "<td>".$mahasiswa['asal']."</td>";
                echo "<td style='background-color: white;'><a href=UserEdit.php?edit=".$mahasiswa['id'].">Edit</a></td>";
			    echo "<td style='background-color: white;'><a href=Datamahasiswa.php?delete=".$mahasiswa['id'].">Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="UserInput.php">(+) Tambah</a>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    a{
        text-decoration: none;
        font-family: "Poppins";
    }
    th{
        font-family: "Poppins";
        background-color: #00CED1;
    }
    td{
        font-family: "Poppins";
        padding: 8px 10px;
        background-color: #B0E0E6;
    }
</style>