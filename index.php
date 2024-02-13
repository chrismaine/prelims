<?php
session_start();
?>


<?php
require_once 'config/db.php';

// Image Slider section
$connImageSlider = connectToDatabase();
$coverImagesQuery = "SELECT picture_path FROM cover";
$coverImagesResult = $connImageSlider->query($coverImagesQuery);

// Cards section
$connCards = connectToDatabase();
$sqlCards = "SELECT image_path, title, caption FROM cards";
$resultCards = $connCards->query($sqlCards);

// Grid section
$connGrid = connectToDatabase();
$sqlGrid = "SELECT * FROM grid_data";
$resultGrid = $connGrid->query($sqlGrid);

// Check if any section has data
if ($coverImagesResult->num_rows > 0 || $resultCards->num_rows > 0 || $resultGrid->num_rows > 0) {
    ?>
    <!-- Your existing HTML and PHP code for the Image Slider, Cards, and Grid sections -->
    <!-- ... -->

<?php
} else {
    // Display global "Under Construction" message
    echo '<div class="alert alert-info mt-3">Under Construction</div>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>

<?php include 'header.php'; ?>

<?php
// Check if error message is set
if(isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger" role="alert">';
    echo $_SESSION['error'];
    echo '</div>';
    unset($_SESSION['error']); // Clear the error message
}
?>

<!-- Image Slider -->
<div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        // Include your database connection file
        

        // Fetch cover images from the database
        $conn = connectToDatabase();
        $coverImagesQuery = "SELECT picture_path FROM cover";
        $coverImagesResult = $conn->query($coverImagesQuery);

        if ($coverImagesResult->num_rows > 0) {
            $active = true; // To set the first image as active

            while ($coverImageRow = $coverImagesResult->fetch_assoc()) {
                $imagePath = $coverImageRow['picture_path'];

                // Check if the file exists
                $imageFullPath = 'photos/' . $imagePath;

                if (file_exists($imageFullPath)) {
                    // Display each cover image as a carousel item
                    echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                    echo '<img src="' . $imageFullPath . '" alt="Cover Image" class="d-block w-100" style="max-height: 650px; object-fit: cover;">';
                    echo '</div>';

                    $active = false; // Set to false after the first iteration
                } else {
                    // Handle the case where the file doesn't exist
                    echo '<div class="alert alert-warning">Image not found: ' . $imageFullPath . '</div>';
                }
            }
        } else {
            // Display a default image or handle accordingly
            echo '<div class="carousel-item active">';
            echo '<img src="default-cover-image.jpg" class="d-block w-100" alt="Default Cover Image">';
            echo '</div>';
        }

        $conn->close();
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<?php
$conn = connectToDatabase();
$sql = "SELECT image_path, title, caption FROM cards";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <!-- Container for cards -->
    <div class="container-fluid card-container mt-0"> <!-- Adjust mt-0 to your preference -->
        <div class="row">
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <!-- Card -->
                <div class="col-md-4 mb-50"> <!-- Add mb-4 to create space between cards -->
                    <div class="card h-100">
                        <!-- Card Image -->
                        <img src="photos/<?php echo $row['image_path']; ?>" alt="Image with Description" class="card-img-top" style="object-fit: cover; height: 200px;"> <!-- Adjust height as needed -->
                        <!-- Card Body -->
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Arial', sans-serif; font-size: 25px; font-weight: bold;"><?php echo $row['title']; ?></h5> <!-- Adjust font style and size as needed -->
                            <p class="card-text"><?php echo $row['caption']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
} else {
    echo 'No data available.';
}
?>


<!-- Container for grid data -->
<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        $conn = connectToDatabase();

        // Retrieve and display the grid data
        $sql = "SELECT * FROM grid_data";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <!-- Grid Data Card -->
                <div class="col">
                    <div class="card h-100" style="background-color: <?php echo $row['background_color']; ?>">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title mb-0" style="font-size: <?php echo $row['size']; ?>mm;"><?php echo $row['title']; ?></h5>
                            <p class="card-text text-center mt-2" style="font-size: <?php echo $row['size']; ?>mm;"><?php echo $row['caption']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No grid data found.";
        }
        ?>
    </div>
</div>

<!-- Footer -->
<footer class="footer bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <img src="assets/img/logo-footer.png" alt="School Logo" width="60" height="60" class="mr-2" style="margin-right: 10px;">
                    <h5 class="mb-0">College University</h5>
                </div>
                <br>
                <h6 class="mb-0">Prelim Exam</h6>
            </div>
            <div class="col-md-6">
                    <div class="text-md-right">
                        <p><i class="fas fa-map-marker-alt mr-2" style="margin-right: 10px;"></i>Sta. Ana, Pampanga</p>
                        <p><i class="fas fa-envelope mr-2" style="margin-right: 10px;"></i>collegeuniversity@gmail.com</p>
                        <p><i class="fas fa-phone mr-2" style="margin-right: 10px;"></i>09123456789</p>
                    </div>
                </div>
            </div>
    </div>
    <hr class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center mb-0">© <?php echo date("Y"); ?> College University. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>




</body>
</html>
<style>
    #imageSlider {
        margin-top: 0px; /* Adjust as needed */
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 20px;
    }

</style>