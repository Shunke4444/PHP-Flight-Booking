<?php
// session_start();
// $conn = new mysqli("localhost", "root", "", " accounts");

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     $input = $_POST["username_or_email"];
//     $password = $_POST["password"];

//     $stmt = $conn->prepare("SELECT id, username, password, failed_attempts, locked_until FROM user_info WHERE username=? OR email=?");
//     $stmt->bind_param("ss", $input, $input);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows === 1) {
//         $user = $result->fetch_assoc();

//         if ($user['locked_until'] && strtotime($user['locked_until']) > time()) {
//             echo "<script>
//                     document.addEventListener('DOMContentLoaded', function() {
//                         showError('Account locked. Try again later.');
//                     });
//                 </script>";
//         } else {
//             if ($password == $user['password']) {
//                 $stmt = $conn->prepare("UPDATE user_info SET failed_attempts=0, locked_until=NULL WHERE id=?");
//                 $stmt->bind_param("i", $user['id']);
//                 $stmt->execute();

//                 $_SESSION['user_id'] = $user['id'];
//                 $_SESSION['username'] = $user['username'];
//                 header("Location: mockup_page.php");
//                 exit;
//             } else {
//                 $failed = $user['failed_attempts'] + 1;
//                 $lockTime = NULL;

//                 if ($failed >= 5) {
//                     $lockTime = date("Y-m-d H:i:s", time() + 5 * 60);
//                     echo "<script>
//                             document.addEventListener('DOMContentLoaded', function() {
//                                 showError('Too many attempts. Account locked for 5 minutes.');
//                             });
//                         </script>";
//                 } else {
//                     echo "<script>
//                             document.addEventListener('DOMContentLoaded', function() {
//                                 showError('Incorrect password');
//                             });
//                         </script>";
//                 }

//                 $stmt = $conn->prepare("UPDATE user_info SET failed_attempts=?, locked_until=? WHERE id=?");
//                 $stmt->bind_param("isi", $failed, $lockTime, $user['id']);
//                 $stmt->execute();
//             }
//         }
//     } else {
//         echo "<script>
//                 document.addEventListener('DOMContentLoaded', function() {
//                     showError('Account not found');
//                 });
//             </script>";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <main class="fullscreen-container">
        <section class="form-panel">
            <form id="loginForm" method="post"> 
                <h2>Login</h2>
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
                
                <p class="divider">Or use your email to log in</p>
                
                <div class="form-group">
                    <input type="text" id="username_or_email" name="username_or_email" placeholder="Username/Email" required>
                </div>
                
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="primary-btn">Login</button>
                <div class="login-prompt">
                    <p>New here? <a href="index.php">Sign Up</a></p>
                </div>
                <div class="login-prompt">
                    <p>Forgot your password? <a href="forgot_password.php">Reset</a></p>
                </div>
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
