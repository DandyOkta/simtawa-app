<?php
if (isset($_POST['simpan'])) {
    $nama_peringkat = $_POST['nama_peringkat'];
    $tingkatan = $_POST['tingkatan'];
    $exe = mysqli_query($konek, "insert into peringkat values(null,'$nama_peringkat','$tingkatan')");
    if ($exe) {
        echo "<script>alert('Data kategori prestasi berhasil disimpan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=peringkat_read'";
    } else {
        echo "<script>alert('Data kategori prestasi gagal disimpan');</script>";
        echo "<h2>" . mysqli_error($konek) . "</h2>";
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Tingkatan
                <a href="?page=peringkat_read" class="btn btn-success btn-sm" style="float:right"><i class="ti ti-arrow-left"></i>Kembali</a>
            </h5>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Peringkat</label>
                    <input type="text" name="nama_peringkat" class="form-control" id="exampleInputEmail1">
                    <div class="mb-3 mt-3">
                        <label for="exampleInputPassword1" class="form-label">Tingkatan</label>
                        <select name="tingkatan" class="form-select" id="exampleInputPassword1" required>
                            <option value="">Pilih Tingkatan</option>
                            <option value="Lokal">Lokal</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Internasional">Internasional</option>
                        </select>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>