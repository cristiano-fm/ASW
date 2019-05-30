
<?php
session_start();
include('openconn.php');

if(!isset($_SESSION['ADMIN'])) {
	header('Location: AdminLogin.php');
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
  <link rel="stylesheet" href="css/adminUsers.css">
</head>
<body>

  <div id="load-block"></div>

  <header>
    <h2 id="title">CITY FRONTIERS <strong>CREATE COLLECTION</strong></h2>
    <div>
      <a href="AdminLogOut.php">
        <span>LOG OUT</span>
      </a>
    </div>
  </header>

  <section id="canvas-loc">
    <canvas id="landing-canvas"></canvas>
  </section>

  <a id="return" href="AdminPanel.php">
    <span class="dark-bt"><strong>&#171;</strong> &nbsp; PANEL</span>
  </a>

  <section id="admin-users">
    <h4>CREATE COLLECTION</h4>
    <form class="admin-forms" id="create-coll-form" action="CreateCollAction.php" method="POST" enctype="multipart/form-data">
      <h5>Name</h5>
      <input type="text" name="name">
      <h5>Description</h5>
      <input type="text" name="description">
      <h5>Color</h5>
      <input type="color" name="color">
      <br>
      <br>
      <h5>Upload Collection Image</h5>
      <input type="file" name="upload" accept="image/*">
    </form>
    <span id="down-bt" class="dark-bt">CREATE</span>
  </section>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawAdmin.js"></script>
</body>
</html>
