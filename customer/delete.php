<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM customers WHERE customer_id = $id";

if ($conn->query($sql)) {
    header('Location: index.php');
} else {
    echo "Error: " . $conn->error;
}
?>
