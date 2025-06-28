<?php
session_start();
require_once 'db.php';
require 'C:\xampp\htdocs\MindEase\vendor\autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data    
    $username = trim($_POST['username'] ?? '');
    $studentID = trim($_POST['studentID'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $repassword = $_POST['confirm'] ?? '';
    
    // Validate form data
    if ($username === '' || $studentID === '' || $password === '' || $email === '') {
        $error = 'Username, student ID, email, and password are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address.';
    } elseif (strpos($email, '@siswa.unimas.my') === false) {
        $error = 'Invalid Student Email';
    } elseif ($password !== $repassword) {
        $error = 'Passwords do not match.';
    } else {
        // Check if username, studentID, or email already exists in the database
        $stmt = $conn->prepare("SELECT username, studentID, email FROM students WHERE username = ? OR studentID = ? OR email = ?");
        $stmt->bind_param("sss", $username, $studentID, $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($existingUser, $existingStudentID, $existingEmail);
            while ($stmt->fetch()) {
                if ($existingUser === $username) {
                    $error = 'Username already exists.';
                    break;
                }
                if ($existingStudentID === $studentID) {
                    $error = 'Student ID already registered.';
                    break;
                }
                if ($existingEmail === $email) {
                    $error = 'Email already registered.';
                    break;
                }
            }
        }
        $stmt->close();
        if (!$error) {
            // Generate verification token and 6-digit code
            $verification_token = bin2hex(random_bytes(32));
            $verification_code = sprintf("%06d", mt_rand(1, 999999));
            $is_verified = 0;
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $insert = $conn->prepare("INSERT INTO students (username, studentID, password, email, verification_token, is_verified) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $insert->bind_param("ssssssi", $username, $studentID, $hashed, $email, $verification_token, $is_verified);
            if ($insert->execute()) {
                $insert->close();
                // Send verification email
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'mindease4@gmail.com';
                    $mail->Password   = 'kudx spqm qaje dovl';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;
                    //Recipients
                    $mail->setFrom('noreply@mindease-unimas.my', 'MindEase');
                    $mail->addAddress($email, $username);
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'MindEase Email Verification';
                    $verifyLink = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/Verification.php?token=$verification_token";
                    $mail->Body    = "<p>Hi $username,</p>"
                        . "<p>Please verify your email by clicking the link below:</p>"
                        . "<p><a href='$verifyLink'>$verifyLink</a></p>";
                    $mail->send();
                    header('Location: RegistrationSuccess.php?verify=1');
                    exit();
                } catch (Exception $e) {
                    $error = 'Registration successful, unable<br>to send verification email.';
                }
            } else {
                $error = 'Registration failed. Please try again.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
        .register-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .register-container h2 {
            text-align: center;
            margin-bottom: 40px;
            color: rgb(0, 0, 0);
        }
        .register-container input {
            width: 60%;
            padding: 10px;
            margin: 10px auto 15px auto;
            display: block;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 15px;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 68%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
            background: none;
            border: none;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
        }

        .password-toggle:hover {
            color: #333;
        }
        
        .register-container button {
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
        .register-container button:hover {
            background-color: rgb(27, 76, 135);
        }
        .error {
            color: red;
            margin-bottom: 10px;
            text-align: center;
            
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register for MindEase</h2>
        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required autofocus>
            <input type="text" name="studentID" placeholder="Student ID" required>
            <input type="email" name="email" placeholder="Student Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
    <div style="width:100%; text-align:center; margin-top:10px; margin-bottom:30px; color:rgba(255, 255, 255, 0.31); font-size:15px; position:relative;">
            &copy;2025 MindEase. All rights reserved;
    </div>
</body>
</html>