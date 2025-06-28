<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQs</title>
    <link rel="icon" type="image/x-icon" href="assets/MindEase-Logo.png">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff;
        }
        .navbar {
            background-color: #fff;
            overflow: hidden;
        }
        .navbar button {
            float: left;
            background-color: #fff;
            color: #000;
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
            background-color: #fff !important;
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
    </style>
</head>
<body>
    <div class="navbar">
        <img src="assets/MindEase-Logo.png" alt="MindEase Logo" style="float:left; height:48px; margin-top:18px; margin-left:15px; margin-right:0px; cursor:pointer;" onclick="location.href='Home.php'">
        <span style="float:left; color:#15355e; background-color:#fff; font-size:25px; padding:28px 20px; font-weight:bold; cursor:pointer;" onclick="location.href='Home.php'">MindEase</span>
        <button onclick="location.href='Home.php'">Home</button>
        <button onclick="location.href='Content.php'">Content</button>
        <button onclick="location.href='Inventory.php'">Inventory</button>
        <button onclick="location.href='Services.php'">Services</button>
        <button style="float:right; margin-right:60px;" onclick="location.href='Login.php'">Log In</button>
        <button style="float:right; margin-right:10px;" onclick="location.href='Register.php'">Register</button>
    </div>
    <!-- Page content goes here -->
    <div class="main-container">
        <h1>FAQs</h1>
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
    <footer class="footer-top-radius" style="width:98.8vw; min-height:90px; background:#eceef0; border-top:px solid #d3d6da; margin-top:0px; padding:0; font-size:16px; color:#444; position:relative; left:0; bottom:0;">
        <style>
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
        <div style="max-width:1100px; margin:0 auto; padding:25px 10px 40px 10px;">
            <div style="background:#eceef0; border-radius:12px; padding:24px 20px; display:flex; flex-direction:row; align-items:flex-start; gap:40px; justify-content:flex-start;">
                <!-- Links Section -->
                <div style="min-width:220px; text-align:left; display:flex; flex-direction:column; align-items:flex-start;">
                    <div style="font-weight:bold; margin-bottom:12px; color:#444; font-size:18px;">Links</div>
                     <div style="margin-bottom:10px;" onclick="location.href='TermsAndConditions.php'">
                        <span class="footer-link">Terms and Conditions</span>
                    </div>
                    <div style="margin-bottom:10px;" onclick="location.href='PrivacyPolicy.php'">
                        <span class="footer-link">Privacy Policy</span>
                    </div>
                    <div style="margin-bottom:0;" onclick="location.href='FAQs.php'">
                        <span class="footer-link">FAQs</span>
                    </div>
                </div>
                <!-- Contact Us Section -->
                <div style="min-width:220px; text-align:left; display:flex; flex-direction:column; align-items:flex-start;">
                    <div style="font-weight:bold; margin-bottom:12px; color:#444; font-size:18px;">Contact Us</div>
                    <div style="display:flex; align-items:center;">
                        <svg width="18" height="18" style="vertical-align:middle; margin-right:6px;" fill="#444" viewBox="0 0 24 24">
                            <path d="M20 4H4C2.897 4 2 4.897 2 6v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 5.01-8-5.01V6h16zM4 20v-9.489l7.445 4.653a1 1 0 0 0 1.11 0L20 10.511V20H4z"></path>
                        </svg>
                        easemind4@gmail.com
                    </div>
                </div>
            </div>
        </div>
        <div style="width:100%; text-align:center; margin-top:10px; margin-bottom:30px; color:rgba(0, 0, 0, 0.36); font-size:15px; position:relative;">
            &copy;2025 MindEase. All rights reserved.
        </div>
        <div style="width:98vw; height:1px; background:#eceef0;"></div>
    </footer>
</body>
</html>
