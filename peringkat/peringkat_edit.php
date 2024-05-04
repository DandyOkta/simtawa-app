<?php
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $nama_peringkat = $_POST['nama_peringkat'];
    $tingkatan = $_POST['tingkatan'];
    $exe = mysqli_query($konek, "update peringkat set nama_peringkat='$nama_peringkat', tingkatan='$tingkatan' where id='$id'");
    if ($exe) {
        echo "<script>alert('Data Peringkat berhasil diubah');</script>";
        echo "meta http-equiv='refresh' content='0; url=?page=peringkat_read'>";
    } else {
        echo "<script>alert('Data Peringkat gagal diubah');</script>";
        echo "<h2>" . mysqli_error($konek) . "</h2>";
    }
}
$exe = mysqli_query($konek, "select * from peringkat where id='$id'");
$row = mysqli_fetch_array($exe);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Tingkatan
                <a href="?page=peringkat_read" class="btn btn-success btn-sm" style="float:right"><i class="ti ti-arrow-left"></i>Kembali</a>
            </h5>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Peringkat</label>
                    <input type="text" value="<?= $row[1]; ?>" name="nama_peringkat" class="form-control" id="exampleInputEmail1">
                    <div class="mb-3 mt-3">
                        <label for="exampleInputPassword1" class="form-label">Tingkatan</label>
                        <select name="tingkatan" value="<?= $row[2]; ?>" class="form-select" id="exampleInputPassword1">
                            <option value="-">Pilih Tingkatan</option>
                            <option value="lokal" <?= ($row[2] == 'lokal') ? 'selected' : '' ?>>Lokal</option>
                            <option value="nasional" <?= ($row[2] == 'nasional') ? 'selected' : '' ?>>Nasional</option>
                            <option value="internasional" <?= ($row[2] == 'internasional') ? 'selected' : '' ?>>Internasional</option>
                        </select>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>