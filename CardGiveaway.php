
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
    <h2 id="title">CITY FRONTIERS <strong>CARD GIVEAWAY</strong></h2>
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
    <h4>CARD GIVEAWAY</h4>
    <form class="admin-forms" id="giveaway-form" action="CardGiveAwayAction.php" method="POST">
      <h5>Username</h5>
      <select name="username">
        <?php
        $query = "SELECT username FROM `user`";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
            if ($row['username'] != 'ADMIN'){
              echo "<option value='".$row['username']."'>&nbsp ".$row['username']."</option>";
            };
          };
        };
        ?>
      </select>
      <h5>Collection</h5>
      <select name="collection">
        <?php
        $query = "SELECT * FROM `collection`";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value='".$row['name']."'>&nbsp ".$row['name']."</option>";
          };
        };
        ?>
      </select>
      <h5>Card</h5>
      <select name="card">
        <?php
        $query = "SELECT * FROM `card`";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value='".$row['name']."'>&nbsp ".$row['name']."</option>";
          };
        };
        ?>
      </select>
      <h5 style="margin-top: 50px">Insert administration password to confirm</h5>
      <input style="width: 35%" type="password" name="password">
    </form>
    <span id="down-bt" class="dark-bt">GIVEAWAY</span>
  </section>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawAdmin.js"></script>
</body>
</html>
