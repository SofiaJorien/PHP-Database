<?php
session_start();

// dbinfo.php connection code
include 'dbinfo.php'; // this is the database connection

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Establish a connection using mysqli
    $conn = mysqli_connect("localhost", "root", "", "dbsamp");

    // This part will the Check the database if connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape user inputs to prevent SQL injection
    // We Decide to use this  function to ensures that special characters in a string are properly escaped, making the string safe to use in an SQL statement.
    $inputUsername = mysqli_real_escape_string($conn, $inputUsername);
    $inputPassword = mysqli_real_escape_string($conn, $inputPassword);

    // This is the mysql query command to call out the username and passwords from the database
    $sql = "SELECT * FROM TBLinfo WHERE username = '$inputUsername' AND pass = '$inputPassword'";

    // So this is the query na mag iintegrate sa Select query of mysql 
    $result = mysqli_query($conn, $sql);

    // In this part naman ay idodouble check niya yung username and password kung nakalagay rin ba siya sa database 
    if (mysqli_num_rows($result) > 0) {

        $_SESSION['username'] = $inputUsername;
        // This part ay ipupunta niya from login.php to index.php to show the design or look ng index.php 
        header("Location: index.php");
        exit();
    } else {
        // This part naman ay mag p'pop up itong error message if the username and password are incorrect at hinde match sa records ng Database 
        $errorMessage = "Your username and password are incorrect.";
    }

    // This part will Close the connection 
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>



<div id="login-overlay" class="login-overlay">
    <div class="login-form">
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="">
           
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <!-- In this part he will display the error message if ever the user input is incorrect  -->
            <?php if (!empty($errorMessage)): ?>
            <div id="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

            <div class="button-container">
                <button type="submit">Login</button>
                <button type="button" onclick="window.location.href='registration.php';">Register</button> <!-- Changed to type="button" -->
            </div>
        </form>
    </div>
</div>

<script src="scripts.js"></script>

</body>
</html>
