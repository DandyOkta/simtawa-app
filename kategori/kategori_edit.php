<?php
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];
    $exe = mysqli_query($konek, "update kategori_prestasi set nama_kategori='$kategori', keterangan='$keterangan' where id='$id'");
    if ($exe) {
        echo "<script>alert('Data kategori prestasi berhasil diubah');</script>";
        echo "meta http-equiv='refresh' content='0; url=?page=kategori_read'>";
    } else {
        echo "<script>alert('Data kategori prestasi gagal diubah');</script>";
        echo "<h2>" . mysqli_error($konek) . "</h2>";
    }
}
$exe = mysqli_query($konek, "select * from kategori_prestasi where id='$id'");
$row = mysqli_fetch_array($exe);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Kategori Prestasi
                <a href="?page=kategori_read" class="btn btn-success btn-sm" style="float:right"><i class="ti ti-arrow-left"></i>Kembali</a>
            </h5>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kategori Prestasi</label>
                    <input type="text" value="<?= $row[1]; ?>" name="kategori" class="form-control" id="exampleInputEmail1">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" value="<?= $row[2]; ?>" name="keterangan" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>