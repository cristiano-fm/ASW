<?php
session_start();
if(isset($_SESSION['username'])) {
	header('Location: logOut.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City Frontiers</title>
    <link rel="icon" type="image/png" href="./media/icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div id="load-block"></div>

    <section id="canvas-loc">
        <canvas id="landing-canvas"></canvas>
    </section>

    <section id="landing-page">
        <h1>CITY FRONTIERS</h1>
        <div>
            <div>
                <a href="#anchor" id="go-to-about">
                  <span id="about-bt">ABOUT</span>
                </a>
                <a href="Login.php">
                    <span class="dark-bt">LOGIN</span>
                </a>
                <a href="RegisterStep1.php">
                    <span>REGISTER</span>
                </a>
            </div>
        </div>
    </section>

    <header id="fading-header">
        <h2>CITY FRONTIERS</h2>
        <div>
            <a href="Login.php">
            <span>LOGIN</span>
            </a>
        </div>
    </header>

    <section id="intro">
        <section id="anchor">
        </section>
        <div>
            <h4>Collect cards to evolve your civilization and 
            push your city´s frontiers into outer space and beyond</h4>
            <img src="./media/icon.png">
        </div>
        <div>
            <img src="./media/icon.png">
            <h4>More Cards means more buildings and more buildings means more money</h4>
        </div>
        <div>
            <h4>Chat with your friends and evolve your cities together</h4>
            <img src="./media/icon.png">
        </div>
    </section>
    <section id="about">
        
        <h2>What is City Frontiers?</h2>
        <p>this is a place holder. it holds place for things
            that are not useless like this placeholder.
            this is a place holder. it holds place for things
            that are not useless like this placeholder.</p>
        
        <h2>How do you play it?</h2>
        <p>this is a place holder. it holds place for things
            that are not useless like this placeholder.
            this is a place holder. it holds place for things
            that are not useless like this placeholder.</p>
        <div>
            <a href="Login.php">
              <span class="dark-bt">START PLAYING</span>
            </a>
        </div>
    </section>

    <footer>
        <p id="sp">&copy; Copyright. All rights reserved</p>
        <p>Created by Alexandre Ramos, Cristiano Matias and João Felgar</p>
        <p><a>Privacy Policy</a> • <a>Terms of Use</a></p>
    </footer>


    <script src="js/main.js"></script>
    <script src="js/three.js"></script>
    <script src="js/draw.js"></script>
    <script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
        document.getElementById("fading-header").style.opacity = 1;
        } else {
        document.getElementById("fading-header").style.opacity = 0;
        }
        prevScrollpos = currentScrollPos;
    }
  </script>
</body>
</html>
