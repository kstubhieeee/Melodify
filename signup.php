<!DOCTYPE html>
<html lang="en">

<head>
    
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="main-logo-modified.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <title>Sign Up Page</title>

</head>
<style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color:#1db954;
}

.container {
    padding-top: 100px;
    padding-bottom: 100px;
    padding-left: 100px;
    padding-right: 100px;
    border-radius: 20px;
    background-color: #212121;
    opacity: 100%;
}

h1 {
    font-family: "Nunito", sans-serif;
    color: #1db954;
    font-size: 50px;
}

label {
    margin-top: 1px;
    display: grid;
    font-size: large;
    font-weight: bold;
    font-family: "Nunito", sans-serif;
    color: #1db954;
}



input {
    margin-bottom: 2px;
    display: grid;
    height: 40px;
    width: 260px;
    font-family: "Nunito", sans-serif;
    border-radius: 13px;
    border: none;
}

.profile-img {
    width: 32px;
    height: 32px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 8px;
}


button {
    height: 40px;
    width: 100px;
    border-radius: 40px;
    border: none;
    cursor: pointer;
    margin-left: 80px;
    margin-top: 30px;
    font-family: "Nunito", sans-serif;
    font-size: 15px;
   
}

.sub-btn {
    margin-top: 30px;
     background-color: #1db954;
}
</style>
<body>
    <div class="container">
        <h1>Sign up Page</h1>
        <form method="POST">
            <label  for="username">Userame:</label> <br>
            <input id="username" name="username" placeholder="Username" type="text" required> <br>
            <label for="password">Password:</label> <br>
            <input name="password" id="password" placeholder="Password" type="password" required>
            <input class="sub-btn" type="submit" value="Sign up">
        </form>
        <?php
include 'db.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $_POST['username'];
    $password =password_hash($_POST['password'],PASSWORD_BCRYPT);
    $sql = "INSERT INTO users( username , password) VALUES ('$username','$password')";

    if($conn->query($sql)==true){
       header("Location: Main.php");
               

    }
    else{
        echo "Error: ".$sql."<br>".$conn->error;
    }
    $conn->close();
}
?> 
    </div>
</body>

</html>