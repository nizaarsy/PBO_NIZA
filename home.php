<?php
// Logika PHP untuk menampilkan produk dari database atau array
$produk = [
    ['id' => 1, 'nama' => 'Blazer', 'harga' => 350000, 'gambar' => 'assets/Blazer.jpg'],
    ['id' => 2, 'nama' => 'Cardigan', 'harga' => 200000, 'gambar' => 'assets/Cardigan.jpg'],
    ['id' => 3, 'nama' => 'Kemeja Wanita', 'harga' => 150000, 'gambar' => 'assets/Kemeja Wanita.jpg'],
    ['id' => 4, 'nama' => 'Sweater', 'harga' => 180000, 'gambar' => 'assets/Sweater.jpg'],
    ['id' => 5, 'nama' => 'Turtleneck', 'harga' => 120000, 'gambar' => 'assets/Turtleneck.jpg'],
    ['id' => 6, 'nama' => 'Cargo', 'harga' => 100000, 'gambar' => 'assets/Cargo.jpg'],
    ['id' => 7, 'nama' => 'Celana Corduroy', 'harga' => 120000, 'gambar' => 'assets/Celana Corduroy.jpg'],
    ['id' => 8, 'nama' => 'Celana Kulot', 'harga' => 110000, 'gambar' => 'assets/Celana Kulot.jpg'],
    ['id' => 9, 'nama' => 'Jogger Pants', 'harga' => 95000, 'gambar' => 'assets/Jogger Pants.jpg'],
    ['id' => 10, 'nama' => 'Rok', 'harga' => 150000, 'gambar' => 'assets/Rok.jpg'],
    ['id' => 11, 'nama' => 'Henley Shirt', 'harga' => 85000, 'gambar' => 'assets/Henley Shirt.jpg'],
    ['id' => 12, 'nama' => 'Jas', 'harga' => 300000, 'gambar' => 'assets/Jas.jpg'],
    ['id' => 13, 'nama' => 'Kaos Oblong', 'harga' => 50000, 'gambar' => 'assets/Kaos Oblong.jpg'],
    ['id' => 14, 'nama' => 'Kemeja Pria', 'harga' => 120000, 'gambar' => 'assets/Kemeja Pria.jpg'],
    ['id' => 15, 'nama' => 'Polo Shirt', 'harga' => 85000, 'gambar' => 'assets/Polo Shirt.jpg'],
    ['id' => 16, 'nama' => 'Cargo Pria', 'harga' => 120000, 'gambar' => 'assets/Cargo Pria.jpg'],
    ['id' => 17, 'nama' => 'Celana Chino', 'harga' => 150000, 'gambar' => 'assets/Celana Chino.jpg'],
    ['id' => 18, 'nama' => 'Celana Formal', 'harga' => 200000, 'gambar' => 'assets/Celana Formal.jpg'],
    ['id' => 19, 'nama' => 'Celana Jeans', 'harga' => 180000, 'gambar' => 'assets/Celana Jeans.jpg'],
    ['id' => 20, 'nama' => 'Celana Pendek', 'harga' => 100000, 'gambar' => 'assets/Celana Pendek.jpg'],
];

// Logika pencarian
if (isset($_GET['search'])) {
    $keyword = strtolower(trim($_GET['search']));
    $produk = array_filter($produk, function($item) use ($keyword) {
        return strpos(strtolower($item['nama']), $keyword) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outfitmu</title>
    <link rel="stylesheet" href="styc.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <h2>Outfitmu</h2>
        </div>
        <div class="search-bar">
            <form action="" method="GET">
                <input type="text" name="search" placeholder="Cari produk..." id="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                <button type="submit">Search</button>
            </form>
        </div>
        
    </div>

    <!-- Container -->
    <div class="container">
        <h1>Produk Terbaru</h1>

        <center> <div class="home-button">
            <a href="index.php" class="btn btn-home">Lihat Stok Barang</a>
            <a href="viewCustomer.php" class="btn btn-stok">Costumer</a>
        </div> </center>
        <br><br>

        <div class="products">
            <?php if (count($produk) > 0): ?>
                <?php foreach ($produk as $item): ?>
                    <div class="product-card">
                        <img src="<?= $item['gambar'] ?>" alt="<?= $item['nama'] ?>" style="width:200px; height:200px;">
                        <div class="product-info">
                            <h3><?= $item['nama'] ?></h3>
                            <p>Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
                            <button class="btn btn-add-to-cart">Lihat</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Produk tidak ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
