<?php
// index.php
session_start();
$loggedIn = isset($_SESSION['user_id']);
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
        .login-strip {
            background-color: #f4f4f4;
            color: #333;
            padding: 15px;
            text-align: center;
        }
        .container {
            padding: 20px;
        }
        .login-modal, .signup-modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .form {
            display: flex;
            flex-direction: column;
        }
        .form label {
            margin-bottom: 5px;
        }
        .form input {
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form button {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form button:hover {
            background-color: #555;
        }
        .modal-footer {
            text-align: center;
            margin-top: 10px;
        }
        .modal-footer a {
            color: #1a0dab;
            text-decoration: none;
        }
        .modal-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php if ($message == 'login_required'): ?>
        <script>
          alert('To open the news page, you need to log in.');
        </script>
    <?php endif; ?>

    <?php if ($message == 'invalid_login'): ?>
        <script>
          alert('Either your password or Username is Invalid');
        </script>
    <?php endif; ?>
    
    <!-- Login Modal -->
    <div id="loginModal" class="login-modal">
        <div class="modal-content">
            <span class="close" onclick="closeLoginModal()">&times;</span>
            <form class="form" method="POST" action="login.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </form>
            <div class="modal-footer">
                <p>Don't have an account? <a href="#" onclick="openSignupModal()">Sign up now</a>.</p>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div id="signupModal" class="signup-modal">
        <div class="modal-content">
            <span class="close" onclick="closeSignupModal()">&times;</span>
            <form class="form" method="POST" action="register.php">
                <label for="new-username">Username:</label>
                <input type="text" id="new-username" name="username" required>
                <label for="new-password">Password:</label>
                <input type="password" id="new-password" name="password" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>

    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="news.php">News</a>
        <a href="contact.php">Contact</a>
        <a href="#">About</a>
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

    <div class="body">
        <div class="section1">
            <img class="image1" src="images/img1.jpg" />
            <div class="bodyDiv1">
                <h2>Take a look into our street</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam
                    voluptas adipisci at explicabo iste facilis consectetur expedita
                    error ipsam natus inventore quisquam aliquam consequatur aut
                    repellat, deleniti aspernatur incidunt, tempore nobis, commodi
                    numquam exercitationem. Exercitationem quae esse, sit dolorum in
                    facere illo unde. Provident ex similique voluptatibus qui pariatur,
                    ipsam cumque modi ut nemo ipsum nihil deserunt tenetur velit soluta
                    porro inventore. Illum, ad tempore? Ab illo laboriosam laborum
                    deleniti iusto provident labore ullam vero.
                </p>
                <img class="image2" src="images/img2.jpg" alt="" />
            </div>
        </div>
        <p class="divText1">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel numquam
            laboriosam quam repellat sit accusantium, dignissimos eveniet vero
            distinctio ducimus officiis, iste reiciendis necessitatibus perferendis
            quo voluptatum nulla provident cum earum? Facere laudantium veritatis
            alias corporis totam, ipsa repellendus nisi ea eligendi rerum. Quam
            autem rerum nulla a itaque aperiam ipsam commodi, cumque fugit, qui
            temporibus cupiditate maiores corporis, doloremque facilis ab veniam
            iusto totam minima ipsum id voluptates! Soluta sit hic dolorem repellat
            velit eum, tempora consequatur natus aut illum culpa aliquid in sed
            deserunt similique omnis vero fuga voluptates ipsam nihil expedita illo
            nulla suscipit! Nisi, sequi obcaecati?
        </p>
    </div>

    <div class="long-image-body">
        <img src="images/img-3.jpg" class="long-image" alt="" />
    </div>

    <div class="section2">
        <img src="images/img4.jpg" class="section2-image" alt="" />
        <div class="section2-body">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta id
                molestiae, accusamus magni veritatis iusto expedita autem quo ipsa
                necessitatibus adipisci voluptas possimus corrupti reprehenderit illo
                aperiam aliquid dolorum consequuntur blanditiis dolorem assumenda.
                Neque rem eaque adipisci architecto! Ex vitae officia perferendis et
                similique, voluptates fuga quis repellat aliquam, impedit consequuntur
                in reprehenderit officiis dicta amet vel ipsum corrupti! Et accusamus
                pariatur suscipit quae veritatis beatae deserunt aliquid ex eveniet
                voluptates in porro delectus quasi, dolorem cumque odit iure non atque
                animi voluptatibus at ut minus. Obcaecati ratione nostrum molestias
                beatae dolorum libero hic, harum culpa repellat, veritatis nam impedit
                nihil corporis at in perferendis eveniet, est odio officia labore ex!
                Tempora doloribus soluta nostrum. Obcaecati, ullam distinctio!
                Blanditiis eos consequatur suscipit assumenda delectus expedita aut ex
                necessitatibus consectetur aliquid!
            </p>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }

        function openLoginModal() {
            document.getElementById('loginModal').style.display = 'block';
        }
        function closeLoginModal() {
            document.getElementById('loginModal').style.display = 'none';
        }

        function openSignupModal() {
            closeLoginModal();
            document.getElementById('signupModal').style.display = 'block';
        }
        function closeSignupModal() {
            document.getElementById('signupModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('loginModal')) {
                closeLoginModal();
            }
            if (event.target == document.getElementById('signupModal')) {
                closeSignupModal();
            }
        }
    </script>
</body>
</html>
