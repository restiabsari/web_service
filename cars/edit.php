<?php
include '../db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM cars WHERE car_id = $id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $status = $_POST['status'];
    $price_per_day = $_POST['price_per_day'];

    $sql = "UPDATE cars 
            SET brand='$brand', model='$model', year='$year', status='$status', price_per_day='$price_per_day' 
            WHERE car_id=$id";
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
    <title>Edit Mobil</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Edit Mobil</h1>
            <a href="index.php" class="btn btn-back">Kembali</a>
        </header>
        <main>
            <form method="POST" class="form">
                <label for="brand">Merek:</label>
                <input type="text" id="brand" name="brand" value="<?= $data['brand']; ?>" required>

                <label for="model">Model:</label>
                <input type="text" id="model" name="model" value="<?= $data['model']; ?>" required>

                <label for="year">Tahun:</label>
                <input type="number" id="year" name="year" value="<?= $data['year']; ?>" required>

                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Available" <?= $data['status'] == 'Available' ? 'selected' : ''; ?>>Tersedia</option>
                    <option value="Rented" <?= $data['status'] == 'Rented' ? 'selected' : ''; ?>>Disewa</option>
                </select>

                <label for="price_per_day">Harga per Hari:</label>
                <input type="number" id="price_per_day" name="price_per_day" value="<?= $data['price_per_day']; ?>" required>

                <button type="submit" class="btn btn-submit">Simpan</button>
            </form>
        </main>
    </div>
</body>
</html>
