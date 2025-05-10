<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form id="registrationForm" method="post">
        <h2>Register</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        
        <button type="submit">Register</button>
    </form>

    <article id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Error</h2>
            <p id="errorMessage"></p>
            <button class="modal-btn">OK</button>
        </div>
    </article>

    <article id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Success!</h2>
            <p>Registration completed successfully.</p>
            <button class="modal-btn">OK</button>
        </div>
    </article>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = " accounts";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            echo "<script>showError('Database connection failed');</script>";
        } else {
            $user_name = $_POST["username"];
            $email = $_POST["email"];
            $pw = $_POST["password"];
            $conf_pw = $_POST["confirm_password"];

            if ($pw != $conf_pw) {
                echo "<script>showError('Passwords do not match!');</script>";
            } else {
                $sql = "INSERT INTO user_info (username, email, password, conf_password)
                        VALUES('$user_name', '$email', '$pw', '$conf_pw')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            showSuccess();
                        });
                    </script>";
                } else {
                    echo "<script>showError('Registration failed');</script>";
                }
            }
            $conn->close();
        }

        
    }
    ?>

    <script src="script.js"></script>
</body>
</html>