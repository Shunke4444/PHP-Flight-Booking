<?php
session_start();
if(isset($_SESSION["LoggedIn"])) {
    header("Location: landingPage.php");
    exit;
}
if(isset($_SESSION["TooManyAttempts"])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showError('Too many attempts. You've been redirected back to the sign up page.');
        });
    </script>";
    session_unset();
}
else if (isset($_SESSION["signup_email"]) || isset($_SESSION["signup_code"])) {
    session_unset();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php';
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

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

        $uppercase = preg_match('/[A-Z]/', $pw);
        $lowercase = preg_match('/[a-z]/', $pw);
        $number    = preg_match('/[0-9]/', $pw);
        $special   = preg_match('/[!@#$%^&*()_+\-=\[\]{};:"\\|,.<>\/?~`]/', $pw);

        $usernameCheck = $conn->prepare("SELECT id FROM user_info WHERE username = ?");
        $usernameCheck->bind_param("s", $user_name);
        $usernameCheck->execute();
        $usernameCheck->store_result();

        $emailCheck = $conn->prepare("SELECT id FROM user_info WHERE email = ?");
        $emailCheck->bind_param("s", $email);
        $emailCheck->execute();
        $emailCheck->store_result();

        if($usernameCheck->num_rows > 0) {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showError('Username already exists!');
                });
            </script>";
        }
        else if($emailCheck->num_rows > 0) {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showError('Email already exists!');
                });
            </script>";
        }
        else if ($pw != $conf_pw) {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showError('Passwords do not match!');
                });
            </script>";
        }
        else if(!$uppercase || !$lowercase || !$number || !$special || strlen($pw) < 8){
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showError('Password must be at least 8 characters long and contain uppercase, lowercase, number, and special character.');
                });
            </script>";
        } 
        else {
            $conn->close();
            $usernameCheck->close();
            $emailCheck->close();

            $_SESSION['username'] = $user_name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $pw;
            $_SESSION['confirm_password'] = $conf_pw;

            $code = rand(100000, 999999);
            $_SESSION['signup_email'] = $email;
            $_SESSION['signup_code'] = $code;
            $_SESSION['attempts'] = 0;
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $_ENV['MAIL_USERNAME'];
                $mail->Password = $_ENV['MAIL_PASSWORD'];
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom($_ENV['MAIL_USERNAME'], $_ENV['MAIL_FROM_NAME']);
                $mail->addAddress($email);
                $mail->Subject = 'Email Confirmation Code';
                $mail->Body    = "Your email confirmation code is: $code";

                $mail->send();
            } catch (Exception $e) {
                echo "Email error: {$mail->ErrorInfo}";
            }
            header("Location: signUpConfirmation.php");


            // $sql = "INSERT INTO user_info (username, email, password, conf_password)
            //         VALUES('$user_name', '$email', '$pw', '$conf_pw')";
        
            // if ($conn->query($sql) === TRUE) {
            //     echo "<script>
            //         document.addEventListener('DOMContentLoaded', function() {
            //             showSuccess();
            //         });
            //     </script>";
            // } else {
            //     echo "<script>showError('Registration failed');</script>";
            // }
        }
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
                    <input type="password" id="passwordSignUp" name="password" placeholder="Password" required>
                </div>
                
                <div class="form-group">
                    <input type="password" id="confirm_passwordSignUp" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <input type="checkbox" id="showPasswordSignUp"> Show Password
                
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

    <script src="script.js"></script>
</body>
</html>