<?php
session_start();

if(isset($_SESSION['username'])) {
	header('Location: game/Home.php');
  exit();
}

if (!isset($_SESSION['step'])){
  $_SESSION['errorMessage'] = "Already registered? <a href='Login.php'>Login here</a>";
} else{
  if($_SESSION['step'] != 1){
    $_SESSION['errorMessage'] = "Already registered? <a href='Login.php'>Login here</a>";
  };
}
$_SESSION['step'] = 1;
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

  <div id="step-">
    <section class="box">
      <h2><a href="logOut.php">CITY FRONTIERS</a></h2>
      <h4>Register</h4>
      <p class="step-info">First step - Login info</p>
      <form id="form-1" action="step1Action.php" method="POST">
        <p>User Name</p>
        <input type="text" name="nickname" type = "text" value="<?php if(isset($_SESSION['nickname'])){echo $_SESSION['nickname'];}?>" required>
        <p>Email</p>
        <input type="text" name="email" type = "text" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>"  required>
        <div>
          <div>
            <p>Password</p>
            <input type="password" name="password" required>
          </div>
          <div>
            <p>Confirm</p>
            <input type="password" name="confirm" required>
          </div>
        </div>
      </form>
      <p id="bottom-info" class="dropdown <?php if ($_SESSION['errorMessage'] != "Already registered? <a href='Login.php'>Login here</a>") echo 'wrong-input'; ?> ">
        <?php
          if(isset($_SESSION['errorMessage'])){
            echo $_SESSION['errorMessage'];
            $_SESSION['errorMessage'] = "Already registered? <a href='Login.php'>Login here</a>";
          }
        ?>
      </p>
      <div>
        <a href="logOut.php">
          <span class="back-bt">BACK</span>
        </a>
        <span class="dark-bt" id="go-to-2">NEXT</span>
      </div>
    </section>
  </div>
  
  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawRegister1.js"></script>
</body>
</html>
