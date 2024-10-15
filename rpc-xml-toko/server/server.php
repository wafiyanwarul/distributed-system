<?php
error_reporting(1); // error ditampilkan
header('Content-Type: text/xml; charset=UTF-8;');

include "Database.php";
// buat objek baru dari class Database
$abc = new Database();

// function untuk menghapus selain huruf dan angka
function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
    unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = file_get_contents("php://input");
    $data = xmlrpc_decode($input);

    $aksi = $data[0]['aksi'];
    $id_barang = $data[0]['id_barang'];
    $nama_barang = $data[0]['nama_barang'];

    if ($aksi == 'tambah') {
        $data2 = array(
            'id_barang' => $id_barang,
            'nama_barang' => $nama_barang
        );
        $abc->tambah_data($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_barang' => $id_barang,
            'nama_barang' => $nama_barang
        );
        $abc->ubah_data($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_data($id_barang);
    }
    // hapus variable dari memory
    unset($input, $data, $data2, $id_barang, $nama_barang, $aksi);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['aksi']) && $_GET['aksi'] == 'tampil' && isset($_GET['id_barang'])) {
        $id_barang = filter($_GET['id_barang']);
        $data = $abc->tampil_data($id_barang);
        $xml = xmlrpc_encode($data);
        echo $xml;
    } else {
        // menampilkan semua data
        $data = $abc->tampil_semua_data();
        $xml = xmlrpc_encode($data);
        echo $xml;
    }

    unset($xml, $query, $id_barang, $data);
}