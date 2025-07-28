<?php include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM bookings WHERE id=$id");

if ($result->num_rows == 0) {
    die("Booking not found.");
}

$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['passenger_name'];
    $from = $_POST['from_city'];
    $to = $_POST['to_city'];
    $date = $_POST['travel_date'];
    $code = $_POST['flight_code'];

    if ($name && $from && $to && $date && $code) {
        $sql = "UPDATE bookings SET 
                passenger_name='$name', 
                from_city='$from', 
                to_city='$to', 
                travel_date='$date', 
                flight_code='$code' 
                WHERE id=$id";

        if ($conn->query($sql)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Update failed: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Flight Booking</h2>

<form method="post">
    Passenger Name: <input type="text" name="passenger_name" value="<?= $row['passenger_name'] ?>" required><br>
    From City: <input type="text" name="from_city" value="<?= $row['from_city'] ?>" required><br>
    To City: <input type="text" name="to_city" value="<?= $row['to_city'] ?>" required><br>
    Travel Date: <input type="date" name="travel_date" value="<?= $row['travel_date'] ?>" required><br>
    Flight Code: <input type="text" name="flight_code" value="<?= $row['flight_code'] ?>" required><br>
    <input type="submit" value="Update Booking">
</form>

<p><a href="index.php">← Back to List</a></p>

</body>
</html>
