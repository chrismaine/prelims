<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $appointment_id = $_GET["id"];

    $sql = "DELETE FROM appointment WHERE id = $appointment_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../appointment.php");
        exit;
    } else {
        echo "Error deleting appointment: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

?>
