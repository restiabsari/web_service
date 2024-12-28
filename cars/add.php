<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $status = $_POST['status'];
    $price_per_day = $_POST['price_per_day'];

    $sql = "INSERT INTO cars (brand, model, year, status, price_per_day) 
            VALUES ('$brand', '$model', '$year', '$status', '$price_per_day')";
    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Tambah Mobil</h1>
            <a href="index.php" class="btn btn-back">Kembali</a>
        </header>
        <main>
            <form method="POST" class="form">
                <label for="brand">Merek:</label>
                <input type="text" id="brand" name="brand" placeholder="Masukkan merek mobil" required>

                <label for="model">Model:</label>
                <input type="text" id="model" name="model" placeholder="Masukkan model mobil" required>

                <label for="year">Tahun:</label>
                <input type="number" id="year" name="year" placeholder="Masukkan tahun mobil" required>

                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Available">Tersedia</option>
                    <option value="Rented">Disewa</option>
                </select>

                <label for="price_per_day">Harga per Hari:</label>
                <input type="number" id="price_per_day" name="price_per_day" placeholder="Masukkan harga sewa per hari" required>

                <button type="submit" class="btn btn-submit">Simpan</button>
            </form>
        </main>
    </div>
</body>
</html>
