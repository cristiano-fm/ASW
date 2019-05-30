
<?php
session_start();

if(isset($_SESSION['username'])) {
	header('Location: game/Home.php');
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
  <link rel="stylesheet" href="css/login.css">
</head>
<body>

  <div id="load-block"></div>

  <section id="canvas-loc">
    <canvas id="landing-canvas"></canvas>
  </section>

  <section id="login">
    <h2>CITY FRONTIERS</h2>
    <h4>Sign in</h4>
    <form id="login-form" action="loginAction.php" method="POST">
      <p>User Name or Email</p>
      <input type="text" name="id" required>
      <p>Password</p>
      <input type="password" name="psw" required>
    </form>
    <?php
      if(isset($_SESSION['nao_autenticado'])):
    ?>
      <p id="error-msg">Invalid password or username</p>
    <?php
      endif;
      unset($_SESSION['nao_autenticado']);
    ?>
    <p id="register"> Not registered yet? <a href="RegisterStep1.php">Register here</a>
    <div>
      <a href="Landing.php">
        <span id="back-bt">BACK</span>
      </a>
      <a id="login-submit">
        <span class="dark-bt">LOGIN</span>
      </a>
    </div>
  </section>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawLogin.js"></script>
</body>
</html>
