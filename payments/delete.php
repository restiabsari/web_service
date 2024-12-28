<?php
include '../db.php'; // Menghubungkan ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM payments WHERE payment_id = $id";
    
    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
