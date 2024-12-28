<?php
include '../db.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loan_id = $_POST['loan_id'];
    $payment_date = $_POST['payment_date'];
    $payment_amount = $_POST['payment_amount'];
    $payment_status = $_POST['payment_status'];

    $sql = "INSERT INTO payments (loan_id, payment_date, payment_amount, payment_status) 
            VALUES ('$loan_id', '$payment_date', '$payment_amount', '$payment_status')";
    
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
    <title>Tambah Pembayaran</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Tambah Pembayaran</h1>
            <a href="index.php" class="btn btn-back">Kembali</a>
        </header>
        <main>
            <form method="POST">
                <label for="loan_id">ID Peminjaman:</label>
                <input type="text" name="loan_id" id="loan_id" required>
                
                <label for="payment_date">Tanggal Pembayaran:</label>
                <input type="date" name="payment_date" id="payment_date" required>
                
                <label for="payment_amount">Jumlah Pembayaran:</label>
                <input type="number" name="payment_amount" id="payment_amount" required>
                
                <label for="payment_status">Status Pembayaran:</label>
                <select name="payment_status" id="payment_status" required>
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                </select>
                
                <button type="submit" class="btn btn-submit">Simpan</button>
            </form>
        </main>
    </div>
</body>
</html>
