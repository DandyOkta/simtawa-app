<?php
if (isset($_POST['simpan'])) {
    $npm = $_POST['npm'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_telp = $_POST['no_telp'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];
    $cek_npm = mysqli_query($konek, "select * from pengguna where npm='$npm'");
    $exe = mysqli_query($konek, "insert into pengguna values (null, '$npm', '$nama_lengkap', '$status', '$no_telp', '$npm', '$password', '$status', 'diverifikasi')");
    if ($exe) {
        echo "<script>alert('Data Pengguna berhasil disimpan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=pengguna_read'";
    } else {
        echo "<script>alert('Data pengguna gagal disimpan');</script>";
        echo "<h2>" . mysqli_error($konek) . "</h2>";
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Pengguna (Admin/Operator)
                <a href="?page=pengguna_read" class="btn btn-success btn-sm" style="float:right"><i class="ti ti-arrow-left"></i>Kembali</a>
            </h5>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Username</label>
                    <input type="text" name="npm" required class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">No Telepon / WA</label>
                    <input type="text" name="no_telp" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="">Pilih Status</option>
                        <option value="Admin">Admin</option>
                        <option value="Operator">Operator</option>
                    </select>
                </div>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>