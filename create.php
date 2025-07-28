<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>New Flight Booking</h2>
<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['passenger_name'];
    $from = $_POST['from_city'];
    $to = $_POST['to_city'];
    $date = $_POST['travel_date'];
    $code = $_POST['flight_code'];

    if ($name && $from && $to && $date && $code) {
        $sql = "INSERT INTO bookings (passenger_name, from_city, to_city, travel_date, flight_code)
                VALUES ('$name', '$from', '$to', '$date', '$code')";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            $error = "Database error: " . $conn->error;
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<form method="post">
    Passenger Name: <input type="text" name="passenger_name" required><br>
    From City: <input type="text" name="from_city" required><br>
    To City: <input type="text" name="to_city" required><br>
    Travel Date: <input type="date" name="travel_date" required><br>
    Flight Code: <input type="text" name="flight_code" required><br>
    <input type="submit" value="Book Flight">
</form>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
<p><a href="index.php">← Back to List</a></p>

</body>
</html>
