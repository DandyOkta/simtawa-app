<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username']; //ambil nilai dari inputan username simpan di $username
    $password = md5($_POST['password']); //ambil nilai dari inputan password lalu enkripsi dengan md5 simpan di $username
    include "../pengaturan/koneksi.php";
    $queryLogin = mysqli_query($konek, "select * from pengguna where username='$username' and password='$password'");
    if (mysqli_num_rows($queryLogin) > 0) {
        $data_pengguna = mysqli_fetch_array($queryLogin);
        if ($data_pengguna['status_akun'] == 'diajukan') {
            echo "<script>alert('Akun masih ditangguhkan. Hubungi operator kemahasiswaan');</script>";
            echo "<meta http-equiv='refresh' content='0, url=login_view.php'>";
        } else if ($data_pengguna['status_akun'] == 'ditolak') {
            echo "<script>alert('Akun telah ditolak oleh operator kemahasiswaan. Silahkan daftar ulang degna data yang benar');</script>";
            echo "<meta http-equiv='refresh' content='0, url=login_view.php'>";
        } else {
            $_SESSION['id'] = $data_pengguna['id'];
            $_SESSION['nama'] = $data_pengguna['nama_lengkap'];
            $_SESSION['status'] = $data_pengguna['status'];
            echo "<script>alert('Selamat Datang di SIMATAWA-APP');</script>";
            echo "<meta http-equiv='refresh' content='0, url=../index.php?page=dashboard'>";
        }
    } else {
        echo "<script>alert('Username dan password tidak cocok!!');</script>";
        echo "<meta http-equiv='refresh' content='0, url=login_view.php'>";
    }
}
