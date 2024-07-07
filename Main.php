<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:signin.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify - Your favourite music is here</title>
    <link rel="icon" href="main-logo-modified.png">
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.profile-icon {
    font-size: 24px; /* Adjust the size as needed */
    margin-right: 8px;
}


body {
    background-color: #1c1c1c;
    color: #ffffff;
    font-family: 'Varela Round', sans-serif;
}

nav {
    font-family: 'Ubuntu', sans-serif;
    background-color: #1db954;
    color: white;
    padding: 10px;
}

nav ul {
    display: flex;
    align-items: center;
    list-style-type: none;
    justify-content: space-between;
}

nav ul li {
    padding: 0 12px;
}

.brand img {
    width: 44px;
    padding: 0 8px;
}

.brand {
    display: flex;
    align-items: center;
    font-weight: bolder;
    font-size: 1.3rem;
}

.main {
    display: flex;
}

.sidebar {
    width: 280px;
    background-color: black;
    padding: 20px;
    color: white;
}

.sidebar a {
    color: white;
    text-decoration: none;
}

.sidebar .nav-link.active {
    background-color: #1db954;
}

.container {
    flex-grow: 1;
    min-height: 72vh;
    background-color: #1c1c1c;
    color: white;
    font-family: 'Varela Round', sans-serif;
    margin: 23px auto;
    border-radius: 12px;
    padding: 34px;
}

.bottom {
    position: sticky;
    bottom: 0;
    height: 135px;
    background-color: black;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.icons {
    margin-top: 14px;
}

.icons i {
    cursor: pointer;
}

#myProgressBar {
    width: 80vw;
    cursor: pointer;
}

.songItemContainer {
    margin-top: 74px;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 50px;
}

.songItem {
    height: 300px;
    width: 200px;
    display: flex;
    flex-direction: column;
    background-color: #1db954;
    color: black;
    margin: 12px 0;
    justify-content: center;
    align-items: center;
    border-radius: 15px;
    text-align: center;
}

.songItem img {
    width: 150px;
    margin: 16px 0;
    border-radius: 34px;
}

.songName {
    margin: 8px 0;
    color: white;
}

.timestamp {
    margin: 8px 0;
    color: white;
}

.timestamp i {
    cursor: pointer;
}

.songInfo {
    position: absolute;
    left: 10vw;
    font-family: 'Varela Round', sans-serif;
}

.songInfo img {
    opacity: 0;
    transition: opacity 0.4s ease-in;
}

@media only screen and (max-width: 1500px) {
    .songItemContainer {
        margin-top: 74px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 50px;
    }
}

@media only screen and (max-width: 1100px) {
    .songItemContainer {
        margin-top: 74px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
    }
}

@media only screen and (max-width: 600px) {
    .songItemContainer {
        margin-top: 74px;
        display: grid;
        grid-template-columns: 1fr;
        gap: 50px;
    }
}

.upd-btns{
    background-color: #1db954;
    padding: 20px;
    border-radius: 20px;
    margin-top: 30px;
}

#masterSongName{
    font-size: 25px;
    font-weight: 600px;
}

.upd-btns input{
    border: none;
    padding: 5px;
}

.upd-btns button{
    border: none;
    border-radius: 10px;
    padding: 5px;
}

 
    .search-bar {
        display: flex;
        align-items: center;
        margin-left: auto;
    }

    .search-bar input {
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .search-bar button {
        padding: 5px 10px;
        border: none;
        background-color: #1c1c1c;
        color: white;
        border-radius: 15px;
        margin-left: 5px;
        cursor: pointer;
    }

    .songItem {
        display: flex;
        align-items: center;
        padding: 10px;
    }

    

    .songName {
        font-size: 20   px;
    }
</style>

<body>
   <nav>
        <ul>
            <li class="brand"><img src="./main-logo-modified.png" alt="Melodify" style="width: 70px;"> Melodify</li>
            <div style="display: flex;">
               
                <li style="background-color:#1c1c1c; padding:8px;  border-radius: 25px;">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="user.png" alt="" style="height:32px; width:32px; border-radius:20px; margin-right:15px;">
                            <strong><?php echo $_SESSION['username'] ?></strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">New playlist</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                        </ul>
                    </div>
                </li>
                <li class="search-bar">
                    <input type="text" id="searchInput" style="border-radius: 20px;" placeholder="Search songs...">
                    <button id="searchButton">Search</button>
                </li>
            </div>
        </ul>
    </nav>
    <div class="main">
        <div class="sidebar">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Music</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">Playlists</a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">Albums</a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">Artists</a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">Genres</a>
                </li>
            </ul>
            <hr>
         

        </div>

        <div class="container">
            <div class="songList">
                <h1 style="font-size:50px; font-weight:800;">Trending Songs of 2024</h1>
                <div class="songItemContainer">
                    <div class="songItem">
                        <img src="./songIMG/1.jpg" alt="1">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">03:50 <i id="0" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/2.jpg" alt="2">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">02:33 <i id="1" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/3.jpg" alt="3">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">04:33 <i id="2" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/4.jpg" alt="4">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">04:27 <i id="3" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/5.jpg" alt="5">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">03:34 <i id="4" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/6.jpg" alt="6">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">03:28 <i id="5" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/7.jpg" alt="7">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">04:33 <i id="6" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/8.jpg" alt="8">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">03:50 <i id="7" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/9.jpg" alt="9">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">03:28 <i id="8" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/10.jpg" alt="10">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">04:27 <i id="9" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/11.jpg" alt="11">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">04:27 <i id="10" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/12.jpg" alt="12">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">04:27 <i id="11" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/13.jpg" alt="13">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">04:27 <i id="12" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/14.jpg" alt="14">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">04:27 <i id="13" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/15.jpg" alt="15">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">04:27 <i id="14" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/16.jpg" alt="16">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">04:27 <i id="15" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                </div>
                <div class="upd-btns">
                    <h1 style="margin-bottom:30px; display:flex; justify-content:center;">Upload a custom song</h1>
                    
                Song:  <input type="file" id="uploadSong" accept="audio/*">
                Image:  <input type="file" id="uploadImage" accept="image/*">
                <input type="text" id="songNameInput" placeholder="Enter song name">
                <button id="addSongButton">Add Song</button>
                </div>
            </div>
            <div class="songBanner"></div>
        </div>
    </div>

    <div class="bottom">
        <input type="range" name="range" id="myProgressBar" min="0" value="0" max="100">
        <div class="icons">
            <i class="fas fa-3x fa-step-backward" id="previous"></i>
            <i class="far fa-3x fa-play-circle" id="masterPlay"></i>
            <i class="fas fa-3x fa-step-forward" id="next"></i>
        </div>
        <div class="songInfo">
            <img src="./playing.gif" width="42px" alt="" id="gif"> <span id="masterSongName">Blinding Lights</span>
        </div>
    </div>
    <script src="./script.js"></script>
    <script src="https://kit.fontawesome.com/26504e4a1f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
