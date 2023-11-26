<?php
require 'function.php';
if (isset($_SESSION["id"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Include your custom styles if needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        function submitData() {
            $(document).ready(function () {
                var data = {
                    name: $("#name").val(),
                    username: $("#username").val(),
                    password: $("#password").val(),
                    action: $("#action").val(),
                };

                $.ajax({
                    url: 'function.php',
                    type: 'post',
                    data: data,
                    success: function (response) {
                        alert(response.trim());
                        if (response.trim() === "Registration Successful") {
                            window.location.href = 'login.php';
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                    }
                });
            });
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2>Register</h2>
        <form autocomplete="off" action="" method="post">
            <input type="hidden" id="action" value="register">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" class="form-control" required>
            </div>
            <!-- Add the register-button class to the button for Bootstrap styling -->
            <button type="button" class="btn btn-primary register-button" onclick="submitData();">Register</button>
        </form>
        <br>
        <a href="login.php" class="btn btn-secondary back-button">Go to Login</a>
        <?php require 'script.php'; ?>
    </div>
</body>
</html>
