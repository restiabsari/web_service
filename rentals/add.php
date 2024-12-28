<?php
include '../db.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id'];
    $member_id = $_POST['member_id'];
    $rental_date = $_POST['rental_date'];
    $return_date = $_POST['return_date'];
    $rental_fee = $_POST['rental_fee'];
    $rental_status = $_POST['rental_status'];

    $sql = "INSERT INTO rentals (car_id, member_id, rental_date, return_date, rental_fee, rental_status) 
            VALUES ('$car_id', '$member_id', '$rental_date', '$return_date', '$rental_fee', '$rental_status')";
    
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
    <title>Tambah Sewa</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Tambah Sewa</h1>
            <a href="index.php" class="btn btn-back">Kembali</a>
        </header>
        <main>
            <form method="POST">
                <label for="car_id">ID Mobil:</label>
                <input type="text" name="car_id" id="car_id" required>
                
                <label for="member_id">ID Anggota:</label>
                <input type="text" name="member_id" id="member_id" required>
                
                <label for="rental_date">Tanggal Sewa:</label>
                <input type="date" name="rental_date" id="rental_date" required>
                
                <label for="return_date">Tanggal Kembali:</label>
                <input type="date" name="return_date" id="return_date" required>
                
                <label for="rental_fee">Biaya Sewa:</label>
                <input type="number" name="rental_fee" id="rental_fee" required>
                
                <label for="rental_status">Status Sewa:</label>
                <select name="rental_status" id="rental_status" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Selesai">Selesai</option>
                </select>
                
                <button type="submit" class="btn btn-submit">Simpan</button>
            </form>
        </main>
    </div>
</body>
</html>
