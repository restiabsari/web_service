<?php
include '../db.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];

    $sql = "INSERT INTO employees (name, email, phone, position) VALUES ('$name', '$email', '$phone', '$position')";
    
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
    <title>Tambah Karyawan</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Tambah Karyawan</h1>
            <a href="index.php" class="btn btn-back">Kembali</a>
        </header>
        <main>
            <form method="POST">
                <label for="name">Nama:</label>
                <input type="text" name="name" id="name" required>
                
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                
                <label for="phone">Telepon:</label>
                <input type="text" name="phone" id="phone" required>
                
                <label for="position">Jabatan:</label>
                <input type="text" name="position" id="position" required>
                
                <button type="submit" class="btn btn-submit">Simpan</button>
            </form>
        </main>
    </div>
</body>
</html>
