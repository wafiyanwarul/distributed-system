<?php
include "Client.php";
?>
<!doctype html>
<html>

<head>
    <title>Data</title>
</head>

<body>
    <a href="?page=home">Home</a> | <a href="?page=tambah">Tambah Data</a> | <a href="?page=daftar-data">Data Server</a>
    <br /><br />
    <fieldset>

        <?php if ($_GET['page'] == 'tambah') { ?>
            <legend>Tambah Data</legend>
            <form name="form" method="POST" action="proses.php">
                <input type="hidden" name="aksi" value="tambah">
                <label>Id Barang</label><br />
                <input type="text" name="id_barang"><br />
                <label>Nama Barang</label><br />
                <input type="text" name="nama_barang"><br /><br />
                <button type="submit" name="simpan">Simpan</button>
            </form>
        <? } elseif ($_GET['page'] == 'ubah') {
            $r = $abc->tampil_data($_GET['id_barang']);
        ?>
            <legend>Ubah Data</legend>
            <form name="form" method="POST" action="proses.php">
                <input type="hidden" name="aksi" value="ubah" />
                <input type="hidden" name="id_barang" value="<?= $r->barang->id_barang ?>" />
                <label>Id Barang</label><br />
                <input type="text" value="<?= $r->barang->id_barang ?>" disabled><br />
                <label>Nama Barang</label><br />
                <input type="text" name="nama_barang" value="<?= $r->barang->nama_barang ?>"><br /><br />
                <button type="submit" name="ubah">Ubah</button>
            </form>
        <?
            unset($r);
        } else if ($_GET['page'] == 'daftar-data') {
        ?>
            <legend>Daftar Data Server</legend>
            <table border="1">
                <th width="5%">No</th>
                <th width="10%">ID Barang</th>
                <th width="75%">Nama Barang</th>
                <th width="5%" colspan="2">Aksi</th>
                </tr>
                <?php
                $no = 1;
                $data_array = $abc->tampil_semua_data();
                foreach ($data_array as $r) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $r->id_barang ?></td>
                        <td><?php echo $r->nama_barang ?></td>
                        <td><a href="?page=ubah&id_barang=<?= $r->id_barang ?>">Ubah</a></td>
                        <td><a href="proses.php?aksi=hapus&id_barang=<?= $r->id_barang ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
                    </tr>
                <?php
                    $no++;
                }
                unset($data_array, $no, $r);
                ?>
            </table>
        <?php
        } else {
        ?>
            <legend>Home</legend>
            Aplikasi sederhana ini menggunakan RESTful dengan format data XML (Extensible Markup Language).
        <?php } ?>
    </fieldset>

</body>

</html>