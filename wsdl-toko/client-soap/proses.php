<?php
include "Client.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_barang" => $_POST['id_barang'],
        "nama_barang" => $_POST['nama_barang'],
    );
    $abc->tambah_data($data);
    header('location:index.php?page=daftar-data');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_barang" => $_POST['id_barang'],
        "nama_barang" => $_POST['nama_barang'],
    );
    $abc->ubah_data($data);
    header('location:index.php?page=daftar-data');
} else if ($_GET['aksi'] == 'hapus') {
    $abc->hapus_data($_GET['id_barang']);
    header('location:index.php?page=daftar-data');
}
unset($abc, $data);
?>
