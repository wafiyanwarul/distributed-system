<?php
error_reporting(1); // Menampilkan error
header("Content-Type: text/xml; charset=UTF-8");
include "Database.php";

// Buat objek baru dari class Database
$abc = new Database();

// Fungsi untuk menghapus selain huruf dan angka
function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
    unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = file_get_contents("php://input");
    $data = simplexml_load_string($input);
    $aksi = $data->barang->aksi;
    $id_barang = $data->barang->id_barang;
    $nama_barang = $data->barang->nama_barang;

    if ($aksi == 'tambah') {
        $data2 = array(
            'id_barang' => $id_barang,
            'nama_barang' => $nama_barang,
        );
        $abc->tambah_data($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_barang' => $id_barang,
            'nama_barang' => $nama_barang,
        );
        $abc->ubah_data($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_data($id_barang);
    }
    unset($input, $data, $data2, $id_barang, $nama_barang, $aksi, $abc);
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi']=='tampil') and (isset($_GET['id_barang'])) ) 
    {
        $id_barang = filter($_GET['id_barang']);
        $data = $abc->tampil_data($id_barang);
        $xml = "<toko>";
        $xml .= "<barang>";
        $xml .= "<id_barang>" . $data['id_barang'] . "</id_barang>";
        $xml .= "<nama_barang>" . $data['nama_barang'] . "</nama_barang>";
        $xml .= "</barang>";
        $xml .= "</toko>";
        echo $xml;
    } else {
        $data = $abc->tampil_semua_data();
        $xml = "<toko>";
        foreach ($data as $a) {
            $xml .= "<barang>";
            foreach ($a as $kolom => $value) {
                $xml .= "<$kolom>" . htmlspecialchars($value) . "</$kolom>";
            }
            $xml .= "</barang>";
        }
        $xml .= "</toko>";
        echo $xml;
    }
    unset($id_barang, $data, $xml);
}
?>