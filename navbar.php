<?php
// C:\xampp\htdocs\MindEase\navbar.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch username if logged in and not already set
if (isset($_SESSION['email']) && !isset($_SESSION['username'])) {
    $mysqli = new mysqli('localhost', 'root', '', 'mindease');
    if (!$mysqli->connect_errno) {
        $stmt = $mysqli->prepare("SELECT username FROM students WHERE email = ?");
        $stmt->bind_param('s', $_SESSION['email']);
        $stmt->execute();
        $stmt->bind_result($username);
        if ($stmt->fetch()) {
            $_SESSION['username'] = $username;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/MindEase-Logo.png">
    <link rel="stylesheet" href="styles.css">
    <!-- Add any other necessary head elements here -->
</head>
<body style="margin:0 0 0 0; font-family: Arial, sans-serif;">
    <div class="navbar" style="font-family: Arial, sans-serif;">
        <!-- MindEase logo and text -->
        <img src="assets/MindEase-Logo.png" alt="MindEase Logo" style="float:left; height:48px; margin-top:18px; margin-left:15px; margin-right:0px; cursor:pointer; font-family: Arial, sans-serif; background-color:#1e497c;">
        <span style="float:left; color: #e0f0ff; background-color: #1e497c; font-size:25px; padding:28px 20px; font-weight:bold; cursor:pointer; font-family: Arial, sans-serif;" onclick="location.href='Home.php'">MindEase</span>
        <button onclick="location.href='Home.php'" style="font-family: Arial, sans-serif;">Home</button>
        <button onclick="location.href='Content.php'" style="font-family: Arial, sans-serif;">Content</button>
        <button onclick="location.href='Inventory.php'" style="font-family: Arial, sans-serif;">Inventory</button>
        <?php if (isset($_SESSION['username'])): ?>
            <div style="float:right; display:flex; align-items:center; margin-right:10px; margin-top:25px; font-family: Arial, sans-serif;">
                <img src="assets/default-profile.png" alt="Profile"
                     style="width:35px; height:35px; border-radius:50%; margin-right:10px; margin-bottom:5px; margin-top:0px; border:2.5px solid rgba(21, 53, 94, 0); box-sizing:border-box;">
                <span style="font-weight:bold; font-family: Arial, sans-serif;"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <form action="logout.php" method="post" class="logout-form" style="margin-left:10px; display:flex; align-items:center; background:none; box-shadow:none; font-family: Arial, sans-serif;">
                    <img src="assets/log-out-white.png" alt="Logout" class="logout-icon" style="width:25px; height:25px; padding-left:5px; cursor:pointer; transition:filter 0.2s; filter: none;">
                    <button type="submit" class="logout-btn" style="margin-left: 0; padding:7px 16px 7px 10px; background:none; color:rgb(220, 3, 3); border:none; border-radius:5px; font-weight:bold; font-size:1em; cursor:pointer; transition:color 0.2s; font-family: Arial, sans-serif;">Logout</button>
                </form>
                <style>
                    .logout-btn {
                        color: #e0f0ff !important;
                        font-family: Arial, sans-serif;
                    }
                    .logout-icon {
                        filter: brightness(0) invert(1);
                        transition: filter 0.2s;
                    }
                    .logout-form:hover .logout-btn {
                        color:rgb(255, 0, 0) !important;
                    }
                    .logout-form:hover .logout-icon {
                        /* Make icon red on hover */
                        filter: brightness(0) saturate(100%) invert(12%) sepia(99%) saturate(7492%) hue-rotate(-7deg) brightness(95%) contrast(119%);
                    }
                </style>
            </div>
        <?php else: ?>
            <button style="float:right; margin-right:20px; font-family: Arial, sans-serif;" onclick="location.href='Login.php'">Log in</button>
            <button style="float:right; margin-right:10px; font-family: Arial, sans-serif;" onclick="location.href='Register.php'">Register</button>
        <?php endif; ?>
    </div>
    <style>
        .navbar {
            background-color: #1e497c !important;
            overflow: hidden;
        }
        .navbar button {
            float: left;
            background-color: #1e497c !important;
            color: #e0f0ff !important;
            border: none;
            text-align: center;
            font-size: 18px;
            padding: 35px 20px;
            margin-left: 0;
            margin-right: 0;
            cursor: pointer;
            font-family: Arial, sans-serif;
            font-weight: bold;
            border-radius: 0;
            transition: background 0.2s, color 0.2s;
        }
        .navbar button:first-of-type {
            margin-left: 60px;
        }
        .navbar button[onclick*="Login.php"],
        .navbar button[onclick*="Register.php"] {
            margin-right: 0 !important;
        }
        .navbar button:hover {
            background-color: #e0f0ff !important;
            color: #1e497c !important;
        }
        .navbar span {
            color: #e0f0ff !important;
            background-color: #1e497c !important;
        }
    </style>
    <!-- ...existing code... -->
</body>
</html>