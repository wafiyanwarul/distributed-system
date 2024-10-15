<?php
error_reporting(1); // error ditampilkan
class Client
{
    private $options, $api;

    // function yang pertama kali diload saat class dipanggil
    public function __construct($uri, $location)
    {
        $this->options = array('location' => $location, 'uri' => $uri);
        
        // buat objek baru dari class SOAP Client
        $this->api = new SoapClient(NULL, $this->options);
        
        // menghapus variabel dari memory
        unset($uri, $location);
    }

    // function untuk menghapus selain huruf dan angka
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }

    public function tampil_semua_data()
    {
        $data = $this->api->tampil_semua_data();
        return $data;
        unset($data);
    }

    public function tampil_data($id_barang)
    {
        $id_barang = $this->filter($id_barang);
        $data = $this->api->tampil_data($id_barang);
        return $data;
        unset($id_barang, $data);
    }

    public function tambah_data($data)
    {
        try {
            $this->api->tambah_data($data);
        unset($data);
        } catch (Exception $e) {
            echo "Error : ".$e->getMessage(); 
        }
    }

    public function ubah_data($data)
    {
        $this->api->ubah_data($data);
        unset($data);
    }

    public function hapus_data($id_barang)
    {
        $this->api->hapus_data($id_barang);
        unset($id_barang);
    }

    // function yang terakhir kali diload saat class dipanggil
    public function __destruct()
    {
        // hapus variable dari memory
        unset($this->options, $this->api);
    }
}

// uri dan location server
$uri = 'http://192.168.56.22';
$location = $uri.'/soap-toko/soap-server/server.php';

// buat objek baru dari class Client
$abc = new Client($uri, $location);
?>