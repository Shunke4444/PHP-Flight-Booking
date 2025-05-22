<?php
session_start();
if (!isset($_SESSION["signup_email"]) || !isset($_SESSION["signup_code"])) {
    header("Location: signUp.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["code"] != $_SESSION["signup_code"]) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showError('Incorrect Code');
            });
        </script>";

        $_SESSION['attempts']++;

        if ($_SESSION['attempts'] >= 5) {
            $_SESSION['TooManyAttempts'] = true;
            header("Location: signUp.php");
            exit;
        }
        exit;
    }
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = " accounts";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "<script>showError('Database connection failed');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO user_info (username, email, password, conf_password)
                        VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", 
            $_SESSION['username'],
            $_SESSION['email'],
            $_SESSION['password'],
            $_SESSION['confirm_password']
        );
        $stmt->execute();
    
        $_SESSION['RegistrationSuccess'] = true;
        header("Location: login.php");
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <main class="fullscreen-container">
        <section class="welcome-panel">
            <span class="welcome-content">
                <h1>New Here?</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, dicta. put vector here</p>
                <!-- <button class="outline-btn">SIGN UP</button> -->
            </span>
        </section>

        <section class="form-panel">
            <form id="registrationForm" method="post">
                <h2>Forgot Password</h2>
                
                <p class="divider">The code has sent to <?php echo $_SESSION['signup_email']; ?></p>
                
                <div class="form-group">
                    <input type="text" id="code" name="code" placeholder="Code" required>
                </div>
                <button type="submit" class="primary-btn">Submit</button>
                <div class="login-prompt">
                    <p>Return to Signup? <a href="signUp.php">Sign Up</a></p>
                </div>
            </form>
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