<?php 
require_once 'config/db.php'; // Include the database connection file

include 'header.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.js"></script>
    <style>
        .enrollment-container {
            max-width: 5400px;
            margin: auto;
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
        }

        .enrollment-title {
            color: #007bff;
        }

        .enrollment-section {
            margin-bottom: 20px;
        }

        /* Apply styles to the form elements */
        .enrollment-container label {
            font-weight: bold;
        }

        .enrollment-container input,
        .enrollment-container select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        /* Apply styles to the checkbox */
        .enrollment-container .form-check-input {
            margin-right: 5px;
        }

        /* Apply styles to the submit button */
        .enrollment-button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .input-container {
            display: flex;
            align-items: center;
        }

        .input-container input {
            margin-right: 5px; /* Adjust the spacing between the input fields */
        }
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
    <title>Enrollment Form</title>
</head>

<body>
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
        <tbody>
            <?php
            // Fetch appointments from the database
            $sql = "SELECT * FROM appointment";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["start_time"] . "</td>";
                    echo "<td>" . $row["end_time"] . "</td>";
                    echo "<td>" . $row["slots"] . "</td>";
                    echo "<td><a href='config/delete_appointment.php?id=" . $row["id"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No appointment found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <div class="enrollment-container">
        <div class="enrollment-section">
            <form method="post" action="config/enroll.php">
                <div class="enrollment-section">
                    <!-- Section I: Create your Student Portal Account -->
                    <div class="mb-3">
                        <p><b>I. Create your Student Portal Account</b></p>
                        <label for="username">Username:</label>
                        <br>
                        <div class="input-container">
                            <input type="text" name="username" placeholder="Username" required>
                            <input type="text" name="sformat" value="@student" readonly>
                        </div>

                        <label for="password">Password:</label>
                        <br>
                        <input type="password" name="password" placeholder="Password" required><br>

                        <label for="email">Email Address</label>
                        <br>
                        <input type="email" name="email"placeholder="Email" required><br>

                    </div>
                    <div class="enrollment-section">

                        <!-- Add more fields as needed -->
                        <p><b>II. Education</b></p>
                        <label for="elem">Elementary</label>
                        <br>
                        <div class="input-container">
                            <input type="text" name="elementary" placeholder="School Name" required><input type="text" name="egrad" placeholder="Graduation Year"><br>
                        </div>
                        <label for="elem">Junior High School</label>
                        <br>
                        <div class="input-container">
                            <input type="text" name="juniorhigh" placeholder="School Name" required><input type="text" name="hgrad" placeholder ="Graduation Year"><br>
                        </div>
                        <label for="elem">Senior High School</label>
                        <br>
                        <div class="input-container">
                            <input type="text" name="seniorhigh" placeholder="School Name" required><input type="text" name="shgrad" placeholder="Graduation Year"><br>
                        </div>
                    </div>
                    <div class="enrollment-section">
                        <p><b>III. Enrollment Form</b></p>
                        <label for="firstName">First Name:</label><br>
                        <input type="text" id="firstName" name="firstName"placeholder="First Name" required><br>

                        <label for="middle Name">Middle Name:</label><br>
                        <input type="text" id="Middle Name" name="middleName"placeholder="Middle Name" required><br>

                        <label for="lastName">Last Name:</label><br>
                        <input type="text" id="lastName" name="lastName"placeholder="LastName" required><br>

                        <label for="gender">Sex:</label><br>
                        <select id="gender" name="gender" required><br>
                            <option value="choose gender">Choose Gender:</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select><br>

                        <label for="year">Year:</label><br>
                        <select id="courseyear" name="courseyear" required><br>
                            <option value="choose year">Choose Year:</option>
                            <option value="1st">1st year</option>
                            <option value="2nd">2nd year</option>
                            <option value="3rd">3rd year</option>
                            <option value="4th">4th year</option>
                        </select><br>

                        <label for="course">Select Course:</label><br>
                        <select id="course" name="course" required><br>
                            <option value="choose course">Choose Course:</option>
                            <option value="BSIT">Bachelor of Science in Information Technology</option>
                            <option value="BSCS">Bachelor of Science in Computer Science</option>
                            <option value="BSCE">Bachelor of Science in Civil Engineering</option>
                        </select><br>


                        <label for="birthday">Birthday:</label><br>
                        <input type="date" id="birthday" name="birthday" required><br>

                        <label for="home address">Home Address:</label><br>
                        <input type="address" name="address"placeholder="Home Address" required><br>


                        <label for="phone number">Phone Number:</label><br>
                        <input type="number" name="phonenumber"placeholder="Phone Number" required><br>


                        <label for="Guardian name">Guardian Name:</label><br>
                        <input type="text" name="guardianname"placeholder="Guardian Name" required><br>  


                        <label for="guardian phone number">Guardian Phone Number:</label><br>
                        <input type="number" name="guardianPhoneNumber"placeholder="Guardian Phone Number" required><br>

                        <label for="guar home addressr">Guardian Home Address:</label><br>
                        <input type="text" name="guardhomeaddress"placeholder="Guardian Home Address" required><br>
                        <!-- Data Privacy Notice -->
                    </div>
                    <div class="enrollment-section">
                        <h1>Data Privacy Notice</h1>

                        <p>Before you submit any personal information to our website, please take a moment to read this data privacy notice. We are committed to protecting your personal information and ensuring that your privacy is respected. We comply with the Data Privacy Act of the Philippines and other applicable data protection laws.</p>

                        <h1>What personal information do we collect?</h1>
                        <p>We may collect personal information such as your name, email address, phone number, and other details that you provide when you fill out a form or interact with our website</p>

                        <h1>How do we use your personal information?</h1>
                        <p>We may use your personal information to provide you with the services or information that you have requested, to respond to your inquiries, and to improve our website and services. We may also use your personal information for other purposes that are compatible with the original purpose of collection or as required by law</p>

                        <h1>Do we share your personal information?</h1>
                        <p>We do not sell, trade, or otherwise transfer your personal information to outside parties unless we provide you with advance notice or as required by law</p>

                        <h1>How do we protect your personal information?</h1>
                        <p>We implement a variety of security measures to protect your personal information from unauthorized access, use, or disclosure. We use industry-standard encryption technology and other reasonable measures to safeguard your personal information</p>

                        <h1>What are your rights?</h1>
                        <p>You have the right to access, correct, and delete your personal information that we have collected. You may also withdraw your consent to our processing of your personal information at any time. To exercise your rights, please contact us using the contact details provided on our website</p>

                        <h1>Changes to this notice</h1>
                        <p>We may update this data privacy notice from time to time. Any changes will be posted on our website, and the revised notice will apply to personal information collected after the date it is posted</p>
                    </div>
                    <div class="enrollment-section">
                        <!-- Terms and Submit Button -->
                        <button type="submit" class="btn btn-primary">Enroll</button>
                    </div>
                </form>
            </div>

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
