<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customers (name, phone, email, address) VALUES ('$name', '$phone', '$email', '$address')";
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
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Tambah Pelanggan</h1>
            <a href="index.php" class="btn btn-back">Kembali</a>
        </header>
        <main>
            <form method="POST" class="form">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama pelanggan" required>

                <label for="phone">Telepon:</label>
                <input type="text" id="phone" name="phone" placeholder="Masukkan nomor telepon" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email pelanggan" required>

                <label for="address">Alamat:</label>
                <textarea id="address" name="address" placeholder="Masukkan alamat pelanggan" required></textarea>

                <button type="submit" class="btn btn-submit">Simpan</button>
            </form>
        </main>
    </div>
</body>
</html>
