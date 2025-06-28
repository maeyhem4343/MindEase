<?php
include 'navbar.php';

// Data submission block
$success = null;
$error = null;
$booking_info = []; // Initialize booking_info variable

// Get username and student_id from session if logged in
$username = $_SESSION['username'] ?? '';
$student_id = $_SESSION['studentID'] ?? '';

// Fetch studentID from DB if not set in session
if ($username && !$student_id) {
    $mysqli = new mysqli('localhost', 'root', '', 'mindease');
    if (!$mysqli->connect_errno) {
        $stmt = $mysqli->prepare("SELECT studentID FROM students WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->bind_result($sid);
        if ($stmt->fetch()) {
            $_SESSION['studentID'] = $sid;
            $student_id = $sid;
        }
        $stmt->close();
        $mysqli->close();
    }
}

// Fetch full_name from DB if not set in session (for logged-in users)
// Remove or comment out this block if full_name is not in students table
// $full_name_db = $_SESSION['full_name'] ?? '';
// if ($username && !$full_name_db) {
//     $mysqli = new mysqli('localhost', 'root', '', 'mindease');
//     if (!$mysqli->connect_errno) {
//         $stmt = $mysqli->prepare("SELECT full_name FROM students WHERE username = ?");
//         $stmt->bind_param('s', $username);
//         $stmt->execute();
//         $stmt->bind_result($fn);
//         if ($stmt->fetch()) {
//             $_SESSION['full_name'] = $fn;
//             $full_name_db = $fn;
//         }
//         $stmt->close();
//         $mysqli->close();
//     }
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $session_type = $_POST['session_type'] ?? '';
    $preferred_date = $_POST['preferred_date'] ?? '';
    $preferred_time = $_POST['preferred_time'] ?? '';
    $submitted_student_id = trim($_POST['student_id'] ?? '');

    $allow_booking = false;
    $conflict = false;

    if ($username && $student_id) {
        $mysqli = new mysqli('localhost', 'root', '', 'mindease');
        if (!$mysqli->connect_errno) {
            // Check if this studentID has already made a booking under a different name
            $stmt = $mysqli->prepare("SELECT DISTINCT full_name FROM booking WHERE studentID = ?");
            $stmt->bind_param('s', $submitted_student_id);
            $stmt->execute();
            $stmt->bind_result($existing_full_name);
            while ($stmt->fetch()) {
                if ($existing_full_name !== $full_name) {
                    $conflict = true;
                    break;
                }
            }
            $stmt->close();

            // If no conflict, allow booking (no need to check students table for full_name)
            if (!$conflict) {
                $allow_booking = true;
            }
            $mysqli->close();
        }
    }

    if ($full_name && $email && $phone && $session_type && $preferred_date && $preferred_time && $submitted_student_id) {
        if ($username && $student_id && !$allow_booking) {
            $error = $conflict
                ? "This Student ID can only make bookings under one name. Please use your registered name."
                : "You can only make bookings using your own name.";
        } else {
            $mysqli = new mysqli('localhost', 'root', '', 'mindease');
            if (!$mysqli->connect_errno) {
                $stmt = $mysqli->prepare("INSERT INTO booking (full_name, studentID, email, phone, session_type, preferred_date, preferred_time) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param(
                    'sssssss',
                    $full_name,
                    $submitted_student_id,
                    $email,
                    $phone,
                    $session_type,
                    $preferred_date,
                    $preferred_time
                );
                if ($stmt->execute()) {
                    // Show booking info after successful submission
                    $success = "Your booking has been submitted successfully!";
                    $booking_info = [
                        'Full Name' => htmlspecialchars($full_name),
                        'Student ID' => htmlspecialchars($submitted_student_id),
                        'Email Address' => htmlspecialchars($email),
                        'Phone Number' => htmlspecialchars($phone),
                        'Type of Session' => htmlspecialchars($session_type),
                        'Preferred Date' => htmlspecialchars($preferred_date),
                        'Preferred Time' => htmlspecialchars($preferred_time)
                    ];
                } else {
                    $error = "Failed to submit booking. Please try again.";
                }
                $stmt->close();
                $mysqli->close();
            } else {
                $error = "Database connection failed.";
            }
        }
    } else {
        $error = "Please fill in all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Counselling Booking</title>
    <link rel="icon" type="image/x-icon" href="assets/MindEase-Logo.png">
    <style>
        body, input, select, button, textarea {
            font-family: Arial, sans-serif;
        }
        .h2 {
            font-size: 2.5em;
            color:rgb(0, 0, 0);
            font-weight: bold;
            margin: 0;
            letter-spacing: 1px;
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
            background-color: #1e497c;
            color: #fff;
        }
        .navbar span {
            color: #e0f0ff !important;
            background-color: #1e497c !important;
        }
        /* Custom style for Type of Session select arrow */
        .custom-select-arrow {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url("data:image/svg+xml;utf8,<svg fill='gray' height='18' viewBox='0 0 24 24' width='18' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>") no-repeat right 7px center/18px 18px;
            padding-right: 45px !important;
        }
        .submit-booking-button {
            display: inline-block;
            background: #1e497c;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            padding: 12px 12px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, color 0.2s, border 0.2s;
        }
        /* Add hover effect for Submit Booking button */
        .submit-booking-button:hover {
            background:rgb(255, 255, 255);
            color: #1e497c;
        }
    </style>
</head>
<body>
    <!-- Booking Form -->
    <div style="font-size: 18px; max-width:700px; margin: 50px auto 70px auto; padding:5px 50px 60px 50px; background:rgb(230, 230, 230); border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
        <h2 style="margin-top: 40px; margin-bottom: 50px;">Book Your Counselling Session</h2>
        <?php if ($success): ?>
            <div style="color: #1e497c; font-weight:bold; margin-bottom:20px;"><?php echo $success; ?></div>
            <?php if (!empty($booking_info)): ?>
                <div style="background:rgb(255, 255, 255); border:1px solid rgba(4, 0, 255, 0); border-radius:8px; padding:18px 22px; margin-bottom:24px;">
                    <div style="font-weight:bold; margin-bottom:10px;">Your Booking Details:</div>
                    <ul style="list-style:none; padding:0; margin:0;">
                        <?php foreach ($booking_info as $label => $value): ?>
                            <li style="margin-bottom:8px;"><span style="font-weight:600;"><?php echo $label; ?>:</span> <?php echo $value; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php elseif ($error): ?>
            <div style="color:red; font-weight:bold; margin-bottom:20px;"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if (!$success): ?>
        <form action="#" method="post" style="display:flex; flex-direction:column; gap:18px;">
            <!-- Personal Information -->
            <fieldset style="border:none; padding:0;">
                <legend style="font-weight:bold; margin-bottom:25px; margin-top: 30px;">Personal Information:</legend>
                <label>
                    Full Name (as per IC)<br>
                    <input type="text" name="full_name" required style="width:50%; margin: 10px 0 10px 0; padding:8px; border-radius:4px; border:1px solid #ccc;"
                        value="<?php echo isset($full_name) ? htmlspecialchars($full_name) : ($username ? htmlspecialchars($_SESSION['full_name'] ?? '') : ''); ?>"
                        <?php if ($username && !empty($_SESSION['full_name'])) echo 'readonly'; ?>>
                </label><br>
                <label>
                    Student ID<br>
                    <input type="text" name="student_id" required style="width:50%; margin: 10px 0 10px 0; padding:8px; border-radius:4px; border:1px solid #ccc;"
                        value="<?php echo isset($submitted_student_id) ? htmlspecialchars($submitted_student_id) : ($student_id ? htmlspecialchars($student_id) : ''); ?>"
                        <?php if ($username) echo 'readonly'; ?>>
                </label><br>
                <label>
                    Email Address (Student/Personal)<br>
                    <input type="email" name="email" required style="width:50%; margin: 10px 0 10px 0; padding:8px; border-radius:4px; border:1px solid #ccc;">
                </label><br>
                <label>
                    Phone Number<br>
                    <input type="tel" name="phone" required style="width:50%; margin: 10px 0 20px 0; padding:8px; border-radius:4px; border:1px solid #ccc;">
                </label>
            </fieldset>

            <!-- Session Details -->
            <fieldset style="border:none; padding:0;">
                <legend style="font-weight:bold; margin-bottom:25px; margin-top: 30px;">Session Details:</legend>
                <label>
                    Type of Session<br>
                    <select name="session_type" required class="custom-select-arrow" style="width:52.5%; margin: 10px 0 10px 0; padding:8px; border-radius:4px; border:1px solid #ccc; background-color: #fff;">
                        <option value="Individual">Individual</option>
                        <option value="Group">Group</option>
                    </select>
                </label><br>
                <label>
                    Preferred Date<br>
                    <input type="date" name="preferred_date" required style="width:50%; margin: 10px 0 10px 0; padding:8px; border-radius:4px; border:1px solid #ccc;">
                </label><br>
                <label>
                    Preferred Time<br>
                    <input type="time" name="preferred_time" required style="width:50%; margin: 10px 0 10px 0; padding:8px; border-radius:4px; border:1px solid #ccc;">
                </label><br>
            </fieldset>

            <button type="submit" class="submit-booking-button" style="width:50%; margin-top:18px; margin-left:8px; padding:12px 12px 12px 12px; font-size:18px; font-weight:bold; cursor:pointer; border-radius:6px;">
                Submit Booking
            </button>
        </form>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>