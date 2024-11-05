<?php
error_reporting(1); // error ditampilkan

class Database
{
    private $host = "192.168.56.22";
    private $dbname = "RESTORAN";
    private $user = "root";
    private $password = "rootpassword";
    private $port = "3306";
    private $conn;

    // function yang pertama kali diload saat class dipanggil
    public function __construct()
    {   // Koneksi Database
        try {
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Koneksi gagal" . $e->getMessage();
        }
    }

    public function tampil_semua_data()
    {
        $query = $this->conn->prepare("SELECT no_pesanan, no_meja, tanggal_pesanan, waktu_pesanan, nama_menu, harga FROM DAFTAR_PESANAN ORDER BY no_pesanan");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        // mengembalikan data
        return $data;
        // hapus variable dari memori
        $query->closeCursor();
        unset($data);
    }

    public function tampil_data($no_pesanan)
    {
        $query = $this->conn->prepare("SELECT no_pesanan, no_meja, tanggal_pesanan, waktu_pesanan, nama_menu, harga FROM DAFTAR_PESANAN WHERE no_pesanan = ?");
        $query->execute(array($no_pesanan));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC);
        // mengembalikan data
        return $data;
        // hapus variabel dari memory
        $query->closeCursor();
        unset($no_pesanan, $data);
    }

    public function tambah_data($data)
    {
        // var_dump($data);
        $query = $this->conn->prepare("INSERT IGNORE INTO DAFTAR_PESANAN (no_pesanan, no_meja, tanggal_pesanan, waktu_pesanan, nama_menu, harga) VALUES (?,?,?,?,?,?)");
        $query->execute(array($data['no_pesanan'], $data['no_meja'], $data['tanggal_pesanan'], $data['waktu_pesanan'], $data['nama_menu'], $data['harga']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_data($data)
    {
        $query = $this->conn->prepare("UPDATE DAFTAR_PESANAN SET no_meja = ?, tanggal_pesanan = ?, waktu_pesanan = ?, nama_menu = ?, harga = ? WHERE no_pesanan = ?");
        $query->execute(array($data['no_meja'], $data['tanggal_pesanan'], $data['waktu_pesanan'], $data['nama_menu'], $data['harga'], $data['no_pesanan']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data($no_pesanan)
    {
        $query = $this->conn->prepare("DELETE FROM DAFTAR_PESANAN WHERE no_pesanan = ?");
        $query->execute(array($no_pesanan));
        $query->closeCursor();
        unset($no_pesanan);
    }
}
