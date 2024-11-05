<?php
include "Client.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WSDL Client</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">WSDL SOAP Client Restoran</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
            </div>
        </nav>

        <!-- Content Section -->
        <div class="card shadow-sm p-4 mb-5 bg-white rounded">
            <fieldset>
                <?php if ($_GET['page'] == 'tambah') { ?>
                    <legend class="mb-3">Tambah Data</legend>
                    <form name="form" action="proses.php" method="post">
                        <input type="hidden" name="aksi" value="tambah" />
                        <div class="mb-3">
                            <label>No. Pesanan</label>
                            <input type="text" name="no_pesanan" class="form-control" placeholder="Masukkan No. Pesanan" />
                        </div>
                        <div class="mb-3">
                            <label>No. Meja</label>
                            <input type="text" name="no_meja" class="form-control" placeholder="Masukkan No. Meja" />
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Pesanan</label>
                            <input type="date" name="tanggal_pesanan" class="form-control" placeholder="Masukkan Tanggal Pesanan" />
                        </div>
                        <div class="mb-3">
                            <label>Waktu Pesanan</label>
                            <input type="text" name="waktu_pesanan" class="form-control" placeholder="Masukkan Waktu Pesanan" />
                        </div>
                        <div class="mb-3">
                            <label>Nama Menu</label>
                            <input type="text" name="nama_menu" class="form-control" placeholder="Masukkan Nama Menu" />
                        </div>
                        <div class="mb-3">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga" />
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>

                    <?php } elseif ($_GET['page'] == 'ubah') {
                    $r = $abc->tampil_data($_GET['no_pesanan']); ?>
                    <legend class="mb-3">Ubah Data</legend>
                    <form name="form" action="proses.php" method="post">
                        <input type="hidden" name="aksi" value="ubah" />
                        <input type="hidden" name="no_pesanan" value="<?= $r->no_pesanan ?>" />
                        <div class="mb-3">
                            <label>No. Pesanan</label>
                            <input type="text" name="no_pesanan" value="<?= $r->no_pesanan ?>" class="form-control" disabled>
                        </div>
                        <div class="mb-3">
                            <label>No. Meja</label>
                            <input type="text" name="no_meja" value="<?= $r->no_meja ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Pesanan</label>
                            <input type="date" name="tanggal_pesanan" value="<?= $r->tanggal_pesanan ?>" class="form-control" placeholder="Masukkan Tanggal Pesanan" />
                        </div>
                        <div class="mb-3">
                            <label>Waktu Pesanan</label>
                            <input type="text" name="waktu_pesanan" value="<?= $r->waktu_pesanan ?>" class="form-control" placeholder="Masukkan Waktu Pesanan" />
                        </div>
                        <div class="mb-3">
                            <label>Nama Menu</label>
                            <input type="text" name="nama_menu" value="<?= $r->nama_menu ?>"class="form-control" placeholder="Masukkan Nama Menu" />
                        </div>
                        <div class="mb-3">
                            <label>Harga</label>
                            <input type="text" name="harga" value="<?= $r->harga ?>"class="form-control" placeholder="Masukkan Harga" />
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                <?php unset($r);
                } elseif ($_GET['page'] == 'daftar-data') { ?>
                    <legend class="mb-3">Daftar Data Server</legend>
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>No. Pesanan</th>
                                <th>No. Meja</th>
                                <th>Tanggal Pesanan</th>
                                <th>Waktu Pesanan</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $no = 1;
                            $data_array = $abc->tampil_semua_data();
                            foreach ($data_array as $r) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $r->no_pesanan ?></td>
                                    <td><?= $r->no_meja ?></td>
                                    <td><?= $r->tanggal_pesanan ?></td>
                                    <td><?= $r->waktu_pesanan ?></td>
                                    <td><?= $r->nama_menu?></td>
                                    <td><?= $r->harga?></td>
                                    <td><a href="?page=ubah&no_pesanan=<?= $r->no_pesanan ?>" class="btn btn-warning btn-sm">Ubah</a></td>
                                    <td><a href="proses.php?aksi=hapus&no_pesanan=<?= $r->no_pesanan ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
                                </tr>
                            <?php $no++;
                            }
                            unset($data_array, $r, $no);
                            ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <legend class="mb-3">Home</legend>
                    <p>Aplikasi sederhana ini menggunakan WSDL (Web Services Description Language) dengan format data XML (Extensible Markup Language). WSDL Server menggunakan library NuSOAP, sedangkan WSDL Client menggunakan SOAP Client.</p>
                <?php } ?>
            </fieldset>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
