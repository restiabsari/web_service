<?php
include '../db.php'; // Menghubungkan ke database

// Ambil data pembayaran
$result = $conn->query("SELECT * FROM payments");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembayaran</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Daftar Pembayaran</h1>
            <a href="add.php" class="btn btn-add">Tambah Pembayaran</a>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>ID Pembayaran</th>
                        <th>ID Peminjaman</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['payment_id']; ?></td>
                            <td><?= $row['rental_id']; ?></td>
                            <td><?= $row['payment_date']; ?></td>
                            <td><?= $row['amount']; ?></td>
                            <td><?= $row['payment_method']; ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['payment_id']; ?>" class="btn btn-edit">Edit</a>
                                <a href="delete.php?id=<?= $row['payment_id']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
