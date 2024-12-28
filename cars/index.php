<?php
// Gunakan include dengan path yang benar
include __DIR__ . '/../db.php'; // Jika db.php ada di folder root

// Ambil data mobil
$result = $conn->query("SELECT * FROM cars");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mobil</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Daftar Mobil</h1>
            <a href="add.php" class="btn btn-add">Tambah Mobil</a>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>ID Mobil</th>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Tahun</th>
                        <th>Status</th>
                        <th>Harga per Hari</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['car_id']; ?></td>
                            <td><?= $row['brand']; ?></td>
                            <td><?= $row['model']; ?></td>
                            <td><?= $row['year']; ?></td>
                            <td><?= $row['status']; ?></td>
                            <td><?= $row['price_per_day']; ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['car_id']; ?>" class="btn btn-edit">Edit</a>
                                <a href="delete.php?id=<?= $row['car_id']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
