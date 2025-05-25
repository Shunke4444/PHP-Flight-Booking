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
            exit;


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
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="icon" type='image/png' href="assets/ICON.png">
    <link rel="stylesheet" href="styles/signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5756001ff6.js" crossorigin="anonymous"></script>
</head>
<body>

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="icon" type='image/png' href="assets/ICON.png">
    <link rel="stylesheet" href="styles/signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5756001ff6.js" crossorigin="anonymous"></script>
</head>
<body>

    <main class="fullscreen-container">
        <section class="welcome-panel">
            <span class="welcome-content">
                <h1>New Here?</h1>
                <p>Your adventure starts here. Discover new destinations, plan unforgettable journeys, and capture your travel memories—all in one place. Let’s explore the world together!</p>                <button class="outline-btn">SIGN UP</button>
            </span>
        </section>

        <section class="form-panel">
            <form id="registrationForm" method="post">
                <h2>Sign Up</h2>
                <p class="divider">Or use your email for registration</p>
                
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                
                <div class="form-group password-group">
                    <input type="password" id="passwordSignUp" name="password" placeholder="Password" required>
                    <span class="toggle-password" toggle="#passwordSignUp">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
                <div class="form-group password-group">
                    <input type="password" id="confirm_passwordSignUp" name="confirm_password" placeholder="Confirm Password" required>
                    <span class="toggle-password" toggle="#confirm_passwordSignUp">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
                
                <!-- Inside your form, before the submit button -->
<div class="form-group terms-group">
    <input type="checkbox" id="terms" name="terms" required>
    <label for="terms">I agree to the <a href="#" id="termsLink" class="terms-link">Terms and Conditions</a></label>
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

    <article id="termsModal" class="modal">
    <div class="modal-content terms-modal-content">
        <span class="close">&times;</span>
        <div class="terms-header">
            <h2><i class="fas fa-file-contract"></i> Terms and Conditions</h2>
            <p class="last-updated">Last updated: June 2024</p>
        </div>
        <div class="terms-body">
            <div class="terms-section">
                <h3><i class="fas fa-check-circle"></i> Acceptance of Terms</h3>
                <p>By creating an account, you agree to be bound by these Terms and Conditions and our Privacy Policy. If you don't agree, please don't use our services.</p>
            </div>
            
            <div class="terms-section">
                <h3><i class="fas fa-user-shield"></i> Account Responsibilities</h3>
                <p>You're responsible for maintaining the confidentiality of your account credentials and for all activities under your account. Notify us immediately of any unauthorized use.</p>
            </div>
            
            <div class="terms-section">
                <h3><i class="fas fa-lock"></i> Privacy and Data</h3>
                <p>We collect and use your information as described in our Privacy Policy. By using our services, you consent to this data collection and processing.</p>
            </div>
            
            <div class="terms-section">
                <h3><i class="fas fa-ban"></i> Prohibited Conduct</h3>
                <p>You agree not to: (a) violate laws; (b) impersonate others; (c) interfere with our services; (d) attempt unauthorized access; (e) harass other users.</p>
            </div>
            
            <div class="terms-section">
                <h3><i class="fas fa-gavel"></i> Termination</h3>
                <p>We may suspend or terminate your account if you violate these terms. You may terminate your account at any time by contacting us.</p>
            </div>
            
            <div class="terms-section">
                <h3><i class="fas fa-exchange-alt"></i> Changes to Terms</h3>
                <p>We may modify these terms at any time. Continued use after changes constitutes acceptance. We'll notify you of significant changes.</p>
            </div>
        </div>
        <div class="terms-footer">
            <button class="modal-btn agree-btn"><i class="fas fa-check"></i> I Understand</button>
        </div>
    </div>
</article>

 
    <script src="script.js"></script>
</body>
</html>
</body>
</html>