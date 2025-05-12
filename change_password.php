<?php
session_start();
if (!isset($_SESSION['reset_email']) || !isset($_SESSION['reset_code'])) {
    header("Location: forgot_password.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pw = $_POST["password"];
    $conf_pw = $_POST["confirm_password"];

    if ($pw != $conf_pw) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showError('Passwords do not match!');
                });
            </script>";
    } else {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = " accounts";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            echo "<script>showError('Database connection failed');</script>";
        } else {
            $email = $_SESSION['reset_email'];

            $stmt = $conn->prepare("UPDATE user_info SET password=?, conf_password=? WHERE email=?");
            $stmt->bind_param("sss", $pw, $pw, $email);

            
            if ($stmt->execute()) {
                session_destroy();
                $stmt->close();
                $conn->close();
                header("Location: login.php");
                exit;
            } else {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showError('Failed to update password!');
                });
            </script>";
            }

            $stmt->close();
            $conn->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <main class="fullscreen-container">
        <!-- FORM ON THE LEFT -->
        <section class="form-panel">
            <form id="registrationForm" method="post">
                <h2>Change Password</h2>
                
                <p class="divider">Or use your email to log in</p>
                
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                
                <div class="form-group">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="primary-btn">Reset</button>
            </form>
        </section>

        <section class="welcome-panel">
            <span class="welcome-content">
                <h1>Welcome Back!</h1>
                <p>We're happy to see you again. Let's get you signed in. Put vector here.</p>
            </span>
        </section>
    </main>
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
    <script src="script.js"></script>

</body>
</html>