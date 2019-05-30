
<?php
session_start();

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
  <link rel="stylesheet" href="css/adminPanel.css">
</head>
<body>

  <div id="load-block"></div>

  <header>
    <h2 id="title">CITY FRONTIERS</h2>
    <div>
      <a href="AdminLogOut.php">
        <span>LOG OUT</span>
      </a>
    </div>
  </header>

  <section id="canvas-loc">
    <canvas id="landing-canvas"></canvas>
  </section>

  <section id="admin-panel">
    <h4>ADMIN PANEL</h4>
    <section id="grid">
      <div id="administration">
        <h5>Users Management</h5>
        <a href="AdminUsers.php">
          <span class="dark-bt">VIEW USERS</span>
        </a>
        <a href="CardGiveaway.php">
        <span>Card Giveaway</span>
        </a>
        <span>Delete User</span>
      </div>
      <div id="management">
        <h5>Game Management</h5>
        <a href="AdminCollections.php">
          <span class="dark-bt">VIEW COLLECTIONS</span>
        </a>
        <a href="CreateColl.php">
          <span>Create New Collection</span>
        </a>
        <a href="AddCard.php">
          <span>Add Card to Collection</span>
        </a>
      </div>
    </section>
  </section>

  <script src="js/three.js"></script>
  <script src="js/drawAdmin.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
