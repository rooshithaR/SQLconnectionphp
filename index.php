<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Air Ticket Booking System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Air Ticket Bookings</h2>
    <p><a href="create.php">+ Add New Booking</a></p>

    <table>
        <tr>
            <th>ID</th>
            <th>Passenger</th>
            <th>From</th>
            <th>To</th>
            <th>Date</th>
            <th>Flight</th>
            <th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM bookings ORDER BY travel_date ASC");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['passenger_name']}</td>
                <td>{$row['from_city']}</td>
                <td>{$row['to_city']}</td>
                <td>{$row['travel_date']}</td>
                <td>{$row['flight_code']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> | 
                    <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure to delete?');\">Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
