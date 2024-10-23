<?php
session_start(); // Start the session to access session variables

include 'dbinfo.php'; // this is the database connection

// Get the username from the session
$loggedInUsername = isset($_SESSION['username']) ? $_SESSION['username'] : null; // Get the username from session

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="info.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

         // This Code is to implement the data inside database which means if na click ni User yung Button ng show the Data from Database ay mag didisplay thru container
        // Once the user are click the button will disable to click it again  

        $(document).ready(function() {
            let dataShown = false; // Flag to track if data has been shown

            $("#showInfoButton").click(function() {
                if (!dataShown) { // Check if data is not shown yet
                    $.ajax({
                        url: "fetch_info.php",
                        method: "GET",
                        data: { username: "<?php echo $loggedInUsername; ?>" }, // Send the logged-in username
                        success: function(data) {
                            $("#infoContainer").append(data); // Append the data
                            dataShown = true; // Set the flag to true
                            $("#showInfoButton").prop('disabled', true); // Disable the button
                        }
                    });
                } else {
                    alert("Data has already been shown.");
                }
            });
        });
    </script>
</head>
<body>
<nav class="navbar" id="navbar">
    <a href="Login.php"><b>Login</b></a>
    <a href="index.php" id="features"><b>Home</b></a>
</nav>

<div class="container">
    <h1>User Information</h1>
    <button id="showInfoButton" style="background-color: #007bff; color: white; padding: 15px 30px; border: none; border-radius: 5px; cursor: pointer;">Show Info</button>
    <a href="downloadFile.php">Download Info</a>

    <div id="infoContainer"></div>
</div>
<script src="scripts.js"></script>

</body>
</html>
