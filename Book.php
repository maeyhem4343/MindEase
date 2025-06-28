<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Appointment</title>
    <link rel="icon" type="image/x-icon" href="assets/MindEase-Logo.png">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff;
        }
        .navbar {
            background-color: #e0f0ff;
            overflow: hidden;
        }
        .navbar button {
            float: left;
            background-color: #e0f0ff;
            color: #15355e;
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
            background-color: #1e497c;
            color: #fff;
        }
        .navbar span {
            color: #15355e !important;
            background-color: #e0f0ff !important;
        }
        .main-container {
            max-width: 900px;
            margin: 40px auto 40px auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        h1 {
            font-size: 2.2em;
            margin-top: 0;
            margin-bottom: 30px;
        }
        .section-title {
            font-weight: bold;
            font-size: 1.1em;
            margin-top: 22px;
            margin-bottom: 8px;
        }
        ul {
            margin-top: 0;
            margin-bottom: 0;
            padding-left: 24px;
        }
        li {
            margin-bottom: 8px;
        }
        .footer-link {
            color:#444;
            text-decoration: none;
            cursor: pointer;
            transition: color 0.2s;
        }
        .footer-link:hover {
            color: #1e497c;
            text-decoration: none;
        }
        .footer-top-radius {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .book-button {
            display: inline-block;
            background: #1e497c;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            padding: 10px 32px;
            font-size: 1em;
            margin-bottom: 18px;
            text-decoration: none;
            transition: background 0.2s, color 0.2s, border 0.2s;
        }
        /* Add hover effect for BOOK buttons */
        .book-button:hover {
            background: #e0f0ff;
            color: #1e497c;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="main-container" style="background:none; box-shadow:none; max-width:none; margin:40px 0 40px 0; padding:0;">
        <h1 style="text-align:center; font-size:2.3em; font-weight:bold; margin-bottom:10px;">Join MindEase Today</h1>
        <div style="text-align:center; font-size:1.15em; font-weight:500; margin-bottom:38px; letter-spacing:0.5px;">Access Invaluable Resources for Your Mental Well-Being</div>
        <div style="display:flex; justify-content:center; gap:40px; flex-wrap:wrap;">
            <!-- Individual Counseling Card -->
            <div style="background:#fff; border:1.5px solid #e0e0e0; border-radius:8px; width:320px; padding:28px 24px 18px 24px; margin: 20px 0 50px 0; display:flex; flex-direction:column; align-items:center; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
                <img src="assets/145656_30760.png" alt="Individual Counseling" style="width:100%; max-width:220px; height:auto; margin-bottom:18px; padding-top:35px;">
                <div style="font-size:1.18em; font-weight:bold; margin-bottom:2px; margin-top: 5px;">Individual Counseling</div>
                <div style="font-size:0.98em; color:#555; margin-bottom:16px;">For solo educators</div>
                <div style="font-size:1.5em; font-weight:bold; color:#222; margin-bottom:2px;">RM 80.00</div>
                <div style="font-size:1em; color:#444; margin-bottom:2px;">per session</div>
                <div style="font-size:0.95em; color:#888; margin-bottom:34px;"><i>(Minimum 3 session)</i></div>
                <a href="BookForm.php" class="book-button" style="display:inline-block; font-weight:bold; border-radius:5px; padding:10px 32px; font-size:1em; margin-bottom:18px;">BOOK</a>
                <ul style="text-align:left; font-size:1em; color:#444; margin:0; padding-left:18px;">
                    <li>Practical Stress Management Techniques</li>
                    <li>Safe and Supportive Environment</li>
                    <li>Personalized Coping Strategies</li>
                </ul>
            </div>
            <!-- Group Counseling Card -->
            <div style="background:solid rgba(205, 243, 255, 0.81); border:1.5px solid #e0e0e0; border-radius:8px; width:320px; padding:28px 24px 18px 24px; margin: 20px 0 50px 0; display:flex; flex-direction:column; align-items:center; box-shadow:0 2px 8px rgba(0,0,0,0.04); position:relative;">
                <div style="position:absolute; top:-18px; margin-top: 6px; left:50%; transform:translateX(-50%); z-index:2;">
                    <span style="background:#1e497c; color:#fff; font-size:1.08em; font-weight:bold; padding:10px 20px; border-radius:4px; box-shadow:0 2px 8px rgba(0,0,0,0.10);">Recommended</span>
                </div>
                <img src="assets/181362_661286.png" alt="Group Counseling" style="width:100%; max-width:220px; height:auto; margin-bottom:18px; margin-top:28px;">
                <div style="font-size:1.18em; font-weight:bold; margin-bottom:2px;">Group Counseling</div>
                <div style="font-size:0.98em; color:#555; margin-bottom:16px;">For small teams</div>
                <div style="font-size:1.5em; font-weight:bold; color:#222; margin-bottom:2px;">RM 250.00</div>
                <div style="font-size:1em; color:#444; margin-bottom:2px;">per session</div>
                <div style="font-size:0.95em; color:#888; margin-bottom:16px;"><i>(Limit to 5 person per group)<br>(minimum 3 session)</i></div>
                <a href="BookForm.php" class="book-button" style="display:inline-block; font-weight:bold; border-radius:5px; padding:10px 32px; font-size:1em; margin-bottom:18px;">BOOK</a>
                <ul style="text-align:left; font-size:1em; color:#444; margin:0; padding-left:18px;">
                    <li>Interactive Group Counseling</li>
                    <li>Collaborative Stress-Relief Activities</li>
                    <li>Foster Connections and Mutual Support</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Remove the old footer HTML below and include the new footer -->
    <?php include 'footer.php'; ?>
