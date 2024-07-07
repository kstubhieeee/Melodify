<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="main-logo-modified.png">
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: black;
            color: white;
            line-height: 1.6;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container styles */
        .container {
            background: #1db954;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            padding: 40px;
            text-align: center;
            transition: transform 0.3s ease;
            
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 20px 10px white;
        }

        /* Header/Navbar styles */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
             background-color: #1c1c1c;
            z-index: 1000;
            padding: 10px 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
        }

        .logo img {
            width: 30px; /* Adjust the size as needed */
            margin-right: 10px; /* Add spacing between logo and text */
        }

        .logo-text {
            font-size: 1.5em;
            font-weight: bold;
        }

        .nav-links {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .nav-links li {
            margin-right: 20px;
        }

        .nav-links li a {
            text-decoration: none;
            color: white;
            transition: color 0.3s ease;
        }

        .nav-links li a:hover {
            color: #feb47b;
        }

        /* Button styles */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1db954;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .button:hover {
            background-color: green;
        }

        /* Content styles */
        .content {
            text-align: center;
            margin-top: 100px;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 40px;
        }

        footer{
            position: relative;
            margin-top: 500px;
        }


        .pfp{
            display: inline-block;
            margin-right: 40px;
        }
        .pfp img{
            width: 150px;
            border-radius: 80px;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <a href="#" class="logo">
                <img src="main-logo-modified.png" alt="Logo" style="width:50px;"><p style="color:white; font-weight:600; margin-top:30px; margin-left:6px; font-size:30px; ">Melodify</p>
            </a>
            <div class="auth-buttons">
                <a href="./signup.php" class="button">Sign Up</a>
                <a href="./signin.php" class="button">Sign In</a>
            </div>
        </div>
    </header>

    <footer>
       <p style="font-size:30px; margin-left:95px; font-weight:600;">Created by</p>  
       <div class="pfp">
        <img src="./pfp/kaustubh.jpg" alt=""> 
       <a href="https://github.com/kstubhieeee" style="color:white;"><p style="font-size:25px; margin-left:23px; font-weight:600;">Kaustubh</p></a> 
        </div>
        <div class="pfp">
        <img src="./pfp/faiz.jpg" alt="">
      <a href="https://github.com/faizzz11" style="color:white;">  <p style="font-size:25px; margin-left:50px; font-weight:600;">Faiz</p></a>
       </div>
    </footer>
    
</body>
</html>