<?php
include 'db.php';

$id = $_GET['id'];

if (isset($id)) {
    $sql = "DELETE FROM bookings WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Delete failed: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
