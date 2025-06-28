<?php
require_once 'db.php';
$message = '';
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $stmt = $conn->prepare("SELECT id, is_verified FROM students WHERE verification_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $is_verified);
        $stmt->fetch();
        if ($is_verified) {
            $message = 'Your email is already verified.';
        } else {
            $update = $conn->prepare("UPDATE students SET is_verified = 1, verification_token = NULL WHERE id = ?");
            $update->bind_param("i", $id);
            if ($update->execute()) {
                $message = 'Email verification successful! You may now log in.';
            } else {
                $message = 'Verification failed. Please try again later.';
            }
            $update->close();
        }
    } else {
        $message = 'Invalid or expired verification link.';
    }
    $stmt->close();
} else {
    $message = 'No verification link provided.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
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
            text-align: center;
        }
        .container {
            max-width: 400px;
            margin: 120px auto 221px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 40px 30px 30px 30px;

        }
        .success {
            color: green;
            background: #e6f9ea;
            border: 1px solid #b6e2c6;
            padding: 12px 10px;
            border-radius: 6px;
            margin-bottom: 18px;
        }
        .error {
            color: #b30000;
            background: #ffeaea;
            border: 1px solid #ffb3b3;
            padding: 12px 10px 10px 10px;
            border-radius: 6px;
            margin-bottom: 18px;
            margin-left: auto;
            margin-right: auto;
            max-width: 280px;
            text-align: center;
            font-size: 1em;
        } 
        .goto-login-btn {
            display: inline-block;
            width: 65%;
            margin-top: 10px;
            padding: 10px 0.5px;
            background: #15355e;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            font-size: 18px;
            transition: background 0.2s;
        }
        .goto-login-btn:hover {
            background: #1b4c87;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php $isSuccess = (strpos($message, 'successful') !== false || strpos($message, 'already') !== false); ?>
        <div class="<?php echo $isSuccess ? 'success' : 'error'; ?>">
            <h2>Email Verification</h2>
            <!-- 6 digit code verification removed; only link-based verification is used -->
            <p><?php echo htmlspecialchars($message); ?></p>
        </div>
        <a href="Login.php" class="goto-login-btn">Go to Login</a>
    </div>
    <div style="width:100%; text-align:center; padding: 10px auto 10px auto; margin-top:10px; margin-bottom:10px; color:rgba(255, 255, 255, 0.31); font-size:15px; position:relative;">
            &copy;2025 MindEase. All rights reserved;
    </div>
</body>
</html>
