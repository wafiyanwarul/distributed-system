<?php
error_reporting(1);
include "Client.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_barang" => $_POST['id_barang'],
        "nama_barang" => $_POST['nama_barang']
    );
    var_dump($_POST);
    $abc->tambah_data($data);
    header('location:index.php?page=daftar-data');
} elseif ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_barang" => $_POST['id_barang'],
        "nama_barang" => $_POST['nama_barang']
    );
    $abc->ubah_data($data);
    header('location:index.php?page=daftar-data');
} elseif ($_GET['aksi'] == 'hapus') {
    $abc->hapus_data($_GET['id_barang']);
    header('location:index.php?page=daftar-data');
}
?>