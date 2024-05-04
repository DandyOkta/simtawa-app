<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Kategori Prestasi
                <?php if ($_SESSION['status'] == "admin") : ?>
                    <a href="?page=kategori_add" class="btn btn-success btn-sm" style="float:right"><i class="ti ti-plus"></i> Tambah Data</a>
                <?php endif; ?>
            </h5>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <?php if ($_SESSION['status'] == "admin") : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($konek, "select * from kategori_prestasi");
                    while ($row = mysqli_fetch_array($data)) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td><?= $row['keterangan']; ?></td>
                            <?php if ($_SESSION['status'] == "admin") : ?>
                                <td><a href="?page=kategori_edit&id=<?= $row[0]; ?>" class="btn btn-warning btn-sm"><i class="ti ti-pencil"></i>Edit</a>
                                    <a href="?page=kategori_delete&id=<?= $row[0]; ?>" class="btn btn-danger btn-sm" onclick="confirm('Apakaha anda yakin ingin hapus data ini')"><i class="ti ti-trash"></i>Hapus</a>
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