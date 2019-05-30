
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
    <h2 id="title">CITY FRONTIERS <strong> <?php echo strtoupper($_GET['coll']); ?> </strong></h2>
    <div>
      <a href="AdminLogOut.php">
        <span>LOG OUT</span>
      </a>
    </div>
  </header>

  <section id="canvas-loc">
    <canvas id="landing-canvas"></canvas>
  </section>

  <a id="return" href="AdminCollections.php">
    <span class="dark-bt"><strong>&#171;</strong> &nbsp; COLLECTIONS</span>
  </a>

  <section id="admin-collections">
    <h4><?php echo strtoupper($_GET['coll']); ?></h4>
    <section id="coll-to-admin">
      <?php
        $queryColor = "SELECT `color` FROM `collection` WHERE `name`='".$_GET['coll']."'";
        $resultColor = mysqli_query($conn, $queryColor);
        $rowColor = mysqli_fetch_assoc($resultColor);

        $queryCard = "SELECT * FROM `card` WHERE `collection`='".$_GET['coll']."'";
        $resultCard = mysqli_query($conn, $queryCard);
        while($rowCard = mysqli_fetch_assoc($resultCard)){
          echo "<section class='card'>
              <section class='card-inner'>
                  <section class='card-front' style='background-color: ".$rowColor['color'].";'>
                      <div>
                          <h3>".$rowCard['name']."</h3>
                      </div>
                      <img src='media/card_pics/".$rowCard['pic']."'>
                      <p>".$rowCard['description']."</p>
                      <img class='card-icon' src='media/".$rowCard['attribute'].".png'>
                      <p class='card-power'>+".$rowCard['power']."</p>
                  </section>
                  <section class='card-back' style='background-color: ".$rowColor['color'].";'>
                      <div>
                          <h3>".$rowCard['name']."</h3>
                      </div>
                      <span class='delete-bt'> DELETE</span> 
                      <p class='disclamer'>ATTENTION! this action will permanently delete this card</p>
                  </section>
              </section>
            </section>";
        };
        mysqli_close($conn);
      ?>
    </section>
  </section>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawAdmin.js"></script>
</body>
</html>
