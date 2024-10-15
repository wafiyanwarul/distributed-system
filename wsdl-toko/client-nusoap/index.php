<?php
error_reporting(1);
include "Client.php";

// Jumlah data per halaman
$limit = 10;

// Menentukan halaman saat ini (current page)
$page = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$start = ($page > 1) ? ($page * $limit) - $limit : 0;

// Mendapatkan total jumlah data dari server
$data_array = $abc->tampil_semua_data();
$total = count($data_array); // Total jumlah data

// Memotong data sesuai dengan halaman
$paginated_data = array_slice($data_array, $start, $limit);

// Menghitung total halaman
$total_pages = ceil($total / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WSDL Client</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">WSDL Client</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?page=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=tambah">Tambah Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=daftar-data">Data Server</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <fieldset class="border p-4">
                    <?php if ($_GET['page'] == 'tambah') { ?>
                        <!-- Form Tambah Data -->
                        <legend class="w-auto px-2">Tambah Data</legend>
                        <form action="proses.php" method="POST">
                            <input type="hidden" name="aksi" value="tambah" />
                            <label>ID Barang</label>
                            <input type="text" name="id_barang" class="form-control mb-2" />
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control mb-2" />
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    <?php } else if ($_GET['page'] == 'ubah' && isset($_GET['id_barang'])) {
                        // Mendapatkan data barang berdasarkan id_barang
                        $r = $abc->tampil_data($_GET['id_barang']);
                    ?>
                        <!-- Form Ubah Data -->
                        <legend class="w-auto px-2">Ubah Data</legend>
                        <form action="proses.php" method="POST">
                            <input type="hidden" name="aksi" value="ubah" />
                            <input type="hidden" name="id_barang" value="<?= $r['id_barang'] ?>">
                            <label>ID Barang</label>
                            <input type="text" class="form-control mb-2" value="<?= $r['id_barang']; ?>" disabled>
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control mb-2" value="<?= $r['nama_barang']; ?>">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>

                    <?php } else if ($_GET['page'] == 'daftar-data') { ?>
                        <!-- Daftar Data Server -->
                        <legend class="w-auto px-2">Daftar Data Server</legend>
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>No.</th>
                                    <th>ID Barang</th>
                                    <th>Nama</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $no = $start + 1;
                                foreach ($paginated_data as $r) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $r['id_barang']; ?></td>
                                        <td><?= $r['nama_barang']; ?></td>
                                        <td>
                                            <a href="?page=ubah&id_barang=<?= $r['id_barang'] ?>" class="btn btn-info btn-sm">Ubah</a>
                                        </td>
                                        <td>
                                            <a href="proses.php?aksi=hapus&id_barang=<?= $r['id_barang'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <?php if ($page > 1) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=daftar-data&halaman=<?= $page - 1 ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=daftar-data&halaman=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($page < $total_pages) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=daftar-data&halaman=<?= $page + 1 ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>

                    <?php } else { ?>
                        <!-- Halaman Home -->
                        <legend class="w-auto px-2">Home</legend>
                        <p>Aplikasi sederhana ini menggunakan WSDL (Web Service Description Language) dengan format data XML (Extensible Markup Language).</p>
                    <?php } ?>
                </fieldset>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
