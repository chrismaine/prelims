<?php
require_once 'config/db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login</title>
</head>
<body>

<header class="d-flex justify-content-start align-items-center bg-dark py-4">
    <!-- Logo -->
    <div class="logo">
        <?php
            $conn = connectToDatabase();
            $logoQuery = "SELECT pic FROM logo LIMIT 1"; // Assuming you have only one logo
            $logoResult = $conn->query($logoQuery);

            if ($logoResult->num_rows > 0) {
                $logoRow = $logoResult->fetch_assoc();
                $logoPath = $logoRow['pic'];

                // Display the logo with responsive image class
                echo '<img src="assets/img/' . $logoPath . '" alt="Logo" class="img-fluid">';
            } else {
                // Display a default logo or handle accordingly
                echo '<img src="default-logo.png" alt="Default Logo" class="img-fluid">';
            }

            $conn->close();
        ?>
    </div>

    <!-- Navbar -->
    <nav>
        <div>
            <a href="index.php">Home</a>
            <a href="#">Contact Us</a>
            <a href="enrollment.php">Enroll Now</a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
        </div>
    </nav>
</header>

<style>
    header {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
            padding: 20px;
        }
    /* Change header color on hover */
    header:hover {
        background-color: #333;
    }

    /* Change link color on hover */
    header a:hover {
        color: #ffc107; /* Change to your desired hover color */
    }
</style>




<!-- Rest of your HTML content -->

<!-- Bootstrap JS and Popper.js scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
 

    <!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="config/login.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</html>