<?php
    include 'koneksi_art.php';

    if(isset($_POST['aksi'])) {
        if($_POST['aksi'] == "add") {
            $nama = $_POST['nama'];
            $jenkel = $_POST['jenkel'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];
            $pengalaman = $_POST['pengalaman'];
            $keahlian = $_POST['keahlian'];
            $keahlian = implode(", ", $keahlian);
            $berkendara = $_POST['berkendara'];

            $query = "INSERT INTO si_art VALUES (null, '$nama', '$jenkel', '$tanggal_lahir', '$alamat', '$no_hp', '$pengalaman', '$keahlian', '$berkendara')";
            $sql = mysqli_query($conn, $query);            

            if($sql){
                header("location: read.php");
                echo "Data Berhasil Ditambahkan";
            } else {
                echo $query;
            }

            //echo $nama." | ".$jenkel." | ".$jenkel." | ".$tanggal_lahir." | ".$alamat." | ".$no_telpn." | ".$pengalaman." | ".$keahlian." | ".$berkendara;

            //echo "<br>Tambah Data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit") {
            //var_dump($_POST);

            $nama = $_POST['nama'];
            $jenkel = $_POST['jenkel'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];
            $pengalaman = $_POST['pengalaman'];
            $keahlian = $_POST['keahlian'];
            $keahlian = implode(", ", $keahlian);
            $berkendara = $_POST['berkendara'];

            $query = "UPDATE si_art SET nama='$nama', jenkel='$jenkel', tanggal_lahir='$tanggal_lahir', alamat='$alamat', no_hp='$no_hp', pengalaman='$pengalaman', 
               keahlian='$keahlian', berkendara='$berkendara';";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: read.php");
                echo "Data Berhasil Diubah";
            } else {
                echo $query;
            }
        }
    }

    if(isset($_GET['hapus'])) {
        $id_art = $_GET['hapus'];
        $query = "DELETE FROM si_art WHERE id_art = '$id_art';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: read.php");
            //echo "Data Berhasil Dihapus <a href='index.php'>[Home]</a>";
        } else {
            echo $query;
        }
        //echo "Hapus Data <a href='index.php'>[Home]</a>";
    }
?>
