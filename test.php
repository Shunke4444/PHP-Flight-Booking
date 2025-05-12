<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <main class="fullscreen-container">
        <section class="welcome-panel">
            <span class="welcome-content">
                <h1>New Here?</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, dicta. put vector here</p>
                <button class="outline-btn">SIGN UP</button>
            </span>
        </section>

        <section class="form-panel">
            <form id="registrationForm" method="post">
                <h2>Sign Up</h2>
                
                <article class="social-buttons">
                    <button type="button" class="social-btn">
                        <i class="fab fa-google"></i>
                    </button>
                    <button type="button" class="social-btn">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button type="button" class="social-btn">
                        <i class="fab fa-twitter"></i>
                    </button>
                </article>
                
                <p class="divider">Or use your email for registration</p>
                
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                
                <div class="form-group">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                
                <button type="submit" class="primary-btn">Sign Up</button>
                
                <div class="login-prompt">
                    <p>One of us? <a href="login.php">Login</a></p>
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
</body>
</html>

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