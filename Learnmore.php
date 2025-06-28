<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learn More</title>
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
            background: #e0f0ff;
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
    </style>
</head>
<body>
    <!-- Page content goes here -->
    <div class="main-container">
        <h1>Learn More About Mindfulness</h1>
        <div class="section-title-numbered">1. <b>What is Mindfulness?</b></div>
        <p>
            Mindfulness is the practice of being fully present and engaged in the current moment, aware of your thoughts and feelings without distraction or judgment. It helps you manage stress, improve focus, and enhance your overall well-being.
        </p>
        <div class="section-title-numbered">2. <b>Benefits of Mindfulness</b></div>
        <ul>
            <li>Reduces stress and anxiety</li>
            <li>Improves concentration and clarity</li>
            <li>Promotes emotional regulation</li>
            <li>Enhances self-awareness and empathy</li>
            <li>Supports better sleep and physical health</li>
        </ul>
        <div class="section-title-numbered">3. <b>How MindEase Helps</b></div>
        <ul>
            <li>Personalized mindfulness coaching</li>
            <li>Group and individual therapy sessions</li>
            <li>Access to resources and guided exercises</li>
            <li>Support from licensed professionals</li>
        </ul>
        <div class="section-title-numbered">4. <b>Get Started</b></div>
        <p>
            Explore our services, book a session, or browse our content to begin your mindfulness journey today.
        </p>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>