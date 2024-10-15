<?php
error_reporting(1);
include "Client.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Service SOAP</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">SOAP App</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
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
        <br />

        <fieldset class="border p-4">
            <?php if ($_GET['page'] == 'tambah') { ?>
                <legend class="w-auto">Tambah Data</legend>
                <form name="form" method="post" action="proses.php">
                    <input type="hidden" name="aksi" value="tambah" />
                    <div class="form-group">
                        <label for="id_barang">ID Barang</label>
                        <input type="text" class="form-control" name="id_barang" />
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </form>
            <?php } else if ($_GET['page'] == 'ubah') {
                $r = $abc->tampil_data($_GET['id_barang']);
            ?>
                <legend class="w-auto">Ubah Data</legend>
                <form name="form" method="post" action="proses.php">
                    <input type="hidden" name="aksi" value="ubah" />
                    <input type="hidden" name="id_barang" value="<?= $r['id_barang'] ?>" />
                    <div class="form-group">
                        <label for="id_barang">ID Barang</label>
                        <input type="text" class="form-control" value="<?= $r['id_barang'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" value="<?= $r['nama_barang'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
                </form>
            <?php unset($r);
            } else if ($_GET['page'] == 'daftar-data') {
            ?>
                <legend class="w-auto">Daftar Data Server</legend>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">ID Barang</th>
                            <th width="75%">Nama</th>
                            <th width="5%" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $data_array = $abc->tampil_semua_data();
                        foreach ($data_array as $r) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $r['id_barang'] ?></td>
                                <td><?= $r['nama_barang'] ?></td>
                                <td><a href="?page=ubah&id_barang=<?= $r['id_barang'] ?>" class="btn btn-warning btn-sm">Ubah</a></td>
                                <td><a href="proses.php?aksi=hapus&id_barang=<?= $r['id_barang'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
                            </tr>
                        <?php $no++;
                        }
                        unset($data_array, $r, $no);
                        ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <legend class="w-auto">Home</legend>
                <p>Aplikasi sederhana ini menggunakan Web Service SOAP (Simple Object Access Protocol) dengan format data XML (Extensible Markup Language).</p>
            <?php } ?>
        </fieldset>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>