<?php
session_start(); // Start the session to access session variables
include 'dbinfo.php'; // this is the database connection

// Get the username from the GET request
$inputUsername = isset($_GET['username']) ? $_GET['username'] : '';

// Sanitize the username
$inputUsername = mysqli_real_escape_string($conn, $inputUsername);

$sql = "SELECT * FROM TBLinfo WHERE username = '$inputUsername'"; // Adjust the query to filter by username
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='user-info'>";
        echo "<p><strong>Username:</strong> " . htmlspecialchars($row['username']) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
        echo "<p><strong>Password:</strong> " . htmlspecialchars($row['pass']) . "</p>";
        echo "<p><strong>Age:</strong> " . htmlspecialchars($row['age']) . "</p>";
        echo "<p><strong>YearLevel:</strong> " . htmlspecialchars($row['YearLevel']) . "</p>";
        echo "<p><strong>StudentNumber:</strong> " . htmlspecialchars($row['StudentNumber']) . "</p>";
        echo "</div><hr>";
    }
} else {
    echo "No data found.";
}

mysqli_close($conn);
?>
