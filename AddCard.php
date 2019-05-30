
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
    <h2 id="title">CITY FRONTIERS <strong>CREATE CARD</strong></h2>
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
    <h4>CREATE CARD</h4>
    <form class="admin-forms" id="add-card-form" action="AddCardAction.php" method="POST" enctype="multipart/form-data">
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
      <h5>Name</h5>
      <input type="text" name="name">
      <h5>Description</h5>
      <input type="text" name="description">
      <h5>attribute</h5>
      <select name="attribute">
        <option value='population'>&nbsp population</option>
        <option value='happiness'>&nbsp happiness</option>
        <option value='money'>&nbsp money</option>
      </select>
      <h5>power</h5>
      <div class="show-input">
        <input type="range" name="power" min="0" max="1000" value="1" step="1">
        <h6 id="power-input">1</h6>
      </div>
      <h5>rarity</h5>
      <div class="show-input">
        <input type="range" name="rarity" min="0" max="0.5" value="0.001" step="0.0001">
        <h6 id="rarity-input">0.001</h6>
      </div>
      <h5>price</h5>
      <div class="show-input">
        <input type="range" name="price" min="0" max="10000" value="1" step="1">
        <h6 id="price-input">1</h6>
      </div>
      <br>
      <br>
      <h5>Upload Card Image</h5>
      <input type="file" name="uploadImg" accept="image/*">

      <h5>Upload 3D Model</h5>
      <input type="file" name="uploadObj" accept="*">
      
    </form>
    <span id="down-bt" class="dark-bt">CREATE</span>
  </section>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawAdmin.js"></script>
</body>
</html>
