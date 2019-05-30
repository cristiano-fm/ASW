<?php
session_start();
session_destroy();
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
  <link rel="stylesheet" href="css/login.css">
</head>
<body>

  <div id="load-block"></div>

  <section id="canvas-loc">
    <canvas id="landing-canvas"></canvas>
  </section>

  <section id="login">
    <h2>CITY FRONTIERS</h2>
    <h3>OPS!</h3>
    <img src="./media/error.png">
    <p>Something went wrong. Please try again in a moment.</p>
    <div>
      <a href="Landing.php">
        <span class="dark-bt">RETURN</span>
      </a>
    </div>
  </section>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawAdmin.js"></script>
</body>
</html>
