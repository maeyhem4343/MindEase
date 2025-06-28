<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory</title>
    <link rel="icon" type="image/x-icon" href="assets/MindEase-Logo.png">
    <style>
        body { 
            margin: 0; 
            font-family: Arial, sans-serif; 
            background-color: #fff;
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
            padding: 20px 32px 32px 32px;
            background: #f9f9f9;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        h1 {
            font-size: 2.2em;
            margin-top: 0;
            margin-bottom: 30px;
            color:rgb(0, 0, 0);
        }
        .section-title {
            font-weight: bold;
            font-size: 1.15em;
            margin-top: 28px;
            margin-bottom: 10px;
            color:rgb(0, 0, 0);
        }
        .section-title-numbered {
            font-weight: bold;
            font-size: 1.15em;
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
            font-size: 1.04em;
            color: #444;
        }
        p {
            font-size: 1.08em;
            color: #444;
            line-height: 1.7;
        }
        .footer-top-radius {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
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
    </style>
</head>
<body>
    <div class="main-container">
        <h1>Inventory</h1>
        <p>To assess 
            burnout levels, the platform will utilize the Oldenburg Burnout Inventory (OLBI), a widely 
            recognized and validated tool. The project will prioritize a user-friendly design and secure data 
            handling, ensuring accessibility and confidentiality. The primary user base for this project will 
            be limited to UNIMAS medical students. The MindEase platform will provide basic burnout 
            assessments using the OLBI, rather than offering in-depth psychological evaluations or clinical 
            diagnoses. The goal of the system is to raise awareness about burnout, help users recognize 
            early signs of stress, and provide practical techniques for managing stress. While it offers basic 
            assessments, the platform will emphasize the importance of seeking professional help when 
            needed and will provide direct access to counselling services for further support.</p>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>