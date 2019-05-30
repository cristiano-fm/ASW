<?php
session_start();

if (!isset($_SESSION['step'])){
  header('Location: RegisterStep1.php');
  exit();
} else {
  if($_SESSION['step'] != 3){
    header('Location: RegisterStep1.php');
    exit();
  };
};
$_SESSION['step'] = 3;
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
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
  <div id="load-block"></div>

  <section id="canvas-loc">
      <canvas id="landing-canvas"></canvas>
  </section>

  <div id="step3">
    <section class="box">
      <h2><a href="logOut.php">CITY FRONTIERS</a></h2>
      <h4>Register</h4>
      <p class="step-info">Last step - Profile picture</p>
      <img id="profile-pic" src="./media/default_pic.jpg">
      <form id="form-3" action="step3Action.php" method="POST" enctype="multipart/form-data">
        <input class="inputfile" id="file" type="file" name="fileToUpload" accept="image/*">
        <label for="file">Upload Picture</label>
      </form>
      <p id="bottom-info">This step is not obligatory</a>
      <div>
        <a href="redirectToStep2.php">
          <span class="back-bt" id="back-to-2">BACK</span>
        </a>
        <span class="dark-bt" id="SUBMIT">REGISTER</span>
      </div>
    </section>
  </div>
  
  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawRegister3.js"></script>
</body>
</html>
