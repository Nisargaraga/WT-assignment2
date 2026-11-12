<?php
$submitted = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $dob = $_POST["dob"] ?? "";
    $gender = $_POST["gender"] ?? "";
    $course = $_POST["course"] ?? "";
    $qualification = $_POST["qualification"] ?? "";
    $address = trim($_POST["address"] ?? "");

    if (
        $name == "" || !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        !preg_match("/^[0-9]{10}$/", $phone) ||
        $dob == "" || $gender == "" || $course == "" ||
        $qualification == "" || $address == ""
    ) {
        $error = "Please enter valid information in all fields.";
    } else {
        $submitted = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>EDUCONNECT</h1>
    <p>Student Application & Registration Portal</p>
</header>

<?php if ($submitted): ?>

<section class="success-page">
    <div class="success-icon">✓</div>
    <h2>Application Submitted Successfully!</h2>
    <p>Your registration details have been received.</p>

    <div class="details">
        <h3>Application Details</h3>

        <p><strong>Student Name:</strong> <?php echo htmlspecialchars($name); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($dob); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
        <p><strong>Course:</strong> <?php echo htmlspecialchars($course); ?></p>
        <p><strong>Qualification:</strong> <?php echo htmlspecialchars($qualification); ?></p>
        <p><strong>Address:</strong> <?php echo nl2br(htmlspecialchars($address)); ?></p>
    </div>

    <button onclick="window.print()">Print Application</button>
    <a href="index.php" class="back-btn">New Registration</a>
</section>

<?php else: ?>

<main>
    <section class="form-card">
        <div class="form-heading">
            <span>ADMISSIONS 2026</span>
            <h2>Student Registration</h2>
            <p>Fill in your details to complete your application.</p>
        </div>

        <?php if ($error != ""): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="POST" id="registrationForm">

            <h3>Personal Information</h3>

            <div class="form-grid">
                <div>
                    <label>Full Name</label>
                    <input type="text" name="name" placeholder="Enter full name" required>
                </div>

                <div>
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="example@gmail.com" required>
                </div>

                <div>
                    <label>Phone Number</label>
                    <input type="text" name="phone" placeholder="10-digit mobile number" required>
                </div>

                <div>
                    <label>Date of Birth</label>
                    <input type="date" name="dob" required>
                </div>

                <div>
                    <label>Gender</label>
                    <select name="gender" required>
                        <option value="">Select Gender</option>
                        <option>Female</option>
                        <option>Male</option>
                        <option>Other</option>
                    </select>
                </div>

                <div>
                    <label>Highest Qualification</label>
                    <select name="qualification" required>
                        <option value="">Select Qualification</option>
                        <option>PUC / 12th</option>
                        <option>Diploma</option>
                        <option>Undergraduate</option>
                        <option>Postgraduate</option>
                    </select>
                </div>
            </div>

            <h3>Academic Information</h3>

            <label>Choose Course</label>
            <select name="course" required>
                <option value="">Select Course</option>
                <option>B.Tech Computer Science</option>
                <option>B.Tech Information Science</option>
                <option>BBA</option>
                <option>BCA</option>
                <option>MBA</option>
            </select>

            <label>Residential Address</label>
            <textarea name="address" placeholder="Enter your complete address" required></textarea>

            <button type="submit">Submit Application →</button>

            <p class="note">Please verify your details before submitting.</p>

        </form>
    </section>
</main>

<?php endif; ?>

<footer>
    <p>© 2026 EduConnect | Student Registration Portal</p>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="script.js"></script>

</body>
</html>