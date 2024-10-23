<?php
include 'dbinfo.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']); // No need to filter the password
    $age = filter_var(trim($_POST['age']), FILTER_SANITIZE_NUMBER_INT);
    $yearLevel = filter_var(trim($_POST['YearLevel']), FILTER_SANITIZE_STRING);
    $studentNumber = filter_var(trim($_POST['StudentNumber']), FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Validate other fields
    if (empty($username) || empty($password) || empty($age) || empty($yearLevel) || empty($studentNumber)) {
        echo "All fields are required.";
        exit;
    }

    // Now you can prepare and execute your database insert statement
    // Use prepared statements to protect against SQL injection

    $stmt = $conn->prepare("INSERT INTO TBLinfo (username, email, pass, age, YearLevel, StudentNumber) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $username, $email, $password, $age, $yearLevel, $studentNumber);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
