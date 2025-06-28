<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Connect to MySQL database
    $mysqli = new mysqli('localhost', 'root', '', 'mindease');
    if ($mysqli->connect_errno) {
        $error = 'Database connection failed.';
    } else {
        // Prepare and execute query
        $stmt = $mysqli->prepare("SELECT password FROM students WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed);
            $stmt->fetch();
            if (password_verify($password, $hashed)) {
                $_SESSION['email'] = $email;
                header('Location: Home.php');
                exit();
            } else {
                $error = 'Incorrect password';
            }
        } else {
            $error = 'Student email does not exist.';
        }
        $stmt->close();
        $mysqli->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="assets/MindEase-Logo.png">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: rgb(255, 255, 255);
            background-image: url('assets/background-login.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 40px;
            color: rgb(0, 0, 0);
        }
        .login-container input {
            width: 60%;
            height: 17.33px;
            padding: 10px;
            margin: 10px auto 15px auto;
            display: block;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 15px;
        }
        .login-container button {
            width: 65%;
            padding: 10px;
            margin: 60px auto 20px auto;
            background-color: #15355e;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.2s;
            text-align: center;
            display: block;
        }
        .login-container button:hover {
            background-color: rgb(27, 76, 135);
        }
        .error {
            color: #b30000;
            background: #ffeaea;
            border: 1px solid #ffb3b3;
            padding: 12px 10px 10px 10px;
            border-radius: 6px;
            margin-bottom: 18px;
            max-width: 250px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Log In to MindEase</h2>
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post">
            <input type="email" name="email" placeholder="Student Email" required autofocus>
            <div style="position:relative; height:40px; margin:10px 69.3px 10px 69.3px;">
                <input type="password" name="password" id="password" placeholder="Password" required style="width:92%; padding-right:auto auto auto auto;">
                <span id="togglePassword" style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer; height:10px; display:flex; align-items:center;">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </span>
            </div>
            <div style="text-align:center;">
                <button type="submit">Log In</button>
            </div>
        </form>
    </div>
    <div style="width:100%; text-align:center; margin-top:10px; margin-bottom:30px; color:rgba(255, 255, 255, 0.31); font-size:15px; position:relative;">
            &copy;2025 MindEase. All rights reserved;
    </div>
    <script>
// Toggle password visibility for login
const passwordInput = document.getElementById('password');
const togglePassword = document.getElementById('togglePassword');
const eyeIcon = document.getElementById('eyeIcon');
let passwordVisible = false;
togglePassword.addEventListener('click', function() {
    passwordVisible = !passwordVisible;
    passwordInput.type = passwordVisible ? 'text' : 'password';
    eyeIcon.innerHTML = passwordVisible
        ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.042-3.368M6.873 6.873A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.043 5.132M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/>'
        : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
});
</script>
</body>
</html>
