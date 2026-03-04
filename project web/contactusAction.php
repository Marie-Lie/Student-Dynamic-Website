<?php
// Check if form was submitted (so only run the code if the form was submitted)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $number = htmlspecialchars($_POST["number"]);
    $inquiry = htmlspecialchars($_POST["inquiry"]);
    $message = nl2br(htmlspecialchars($_POST["message"])); // Convert newlines (using enter in msg) to <br> for HTML and converts special characters to entities
} else {
    // Redirect back if accessed without submission
    header("Location: contact_us.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submission Received</title>
    <link rel="stylesheet" href="allcss.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #dceefb;
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }
        .confirmation-container {
            background: linear-gradient(135deg, #377be0 0%, #7e79d4 100%);
            text-align: center;
            min-height: 600px;
            min-width: 600px;
            padding: 30px 20px;
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .confirmation-container:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            font-size: 4rem;
            margin: 0;
            color: white;
        }
        .submitted-info {
            margin-top: 40px;
            color: white;
        }
        .submitted-info p {
            line-height: 2;
        }
        .label {
            font-weight: 600;
            font-size: 1.5rem;
            color: white
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h1>Thank you, your message has been submitted!</h1>
        <div class="submitted-info">
            <p><span class="label">Full Name:</span> <?= $name ?></p>
            <p><span class="label">Email Address:</span> <?= $email ?></p>
            <p><span class="label">Phone Number:</span> <?= $number ? $number : "N/A" ?></p>      
            <p><span class="label">Type of Inquiry:</span> <?= $inquiry ?></p>
            <p><span class="label">Message:</span><br><?= $message ?></p>
        </div>
    </div>
</body>
</html>