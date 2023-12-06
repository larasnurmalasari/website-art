<!DOCTYPE html>
<html>
<head>
<body  style="background-color:rgb(48,206,209);">
    
    <title> Form Input Data Asisten Rumah Tangga </title>
    <style>
  <style>
  body {
            background-image: url('https://c4.wallpaperflare.com/wallpaper/744/747/648/morning-sun-on-gunung-batur-wallpaper-preview.jpg'); /* Ganti URL dengan gambar latar belakang yang valid */
            background-size: cover;
            background-repeat: no-repeat;
            font-family: serif, sans-serif;
            text-align: center;
        }

        body {
            text-align: center;
        }

        table {
            margin: 10px auto;
        }
    <style> 
         <style>
        body {
            text-align: center;
        }

        table {
            margin: 15px auto;
        }

        th, td {
            padding:0px;
            text-align: left;
        }
    </style>
    <style>
        input[type="submit"] {
            background-color: #191970;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;

        }

        input[type="submit"]:hover {
            background-color: #2074a0;
        }
    </style>
</head>
<body>
<style>
        .bold-textheader {
            font-weight: bold;
            font-size: 25px;
            color: #000000;
        }
        .bold-text1 {
            font-weight: bold;
            font-size: 18px;
            color: #000000;
        }
    </style>
</head>
<body>
    <p class="bold-textheader">Tambah Asisten Rumah Tangga</p>
    <form action="" method="post">
        <table>
            <tr>
                <td><p >Nama</p></td>
                <td>:</p></td>
                <td> <input type="text" name="nama"> </td>
            </tr>
            <tr>
                <td><p>Jenis Kelamin</p></td>
                <td><p class="bold-text1">:</p></td>
                <td> 
                    <input type="radio" id="jenis_kelamin_l" name="jenkel" value="Laki-laki" required>
                    <label for="jenis_kelamin_l">Laki-laki</label>
                    <input type="radio" id="jenis_kelamin_p" name="jenkel" value="Perempuan" required>
                    <label for="jenis_kelamin_p">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td><p>Tanggal Lahir</p></td>
                <td>:</p></td>
                <td> <input type="date" id="tanggal_lahir" name="tanggal_lahir" required> </td>
            </tr>
            <tr>
                <td><p>Alamat</p></td>
                <td>:</p></td>
                <td> <textarea name="alamat" rows="3" cols="25"></textarea> </td>
            </tr>
            <tr>
    <td><p>No HP</p></td>
    <td>:</p></td>
    <td> <input type="tel" name="no_hp"> </td>
</tr>
            <tr>
                <td><p>Pengalaman</p></td>
                <td>:</p></td>
                <td> 
                    <select name="pengalaman">
                        <option value="pernah bekerja">Pernah Bekerja</option>
                        <option value="tidak pernah bekerja">Tidak Pernah Bekerja</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><p>Keahlian</p></td>
                <td>:</p></td>
                <td> 
                    <input type="checkbox" name="keahlian[]" value="setrika"> Setrika
                    <input type="checkbox" name="keahlian[]" value="ngasuh anak"> Ngasuh anak
                    <input type="checkbox" name="keahlian[]" value="cuci baju"> Cuci baju 
                    <input type="checkbox" name="keahlian[]" value="masak"> Masak
                    <input type="checkbox" name="keahlian[]" value="tukang kebun"> Tukang kebun
                    <input type="checkbox" name="keahlian[]" value="antar jemput"> Antar jemput
                    <input type="checkbox" name="keahlian[]" value="pengasuh "> Pengasuh lansia
                </td>
            </tr>
            <tr>
                <td><p>Berkendara</p></td>
                <td>:</p></td>
                <td> 
                    <select name="berkendara">
                        <option value="bisa bawa motor">Bisa Bawa Motor</option>
                        <option value="bisa bawa mobil">Bisa Bawa Mobil</option>
                        <option value="bisa keduanya">Bisa Keduanya</option>
                       <option value="tidak bisa keduanya">Tidak Bisa Keduanya</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" name="proses" value="Simpan"> </td>
            </tr>
        </table>
    </form>
    </tr>
    </table>
</form>

<p><a href="index.php">Kembali ke Data Asisten Rumah Tangga</a></p>
</body>
</html>
</body>
</html>

<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'si_art';

    $conn = mysqli_connect($host, $user, $pass, $db);

    if(!$conn){
        die("Koneksi Gagal: " . mysqli_connect_error());
    }

    // Jika tidak perlu, tidak perlu menggunakan mysqli_select_db karena sudah ada di dalam mysqli_connect()

    if(isset($_POST['proses'])){
        $nama=$_POST['nama'];
        $jenkel=$_POST['jenkel'];
        $tanggal_lahir=$_POST['tanggal_lahir'];
        $alamat=$_POST['alamat'];
        $no_hp=$_POST['no_hp'];
        $pengalaman=$_POST['pengalaman'];
        $keahlian=isset($_POST['keahlian']) ? implode(",", $_POST['keahlian']) : '';
        $berkendara=$_POST['berkendara'];

        // Query untuk memasukkan data ke database
        $query = "INSERT INTO si_art (nama, jenkel, tanggal_lahir, alamat, no_hp, pengalaman, keahlian, berkendara)
        VALUES ('$nama', '$jenkel', '$tanggal_lahir', '$alamat', '$no_hp', '$pengalaman', '$keahlian', '$berkendara')";

        // Lakukan query
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil dimasukkan.";
            // Lakukan tindakan setelah berhasil dimasukkan
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        // Tutup koneksi setelah selesai menggunakan database (opsional)
        mysqli_close($conn);
    }
?>