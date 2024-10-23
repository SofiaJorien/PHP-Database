<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Mitr' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Matemasie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="registration.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#StudentNumber, #age").on("input", function() {
                this.value = this.value.replace(/[^0-9]/g, ''); // This function is accept numbers only and vina validate niya if yung iniinput ni user is number or letter and if ever kung letter naman ay hinde ididisplay during input
            });

            // This is for handling the registration form submission para adopt ang ininput na info ni user papunta kay Database 
            $("#registrationForm").on("submit", function(event) {
                event.preventDefault(); // Prevent default form submission

                $.ajax({
                    type: "POST",
                    url: "register_user.php",
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response); // Display the response message which means ang ininput na information ni user ay naka save na sa Database
                    }
                });
            });

            // This is for handling the login button click
            $("#loginButton").on("click", function(event) {
                event.preventDefault(); // Prevent default button action 

                // This condition ay ichecheck niya if yung all information are already fill up 
                if ($("#username").val() && $("#email").val() && $("#password").val() && $("#age").val() && $("#YearLevel").val() && $("#StudentNumber").val()) {
                    window.location.href = "login.php"; // Redirect to login.php
                } else {
                    alert("Please fill in all fields before logging in.");
                }
            });
        });
    </script>
    <title>Registration</title>
</head>
<body>
<h1>Registration Form</h1>
<div class="container">
    <form id="registrationForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        <br>
        <label for="YearLevel">YearLevel:</label>
        <input type="text" id="YearLevel" name="YearLevel" required>
        <br>
        <label for="StudentNumber">StudentNumber:</label>
        <input type="text" id="StudentNumber" name="StudentNumber" required>
        <br>
        
        <input type="submit" value="Register">
        <input type="button" id="loginButton" value="Login"> <!-- Changed to input type="button" -->
    </form>
</div>
<script src="scripts.js"></script>
</body>
</html>
