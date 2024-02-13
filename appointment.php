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

    th, td {
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
<h1> Appointment </h1>

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
                <!-- Input fields -->
            </tr>
            <!-- Existing appointments fetched from the database -->
            <?php
            // PHP code to fetch and display existing appointments
            ?>
        </tbody>
    </table>
</form>

<!-- Footer -->
<?php include 'footer.php'; ?>
</body>

</html>
