<?php
require_once 'CustomerManager.php';

$customerManager = new CustomerManager();

// Menangani form tambah customer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $customerManager->tambahCustomer($nama, $email, $alamat);
    header('Location: viewCustomer.php'); // Redirect untuk mencegah resubmission
}

// Menangani penghapusan customer
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $customerManager->hapusCustomer($id);
    header('Location: viewCustomer.php'); // Redirect setelah penghapusan
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Customer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Manajemen Customer</h1>

    <!-- Form Tambah Customer -->
    <form method="POST" action="">
        <div>
            <label for="nama">Nama Customer:</label><br>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div>
            <label for="email">Email Customer:</label><br>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="alamat">Alamat Customer:</label><br>
            <input type="text" id="alamat" name="alamat" required>
        </div>
        <button type="submit" name="tambah" class="btn btn-add">Tambah Customer</button>
    </form>

    <!-- Tabel Data Customer -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customerManager->getCustomers() as $customer): ?>
                <tr>
                    <td><?= $customer['id'] ?></td>
                    <td><?= $customer['nama'] ?></td>
                    <td><?= $customer['email'] ?></td>
                    <td><?= $customer['alamat'] ?></td>
                    <td>
                        <a href="?hapus=<?= $customer['id'] ?>" class="btn btn-delete">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="button-container">
        <a href="home.php" class="btn">Kembali ke Home</a>
    </div>
</div>
</body>
</html>
