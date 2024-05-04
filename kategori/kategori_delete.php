<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $exe = mysqli_query($konek, "delete from kategori_prestasi where id='$id'");
    if ($exe) {
        echo "<script>alert('Data kategori prestasi berhasil dihapus');</script>";
        echo "meta http-equiv='refresh' content='0; url=?page=kategori_read'>";
    } else {
        echo "<script>alert('Data kategori prestasi gagal dihapus');</script>";
        echo "<h2>" . mysqli_error($konek) . "</h2>";
    }
}
