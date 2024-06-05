<?php
// index.php
session_start();
$loggedIn = isset($_SESSION['user_id']);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            width: 60%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .contact-form {
            display: flex;
            flex-direction: column;
        }
        .contact-form label {
            margin-bottom: 5px;
        }
        .contact-form input, .contact-form textarea {
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        .contact-form button {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: #555;
        }
        .qna {
            margin-top: 20px;
        }
        .qna h2 {
            margin-bottom: 10px;
            color: #333;
        }
        .qna dt {
            font-weight: bold;
            margin-top: 10px;
        }
        .qna dd {
            margin-top:5px;
            margin-left: 20px;
            margin-bottom: 10px;
        }
        .login-strip {
            background-color: #f4f4f4;
            color: #333;
            padding: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="topnav">
        <a href="index.php">Home</a>
        <a href="news.php">News</a>
        <a href="#">Contact</a>
        <a href="#about">About</a>
        <?php if ($loggedIn): ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <?php if (!$loggedIn): ?>
        <div class="login-strip">
            <p>It seems you haven't logged in. <a href="#" onclick="openLoginModal()">Log in now</a>.</p>
        </div>
    <?php endif; ?>

    <div class="container">
        <h1>Contact Us</h1>
        <form class="contact-form" method="POST" action="send_message.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Send Message</button>
        </form>

        <div class="qna">
            <h2>Frequently Asked Questions</h2>
            <dl>
                <dt>What is this website about?</dt>
                <dd>This website provides users with up-to-date news articles and requires users to log in for a personalized experience.</dd>
                <dt>How do I log in?</dt>
                <dd>You can log in by clicking on the login button on the top right corner of the homepage and entering your credentials.</dd>
                <dt>How can I sign up?</dt>
                <dd>Click on the login button, then follow the link to sign up if you don't have an account.</dd>
                <dt>Who can I contact for support?</dt>
                <dd>You can use the contact form above to reach out to us with any questions or concerns.</dd>
            </dl>
        </div>
    </div>
</body>
</html>
