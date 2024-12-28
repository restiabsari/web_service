<?php
include '../db.php'; // Menghubungkan ke database

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM payments WHERE payment_id = $id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loan_id = $_POST['loan_id'];
    $payment_date = $_POST['payment_date'];
    $payment_amount = $_POST['payment_amount'];
    $payment_status = $_POST['payment_status'];

    $sql = "UPDATE payments SET loan_id='$loan_id', payment_date='$payment_date', payment_amount='$payment_amount', payment_status='$payment_status' WHERE payment_id=$id";
    
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
    <title>Edit Pembayaran</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Edit Pembayaran</h1>
            <a href="index.php" class="btn btn-back">Kembali</a>
        </header>
        <main>
            <form method="POST">
                <label for="loan_id">ID Peminjaman:</label>
                <input type="text" name="loan_id" id="loan_id" value="<?= $data['loan_id']; ?>" required>
                
                <label for="payment_date">Tanggal Pembayaran:</label>
                <input type="date" name="payment_date" id="payment_date" value="<?= $data['payment_date']; ?>" required>
                
                <label for="payment_amount">Jumlah Pembayaran:</label>
                <input type="number" name="payment_amount" id="payment_amount" value="<?= $data['payment_amount']; ?>" required>
                
                <label for="payment_status">Status Pembayaran:</label>
                <select name="payment_status" id="payment_status" required>
                    <option value="Lunas" <?= $data['payment_status'] == 'Lunas' ? 'selected' : ''; ?>>Lunas</option>
                    <option value="Belum Lunas" <?= $data['payment_status'] == 'Belum Lunas' ? 'selected' : ''; ?>>Belum Lunas</option>
                </select>
                
                <button type="submit" class="btn btn-submit">Simpan</button>
            </form>
        </main>
    </div>
</body>
</html>
