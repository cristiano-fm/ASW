
<?php
session_start();

if(isset($_SESSION['ADMIN'])) {
	header('Location: AdminPanel.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>City Frontiers ADMIN</title>
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
    <h3>ADMINISTRATORS</h3>
    <h4>Sign in</h4>
    <form id="admin-login-form" action="AdminLoginAction.php" method="POST">
      <p>User Name</p>
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
    <div>
      <span class="dark-bt" id="admin-login-submit">LOGIN</span>
    </div>
  </section>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawAdmin.js"></script>
</body>
</html>
