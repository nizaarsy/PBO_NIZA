<?php
require_once 'Customer.php';

class CustomerManager {
    private $file = 'customer.json';

    public function __construct() {
        // Membuat file JSON jika belum ada
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
    }

    // Membaca data dari file JSON
    private function readData() {
        $data = file_get_contents($this->file);
        return json_decode($data, true) ?? [];
    }

    // Menulis data ke file JSON
    private function writeData($data) {
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT));
    }

    // Tambah customer baru
    public function tambahCustomer($nama, $email, $alamat) {
        $customers = $this->readData();
        $id = count($customers) > 0 ? end($customers)['id'] + 1 : 1; // Mengatur ID otomatis
        $customers[] = [
            'id' => $id,
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
        ];
        $this->writeData($customers);
    }

    // Hapus customer berdasarkan ID
    public function hapusCustomer($id) {
        $customers = $this->readData();
        $customers = array_filter($customers, function ($customer) use ($id) {
            return $customer['id'] != $id;
        });
        $this->writeData(array_values($customers)); // Reindex array
    }

    // Ambil semua data customer
    public function getCustomers() {
        return $this->readData();
    }
}
?>
