<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Successful</title>
    <link rel="icon" type="image/x-icon" href="assets/MindEase-Logo.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            background-image: url('assets/background-login.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .success-container {
            max-width: 400px;
            margin: 120px auto 170px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 40px 30px 30px 30px;
            text-align: center;
        }
        .success {
            color: green;
            background: #e6f9ea;
            border: 1px solid #b6e2c6;
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
            border: none;
            cursor: pointer;
        }
        .goto-login-btn:hover {
            background: #1b4c87;
        }
        .success-container h2 {
            color: #15355e;
            margin-bottom: 18px;
        }
        .success-container p {
            font-size: 1em;
            color: #333;
            margin-bottom: 15px;
        }
        .login-link {
            color: #15355e;
            text-decoration: underline;
            cursor: pointer;
            font-weight: normal;
            font-size: 0.9em;
        }
        .login-link:hover {
            color: #1e497c;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success">
            <h2>Registration Successful!</h2>
            <p>A verification link has<br>been sent to your email.</p>
        </div>
        <a href="Login.php" class="goto-login-btn">Proceed to Log In</a>
    </div>
    <div style="width:100%; text-align:center; margin-top:80px; margin-bottom:0; color:rgba(255, 255, 255, 0.31); font-size:15px; position:relative;">
            &copy;2025 MindEase. All rights reserved;
    </div>
</body>
</html>
