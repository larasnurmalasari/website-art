<?php
include 'koneksi_art.php';

// Default query without search
$query = "SELECT * FROM si_art ORDER BY nama ASC;";
$search = '';

// If search term is set, modify the query
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM si_art WHERE nama LIKE '%$search%' ORDER BY nama ASC;";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}
?>
<style>
    body {
        text-align: center;
    }

    table {
        margin: 15px auto;
    }

    th,
    td {
        padding: 0px;
        text-align: left;
    }
</style>
<body  style="background-color:rgb(48,206,209);">


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <title>Data Asisten Rumah Tangga</title>
    <style>
        /* Your styles here */
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <!-- Your navbar content here -->
</nav>

<!-- Your other HTML content -->

<h3>Data Asisten Rumah Tangga</h3>

<form method="post" action="">
    <input type="text" name="search" placeholder="Cari Berdasarkan Nama">
    <input type="submit" value="Cari">
</form>

<table border="1">
    <thead>
    <tr>
        <th>ID Art</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Umur</th>
        <th>Alamat</th>
        <th>No.hp</th>
        <th>Pengalaman</th>
        <th>Keahlian</th>
        <th>Berkendara</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($baris = mysqli_fetch_assoc($result)) {
        // Hitung umur berdasarkan tanggal lahir
        $tgl_lahir = new DateTime($baris['tanggal_lahir']);
        $sekarang = new DateTime();
        $umur = $sekarang->diff($tgl_lahir)->y;

        echo "<tr>
                <td>{$baris['id_art']}</td>
                <td>{$baris['nama']}</td>
                <td>{$baris['jenkel']}</td>
                <td>{$baris['tanggal_lahir']}</td>
                <td>{$umur} tahun</td>
                <td>{$baris['alamat']}</td>
                <td>{$baris['no_hp']}</td>
                <td>{$baris['pengalaman']}</td>
                <td>{$baris['keahlian']}</td>
                <td>{$baris['berkendara']}</td>
                <td>
                <a href='edit_art.php?id_art={$baris['id_art']}'>Edit</a> |
                <a href='delete_art.php?id_art={$baris['id_art']}' onclick=\"return confirm('Yakin akan menghapus data ini?');\">
                    <input type='button' value='Hapus'>
                </a>
            </td>
        </tr>";
}

    ?>
    </tbody>
</table>
<?php
include "koneksi_art.php";

if (isset($_GET['hapus_id'])) {
    $hapus_id = $_GET['hapus_id'];
    $delete_query = "DELETE FROM si_art WHERE id_art='$hapus_id'";
    
    // Lakukan query delete
    $result = mysqli_query($koneksi, $delete_query);

    if ($result) {
        echo "<p><b>Data Berhasil dihapus</b></p>";
        echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
    } else {
        die("Error: " . mysqli_error($koneksi));
    }
}
?>
<!-- Tutup tag </table> dan </form> jika diperlukan -->
<p><a href="index.php">Kembali ke Data Asisten Rumah Tangga</a></p>
</body>