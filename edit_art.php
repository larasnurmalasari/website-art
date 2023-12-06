<?php
include "koneksi_art.php";

// Periksa apakah ada parameter ID yang dikirim melalui URL
if (isset($_GET['id_art'])) {
    $id_art = $_GET['id_art'];

    // Query SELECT untuk mengambil data siswa berdasarkan ID tertentu
    $select_sql = "SELECT * FROM si_art WHERE id_art = '$id_art'";
    $result = mysqli_query($conn, $select_sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data yang diubah dari form
    // ... (bagian ini sama dengan yang telah Anda tulis sebelumnya)

    $new_id_art = $_POST['id_art'];
    $new_nama = $_POST['nama'];
    $new_jenkel = $_POST['jenkel'];
    $new_tanggal_lahir = $_POST['tanggal_lahir'];
    $new_alamat = $_POST['alamat'];
    $new_no_hp = $_POST['no_hp'];
    $new_pengalaman = $_POST['pengalaman'];
    $new_keahlian = implode(',', $_POST['keahlian']);
    $new_berkendara = $_POST['berkendara'];

    $update_sql = "UPDATE si_art SET 
                   nama='$new_nama', 
                   jenkel='$new_jenkel', 
                   tanggal_lahir='$new_tanggal_lahir', 
                   alamat='$new_alamat', 
                   no_hp='$new_no_hp',
                   pengalaman='$new_pengalaman', 
                   keahlian='$new_keahlian',
                   berkendara='$new_berkendara' 
                   WHERE id_art='$new_id_art'";

    $update_query = mysqli_query($conn, $update_sql);

    if ($update_query) {
        echo "Data siswa berhasil diupdate.";
        header("Location: cari_art.php");
        exit();
    } else {
        echo "Gagal mengupdate data siswa. Error: " . mysqli_error($conn);
    }
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
        padding: 5px;
        text-align: left;
    }
</style>
<body  style="background-color:rgb(48,206,209);">

<!-- Form untuk mengedit data -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>
    <!-- Styles dan scripts -->
</head>
<body>
    <h3>Edit Data Siswa</h3>
    <form method="post" action="">
        <table>
            <tr>
                <td>Id Art</td>
                <td>:</td>
                <td><input type="text" name="id_art" value="<?php echo isset($data['id_art']) ? $data['id_art'] : ''; ?>" required></td>
            </tr>
</tr>
            <tr>
    <td>Nama</td>
    <td>:</td>
    <td><input type="text" name="nama" value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>" required></td>
</tr>
<tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td>
        <input type="radio" id="jenis_kelamin_l" name="jenkel" value="Laki-laki" <?php echo (isset($data['jenkel']) && $data['jenkel'] == 'Laki-laki') ? 'checked' : ''; ?> required>
        <label for="jenis_kelamin_l">Laki-laki</label>
        <input type="radio" id="jenis_kelamin_p" name="jenkel" value="Perempuan" <?php echo (isset($data['jenkel']) && $data['jenkel'] == 'Perempuan') ? 'checked' : ''; ?> required>
        <label for="jenis_kelamin_p">Perempuan</label>
    </td>
</tr>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required></td>
            </tr>
            <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><input type="text" name="alamat" value="<?php echo isset($data['alamat']) ? $data['alamat'] : ''; ?>" required></td>
</tr>
<tr>
    <td>No hp</td>
    <td>:</td>
    <td><input type="text" name="no_hp" value="<?php echo isset($data['no_hp']) ? $data['no_hp'] : ''; ?>" required></td>
</tr>
<tr>
    <td>Pengalaman</td>
    <td>:</td>
    <td> 
        <select name="pengalaman">
            <option value="pernah bekerja" <?php echo (isset($data['pengalaman']) && $data['pengalaman'] == 'pernah bekerja') ? 'selected' : ''; ?>>Pernah Bekerja</option>
            <option value="tidak pernah bekerja" <?php echo (isset($data['pengalaman']) && $data['pengalaman'] == 'tidak pernah bekerja') ? 'selected' : ''; ?>>Tidak Pernah Bekerja</option>
        </select>
    </td>
</tr>
<td>Keahlian</td>
<td>:</td>
<td>
    <input type="checkbox" name="keahlian[]" value="setrika" <?php echo (isset($data['keahlian']) && in_array('setrika', explode(',', $data['keahlian']))) ? 'checked' : ''; ?>> Setrika<br>
    <input type="checkbox" name="keahlian[]" value="ngasuh anak" <?php echo (isset($data['keahlian']) && in_array('ngasuh anak', explode(',', $data['keahlian']))) ? 'checked' : ''; ?>> Ngasuh anak<br>
    <input type="checkbox" name="keahlian[]" value="cuci baju" <?php echo (isset($data['keahlian']) && in_array('cuci baju', explode(',', $data['keahlian']))) ? 'checked' : ''; ?>> Cuci baju<br>
    <input type="checkbox" name="keahlian[]" value="masak" <?php echo (isset($data['keahlian']) && in_array('masak', explode(',', $data['keahlian']))) ? 'checked' : ''; ?>> Masak<br>
    <input type="checkbox" name="keahlian[]" value="tukang kebun" <?php echo (isset($data['keahlian']) && in_array('tukang kebun', explode(',', $data['keahlian']))) ? 'checked' : ''; ?>> Tukang kebun<br>
    <input type="checkbox" name="keahlian[]" value="antar jemput" <?php echo (isset($data['keahlian']) && in_array('antar jemput', explode(',', $data['keahlian']))) ? 'checked' : ''; ?>> Antar jemput<br>
    <input type="checkbox" name="keahlian[]" value="pengasuh" <?php echo (isset($data['keahlian']) && in_array('pengasuh', explode(',', $data['keahlian']))) ? 'checked' : ''; ?>> Pengasuh lansia<br>
</td>
            </tr>
            <tr>
    <td>Berkendara</td>
    <td>:</td>
    <td> 
        <select name="berkendara">
            <option value="bisa bawa motor" <?php echo (isset($data['berkendara']) && $data['berkendara'] == 'bisa bawa motor') ? 'selected' : ''; ?>>Bisa Bawa Motor</option>
            <option value="bisa bawa mobil" <?php echo (isset($data['berkendara']) && $data['berkendara'] == 'bisa bawa mobil') ? 'selected' : ''; ?>>Bisa Bawa Mobil</option>
            <option value="bisa keduanya" <?php echo (isset($data['berkendara']) && $data['berkendara'] == 'bisa keduanya') ? 'selected' : ''; ?>>Bisa Keduanya</option>
        </select>
    </td>
</tr>
                </td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" name="proses" value="Ubah"></td>
            </tr>
        </table>
    </form>
    <p><a href="cari_art.php">Kembali ke Data Asisten Rumah Tangga</a></p>
</body>
</html>