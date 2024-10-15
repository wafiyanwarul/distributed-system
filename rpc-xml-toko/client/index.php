<?php
error_reporting(1);
include "RPCClient.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Client</title>
</head>

<body>
    <h2><a href="?page=home">Home</a> | <a href="?page=tambah">Tambah Data</a> | <a href="?page=daftar-data">Data Server</a></h2>
    <hr />

    <?php
    if (isset($_GET['page']) && $_GET['page'] == 'tambah') { ?>
        <legend>Tambah Data</legend>
        <form name="form" method="post" action="proses.php">
            <input type="hidden" name="aksi" value="tambah" />
            <label>ID Barang</label><br />
            <input type="text" name="id_barang" /><br />
            <label>Nama Barang</label><br />
            <input type="text" name="nama_barang" /><br />
            <button type="submit" name="simpan">Simpan</button>
        </form>
    <?php } elseif (isset($_GET['page']) && $_GET['page'] == 'ubah') {
        $id_barang = $_GET['id_barang']; ?>
        <legend>Ubah Data</legend>
        <form name="form" method="post" action="proses.php">
            <input type="hidden" name="aksi" value="ubah" />
            <input type="hidden" name="id_barang" value="<?php echo $id_barang ?>" />
            <label>ID Barang</label><br />
            <input type="text" value="<?php echo $id_barang ?>" disabled /><br />
            <label>Nama Barang</label><br />
            <input type="text" name="nama_barang" value="<?php echo $nama_barang ?>" /><br />
            <button type="submit" name="ubah">Ubah</button>
        </form>
    <?php } elseif (isset($_GET['page']) && $_GET['page'] == 'daftar-data') { ?>
        <legend>Daftar Data Server</legend>
        <table border="1">
            <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Aksi</th>
            </tr>
            <?php
            $data_array = $abc->tampil_semua_data();
            $sn = 1;
            foreach ($data_array as $r) {
            ?>
                <tr>
                    <td><?php echo $r['id_barang']; ?></td>
                    <td><?php echo $r['nama_barang']; ?></td>
                    <td><a href="?page=ubah&id_barang=<?php echo $r['id_barang'] ?>">Ubah</a> |
                        <a href="proses.php?aksi=hapus&id_barang=<?php echo $r['id_barang'] ?>"
                            onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
    <hr />
    <p>Aplikasi sederhana ini menggunakan RPC (Remote Procedure Call) dengan format data XML (Extensible Markup Language).</p>
</body>

</html>