<?php
include '../db.php'; // Menghubungkan ke database

// Ambil data rental
$result = $conn->query("SELECT * FROM rentals");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sewa</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Daftar Sewa</h1>
            <a href="add.php" class="btn btn-add">Tambah Sewa</a>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>ID Rental</th>
                        <th>ID Mobil</th>
                        <th>ID Anggota</th>
                        <th>Tanggal Sewa</th>
                        <th>Tanggal Kembali</th>
                        <th>Biaya Sewa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['rental_id']; ?></td>
                            <td><?= $row['car_id']; ?></td>
                            <td><?= $row['customer_id']; ?></td>
                            <td><?= $row['rental_date']; ?></td>
                            <td><?= $row['return_date']; ?></td>
                            <td><?= $row['total_price']; ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['rental_id']; ?>" class="btn btn-edit">Edit</a>
                                <a href="delete.php?id=<?= $row['rental_id']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
