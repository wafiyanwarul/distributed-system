<?php 
error_reporting(1); // error ditampilkan
class Client
{
    private $api;
    // function yang pertama kali diload saat class dipanggil
    public function __construct($url)
    {
        // buat objek baru dari class SOAP Client
        $this->api = new SoapClient($url);
        unset($url);
    }

    public function tampil_semua_data()
    {
        // memanggil metho/fungsi yang ada di server dan dimasukkan ke variabel $data
        $data = $this->api->tampil_semua_data();
        // mengembalikan data
        return $data;
        // menghapus variabel dari memory
        unset($data);
    }

    public function tampil_data($no_pesanan)
    {
        $data = $this->api->tampil_data($no_pesanan);
        return $data;
        unset($no_pesanan, $data);
    }

    public function tambah_data($data)
    {
        $this->api->tambah_data($data);
        unset($data);
    }

    public function ubah_data($data)
    {
        $this->api->ubah_data($data);
        unset($data);
    }

    public function hapus_data($no_pesanan)
    {
        $this->api->hapus_data($no_pesanan);
        unset($no_pesanan);
    }

    // function yang terakhir kali diload saat class dipanggil
    public function __destruct()
    {
        // menghapus variabel $api dari memory
        unset($this->api);
    }
}

$url = "http://192.168.56.22/wsdl-restoran/server/server.php?wsdl";

// buat objek baru dari class Client
$abc = new Client($url);
?>