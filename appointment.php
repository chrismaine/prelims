<?php
// Include the template content
ob_start();
require_once 'config/db.php';
include('template.php');
$templateContent = ob_get_clean();

// Echo the entire HTML content of the template
echo $templateContent;
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Appointment</h1>

    <!-- Appointment form and table -->
    <form action="config/appoint.php" method="post">
        <table>
            <!-- Table header -->
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Slots</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <!-- Table body -->
            <tbody>
                <!-- Form fields for new appointment -->
                <tr>
                    <td><input type="date" name="date"></td>
                    <td><input type="time" name="start_time"></td>
                    <td><input type="time" name="end_time"></td>
                    <td><input type="number" name="slots"></td>
                    <td><button type="submit">Add Appointment</button></td>
                </tr>
                <!-- Existing appointments fetched from the database -->
                <?php
                $sql = "SELECT * FROM appointment";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["date"] . "</td>
                            <td>" . $row["start_time"] . "</td>
                            <td>" . $row["end_time"] . "</td>
                            <td>" . $row["slots"] . "</td>
                            <td><a href='config/delete_appointment.php?id=" . $row["id"] . "'>Delete</a></td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No appointments found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </form>

    <!-- Footer -->
</body>

</html>
