<?php
if (isset($_POST['simpan'])) {
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];
    $exe = mysqli_query($konek, "insert into kategori_prestasi values(null,'$kategori','$keterangan')");
    if ($exe) {
        echo "<script>alert('Data Peringkat berhasil disimpan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=kategori_read'";
    } else {
        echo "<script>alert('Data kategori prestasi gagal disimpan');</script>";
        echo "<h2>" . mysqli_error($konek) . "</h2>";
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Kategori Prestasi
                <a href="?page=kategori_read" class="btn btn-success btn-sm" style="float:right"><i class="ti ti-arrow-left"></i>Kembali</a>
            </h5>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kategori Prestasi</label>
                    <input type="text" name="kategori" class="form-control" id="exampleInputEmail1">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>