<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="assets/MindEase-Logo.png">
    <title>Home</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color:#fff;
        }
        .background-image {
            position: absolute;
            top: 90px; /* below navbar */
            left: 50%;
            transform: translateX(-50%);
            width: 98.8vw;
            height: 430px; /* adjust as needed */
            background-image: url('assets/background.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-radius: 0px;
            border-bottom-right-radius: 32px;
            border-bottom-left-radius: 32px; /* adjust radius as needed */
            z-index: 0;
        }
        .navbar {
            background-color: #1e497c;
            overflow: hidden;
        }
        .navbar button {
            float: left;
            background-color: #1e497c;
            color: #e0f0ff;
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
            background-color: #e0f0ff;
            color: #1e497c;
        }
        .navbar span {
            color: #e0f0ff !important;
            background-color: #1e497c !important;
        }
        .hero-text {
            position: absolute;
            top: 120px;
            left: 45%;
            transform: translateX(-50%);
            text-align: left;
            color:rgb(0, 0, 0);
            width: 80.5%;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            z-index: 1; /* ensure text is above background image */
        }
        .hero-text h1 {
            font-size: 2.8em;
            font-weight: bold;
            margin-bottom: 25px;
            line-height: 1.35; /* Add line spacing for title */
        }
        .hero-text p {
            font-size: 1.0em;
            margin-top: 0;
            line-height: 1.6; /* Add line spacing for body */
        }
        .hero-text .learn-more-btn,
        .info-box .learn-more-btn {
            display: inline-block;
            margin-top: 18px;
            padding: 12px 28px;
            background-color: #1e497c;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
            outline: none;
            box-shadow: none;
        }
        .info-box .learn-more-btn {
            display: inline-block;
            margin-top: 18px;
            padding: 12px 20px; /* smaller padding */
            background-color: #1e497c;
            color:rgb(255, 255, 255);
            border: none;
            border-radius: 15px;
            font-size: 0.95em; /* slightly smaller font */
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
            outline: none;
            box-shadow: none;
        }
        .hero-text .learn-more-btn:hover {
            background-color:rgb(255, 255, 255);
            color: #1e497c;
            text-decoration: none;
        }
        .info-box .learn-more-btn:hover {
            background-color:rgb(255, 255, 255);
            color: #1e497c;
            text-decoration: none;
        }
        .info-boxes {
            display: flex;
            justify-content: center;
            gap: 32px;
            margin-top: 470px; /* Adjust as needed to appear below the background image */
            margin-bottom: 40px;
        }
        .info-box {
            border-radius: 24px;
            padding: 32px 28px;
            width: 300px;
            min-height: 180px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .info-box.coaching {
            background:rgb(201, 255, 197); /* Light blue */
        }
        .info-box.group {
            background:rgb(246, 244, 197); /* Light yellow */
        }
        .info-box.individual {
            background:rgb(246, 202, 197); /* Light pink */
        }
        .info-title {
            font-size: 1.7em;
            font-weight: bold;
            margin-bottom: 14px;
            color:rgb(55, 65, 81);
        }
        .info-body {
            font-size: 1em;
            color: #4B5563;
            line-height: 1.6;
        }
        .big-title {
            text-align: center;
            margin-top: 60px;
            margin-bottom: 10px;
        }
        .big-title h2 {
            font-size: 2.5em;
            color:rgb(0, 0, 0);
            font-weight: bold;
            margin: 0;
            letter-spacing: 1px;
        }
        .why-choose-mindease-content {
            max-width: 900px;
            margin: 0 auto 60px auto;
            text-align: center;
        }
        .why-choose-mindease-content p {
            font-size: 1.2em;
            color: #374151;
            margin-bottom: 32px;
            line-height: 1.7;
        }
        .why-choose-mindease-images {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 150px;
        }
        .why-choose-mindease-images > div {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            max-width: 220px;
        }
        .why-choose-mindease-images img {
            max-width: 100%;
            height: 100px;
            background: none;
            display: block;
            border: none;
            box-shadow: none;
            border-radius: 0;
            margin-left: auto;
            margin-right: auto;
        }
        .why-choose-mindease-label {
            text-align: center;
            font-weight: bold;
            margin-top: 12px;
            font-size: 1.1em;
        }
        .why-choose-mindease-desc {
            font-size: 0.98em;
            color: #374151;
            margin-top: 6px;
            margin-bottom: 0;
            line-height: 1.5;
        }
        .commitment-body {
            max-width: 800px;
            margin: 0 auto 40px auto;
            text-align: center;
        }
        .commitment-body p {
            font-size: 1.15em;
            color: #374151;
            margin-bottom: 0;
            line-height: 1.7;
        }
        .begin-btn-container {
            text-align: center;
            margin-bottom: 5px;
        }
        .begin-btn {
            display: inline-block;
            padding: 16px 38px;
            background-color: #1e497c;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.2em;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }
        .begin-btn:hover {
            background-color: #e0f0ff;
            color: #1e497c;
        }
        .how-to-book-session-with-numbers {
            display: flex;
            justify-content: center;
            gap: 100px;
            margin-bottom: 60px;
        }
        .how-to-book-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 220px;
        }
        .how-to-book-number {
            font-size: 2em;
            font-weight: bold;
            color: #1e497c;
            margin-bottom: 10px;
        }
        .how-to-book-step img {
            max-width: 100%;
            height: auto;
            background: none;
            display: block;
            border: none;
            box-shadow: none;
            border-radius: 0;
            filter: invert(1);
        }
        .how-to-book-step-title {
            font-size: 1.1em;
            font-weight: bold;
            margin-top: 14px;
            margin-bottom: 6px;
            text-align: center;
            color: #1e497c;
        }
        .how-to-book-step-body {
            font-size: 0.98em;
            color: #374151;
            text-align: center;
            margin-bottom: 0;
            margin-top: 0;
            line-height: 1.5;
            max-width: 200px;
        }
        /* Add a specific margin-bottom for the two big titles */
        .big-title.feeling-stressed,
        .big-title.how-to-book {
            margin-bottom: 60px;
        }
        .book-appointment-body-text {
            max-width: 700px;
            margin: 0 auto 0 auto;
            text-align: center;
            font-size: 0.90em;
            color: #374151;
            margin-bottom: 30px;
            line-height: 1.7;
        }
        /* Footer top corners only */
        .footer-top-radius {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
    </style>
</head>
<body>
    <div class="background-image"></div>
    <div class="hero-text">
        <h1>Cultivate Inner Peace<br>and Reduce Stress</h1>
        <p>
            Daily stress got you down? Mindfulness helps you navigate<br>
            with focus, clarity, and inner peace. Find your calm<br>
            center within.<br>
        </p>
        <a href="Learnmore.php" class="learn-more-btn">Learn more</a>
    </div>
    <div class="info-boxes">
        <div class="info-box coaching">
            <div class="info-title">Mindfulness Coaching</div>
            <div class="info-body">Work one-on-one with a certified counsellor to develop personalized mindfulness practices.</div>
            <a href="CoachingLearnmore.php" class="learn-more-btn">Read more</a>
        </div>
        <div class="info-box group">
            <div class="info-title">Group Therapy</div>
            <div class="info-body">Connect with others in a supportive environment and learn mindfulness techniques together.</div>
            <a href="GroupLearnmore.php" class="learn-more-btn">Read more</a>
        </div>
        <div class="info-box individual">
            <div class="info-title">Individual Therapy</div>
            <div class="info-body">Address specific concerns while incorporating mindfulness practices for improved well-being.</div>
            <a href="IndividualLearnmore.php" class="learn-more-btn">Read more</a>
        </div>
    </div>
    <div class="big-title">
        <h2>Why choose MindEase?</h2>
    </div>
    <div class="why-choose-mindease-content">
        <p>
            Your journey is unique, and we are here to support you every step of the way with empathy and respect.<br>
            We are committed to providing a safe, inclusive, and nurturing environment for everyone.
        </p>
    </div>
    <div class="why-choose-mindease-images">
        <div>
            <img src="assets/home-website-photo-02.png" alt="being empathetic">
            <div class="why-choose-mindease-label"><b>Empathetic</b></div>
            <div class="why-choose-mindease-desc"></div>
        </div>
        <div>
            <img src="assets/home-website-photo-03.png" alt="non-judgmental">
            <div class="why-choose-mindease-label"><b>Non-judgmental</b></div>
            <div class="why-choose-mindease-desc"></div>
        </div>
        <div>
            <img src="assets/home-website-photo-04.png" alt="sensitive to diverse backgrounds and viewpoints">
            <div class="why-choose-mindease-label"><b>Diverse & Inclusive</b></div>
            <div class="why-choose-mindease-desc"></div>
        </div>
    </div>

    <div class="big-title">
        <h2>What can counselling do for you?</h2>
    </div>
    <div class="commitment-body">
        <p>
            We are committed to providing a safe, inclusive, and nurturing environment for everyone.<br>
            Your journey is unique, and we are here to support you every step of the way with empathy and respect.
        </p>
    </div>

    <div class="big-title feeling-stressed">
        <h2>Feeling stressed out?</h2>
    </div>
    <div class="begin-btn-container">
        <a href="Book.php" class="begin-btn">Book An Appointment</a>
    </div>
    <div class="book-appointment-body-text">
        Our Team Is Always Ready To Help!
    </div>

    <div class="big-title how-to-book">
        <h2>How to book your session?</h2>
    </div>
    <div class="how-to-book-session-with-numbers">
        <div class="how-to-book-step">
            <div class="how-to-book-number">1</div>
            <img src="assets/home-website-photo-05.png" alt="Workshops">
            <div class="how-to-book-step-title" style="white-space: nowrap;">Choose Counselling Mode</div>
            <div class="how-to-book-step-body">
                Select from our range of workshops, resources, or events that best suit your needs.
            </div>
        </div>
        <div class="how-to-book-step">
            <div class="how-to-book-number">2</div>
            <img src="assets/home-website-photo-06.png" alt="Resources">
            <div class="how-to-book-step-title">Pick a Date</div>
            <div class="how-to-book-step-body">
                Browse available dates and times, then reserve your preferred slot.
            </div>
        </div>
        <div class="how-to-book-step">
            <div class="how-to-book-number">3</div>
            <img src="assets/home-website-photo-07.png" alt="Events">
            <div class="how-to-book-step-title">Confirm & Attend</div>
            <div class="how-to-book-step-body">
                Complete your booking and receive confirmation. Attend your session and start your journey!
            </div>
        </div>
    </div>
    <footer class="footer-top-radius" style="width:98.8vw; min-height:90px; background:#1e497c; border-top:px solid #d3d6da; margin-top:0px; padding:0; font-size:16px; color:#fff; position:relative; left:0; bottom:0;">
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>