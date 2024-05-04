<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">data pengguna
                <?php if ($_SESSION['status'] == "admin") : ?>
                    <a href="?page=pengguna_add" class="btn btn-success btn-sm" style="float:right"><i class="ti ti-plus"></i> Tambah Data</a>
                <?php endif; ?>
            </h5>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Prodi</th>
                        <th>No Telepon</th>
                        <th>Status Akun</th>
                        <?php if ($_SESSION['status'] == "admin") : ?>
                            <th>Status</th>
                        <?php endif; ?>
                        <?php if ($_SESSION['status'] == "admin") : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($konek, "select * from pengguna");
                    while ($row = mysqli_fetch_array($data)) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['nama_lengkap']; ?></td>
                            <td><?= $row['prodi']; ?></td>
                            <td><?= $row['no_telp']; ?></td>
                            <?php if ($_SESSION['status'] == "admin") : ?>
                                <td><?= $row['status']; ?></td>
                            <?php endif; ?>
                            <td><?= $row['status_akun']; ?></td>
                            <?php if ($_SESSION['status'] == "admin") : ?>
                                <td>
                                    <?php if ($row['status_akun'] != "diajukan") echo "&nbsp";
                                    else { ?>
                                        <a href="?page=verifikasi_pengguna&id=<?= $row[0]; ?>&status=diverifikasi" class="btn btn-warning btn-sm" onclick="confirm('Yakin Ingin menyetujui akun ini ?')"><i class="ti ti-check"></i>Disetujui</a>
                                        <a href="?page=verifikasi_pengguna&id=<?= $row[0]; ?>&status=ditolak" class="btn btn-danger btn-sm" onclick="confirm('Yakin ingin menolak akun ini ?')"><i class="ti ti-ban"></i>Ditolak</a>
                                    <?php } ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>