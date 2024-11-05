<?php
include "Client.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "no_pesanan" => $_POST['no_pesanan'],
        "no_meja" => $_POST['no_meja'],
        "tanggal_pesanan" => $_POST['tanggal_pesanan'],
        "waktu_pesanan" => $_POST['waktu_pesanan'],
        "nama_menu" => $_POST['nama_menu'],
        "harga" => $_POST['harga'],
    );
    $abc->tambah_data($data);
    header('location:index.php?page=daftar-data');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "no_pesanan" => $_POST['no_pesanan'],
        "no_meja" => $_POST['no_meja'],
        "tanggal_pesanan" => $_POST['tanggal_pesanan'],
        "waktu_pesanan" => $_POST['waktu_pesanan'],
        "nama_menu" => $_POST['nama_menu'],
        "harga" => $_POST['harga'],
    );
    $abc->ubah_data($data);
    header('location:index.php?page=daftar-data');
} else if ($_GET['aksi'] == 'hapus') {
    $abc->hapus_data($_GET['no_pesanan']);
    header('location:index.php?page=daftar-data');
}
unset($abc, $data);
?>
