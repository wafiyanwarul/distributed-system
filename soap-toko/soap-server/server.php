<?php
error_reporting(1); // error ditampilkan

include "Database.php";

$uri = 'http://192.168.56.22';

// set uri server
$options = array('uri'=>$uri);

// buat objek baru dari class SOAP Server
$server = new SoapServer(NULL, $options);

// masukkan class Database ke objek SOAP Server
$server->setClass('Database');

// jalankan menggunakan SOAP Requests handler
$server->handle();
?>