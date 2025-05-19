<?php
// session_start();
// if (!isset($_SESSION['reset_email'])) {
//     header("Location: forgot_password.php");
//     exit;
// }

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['verify'])) {
//     $email = $_SESSION['reset_email'];
//     $code = $_POST['reset_code'];

//     $conn = new mysqli("localhost", "root", "", " accounts");

//     $stmt = $conn->prepare("SELECT reset_expiry FROM user_info WHERE email=? AND reset_code=?");
//     $stmt->bind_param("ss", $email, $code);
//     $stmt->execute();
//     $stmt->store_result();

//     if ($stmt->num_rows > 0) {
//         $stmt->bind_result($expiry);
//         $stmt->fetch();

//         if (strtotime($expiry) >= time()) {
//             // code is valid
//             $_SESSION['reset_code'] = $code;
//             header("Location: change_password.php");
//         } else {
//             echo "<script>
//                 document.addEventListener('DOMContentLoaded', function() {
//                     showError('Code expired');
//                 });
//             </script>";
//         }
//     } else {
//         echo "<script>
//                 document.addEventListener('DOMContentLoaded', function() {
//                     showError('Invalid code!');
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
    <title>Verify Code</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <main class="fullscreen-container">
        <section class="form-panel">
            <form id="loginForm" method="post">
                <h2>Forgot Password</h2>
                
                <p class="divider">Enter the code sent to your email</p>
                
                <div class="form-group">
                    <input type="text" id="email" name="reset_code" placeholder="Code" required>
                </div>
                <button type="submit" class="primary-btn" name="verify">Reset</button>
                <div class="login-prompt">
                    <!-- I want to add a resend code function but no time -->
                    <!-- I can't figure out how to style the button so we do inline styling. -->
                    <!-- <p>Didn't recieve a code? <button style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer; padding:0; font:inherit;" type="submit" name="resend">Resend</button></p> -->
                    <p>Remember your password? <a href="login.php">Login</a></p>
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
    <script src="script.js"></script>
</body>
</html>