
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
  <link rel="stylesheet" href="css/adminCollections.css">
</head>
<body>

  <div id="load-block"></div>

  <header>
    <h2 id="title">CITY FRONTIERS <strong>COLLECTIONS</strong></h2>
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

  <section id="admin-collections">
    <h4>COLLECTIONS</h4>
    <section id="coll-to-admin">
    <?php
      $query = "SELECT * FROM `collection`";
      $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
            echo "<section class='coll' id='".$row['name']."'>
                    <div class='back-card'></div>
                    <div class='middle-card'></div>
                    <div class='front-card' style='background-color: ".$row['color'].";'>
                        <h3>".$row['name']."</h3> 
                        <img src='media/card_pics/".$row['icon']."'>
                        <p>".$row['description']."</p>
                    </div>
                </section>";
          };
        } else {
            echo "<p class='blank-window'>No collections *Fix*</p>";
        }

        mysqli_close($conn);
      ?>
    </section>
  </section>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawAdmin.js"></script>
</body>
</html>
