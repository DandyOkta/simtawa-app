<?php
session_start(); //memulai fungsi session 
if (!isset($_SESSION['id'])) { //jika session id belum diset
    header('location:login/login_view.php'); // arahkan halaman ke login_view.php di folder login
}
include "pengaturan/koneksi.php";
include "template/sidebar.php"; // memanggil file sidebar
include "template/header.php";
$page = $_GET['page'];
switch ($page) {
    case "kategori_add":
        include "kategori/kategori_add.php";
        break;
    case "kategori_read":
        include "kategori/view_data.php";
        break;
    case "kategori_edit":
        include "kategori/kategori_edit.php";
        break;
    case "kategori_delete":
        include "kategori/kategori_delete.php";
        break;
    case "peringkat_add":
        include "peringkat/peringkat_add.php";
        break;
    case "peringkat_read":
        include "peringkat/view_data_peringkat.php";
        break;
    case "peringkat_edit":
        include "peringkat/peringkat_edit.php";
        break;
    case "peringkat_delete":
        include "peringkat/peringkat_delete.php";
        break;
    case "pengguna_read":
        include "pengguna/view_data_pengguna.php";
        break;
    case "verifikasi_pengguna":
        include "pengguna/verifikasi_pengguna.php";
        break;
    case "pengguna_add":
        include "pengguna/pengguna_add.php";
        break;
}
include "template/footer.php";
