<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Extract form data
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $slots = $_POST['slots'];

    // Prepare SQL statement
    $sql = "INSERT INTO appointment (date, start_time, end_time, slots) VALUES ('$date', '$start_time', '$end_time', $slots)";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        header("Location: ../appointment.php");
        exit;
    } else {
        echo "Error adding appointment: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

?>
