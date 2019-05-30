
<?php
session_start();
include('openconn.php');

if(!isset($_SESSION['ADMIN'])) {
	header('Location: AdminLogin.php');
  exit();
}

$queryUser = "SELECT * FROM `user` WHERE username= '".$_GET['user']."'";
$resultUser = mysqli_query($conn, $queryUser);
$user = mysqli_fetch_assoc($resultUser);

$queryGameId = "SELECT * FROM `user_game` WHERE username= '".$_GET['user']."'";
$resultGameId = mysqli_query($conn, $queryGameId);
$GameId = mysqli_fetch_assoc($resultGameId);

$queryStatus = "SELECT * FROM `game` WHERE id= '".$GameId['game_id']."'";
$resultStatus = mysqli_query($conn, $queryStatus);
$Status = mysqli_fetch_assoc($resultStatus);
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
    <h2 id="title">CITY FRONTIERS <strong>USER</strong></h2>
    <div>
      <a href="AdminLogOut.php">
        <span>LOG OUT</span>
      </a>
    </div>
  </header>

  <section id="canvas-loc">
    <canvas id="landing-canvas"></canvas>
  </section>

  <a id="return" href="AdminUsers.php">
    <span class="dark-bt"><strong>&#171;</strong> &nbsp; USERS</span>
  </a>

  <section id="admin-user-profile">
    <h4><?php echo strtoupper($user['username']); ?></h4>
    <h5>Live Game Status</h5>
    <div id="grid-board">
      <div id="grid-pop">
        <h6>Population</h6>
        <p><?php echo number_format($Status['population'], 0, '.', ' ') ?></p>
      </div>
      <div id="grid-hap">
        <h6>Happiness</h6>
        <p><?php if (intval($Status['happiness']) > 100){echo "100%";} else {echo $Status['happiness']."%";};?></p>
      </div>
      <div id="grid-mon">
        <h6>Money</h6>
        <p><?php echo number_format($Status['money'], 0, '.', ' ') ?></p>
      </div>
    </div>
    <h5>User Info</h5>
    <img src='<?php echo $user['profile_pic'];?>'>
    <h6>Username</h6>
    <p id="username"><?php echo $user['username'];?></p>
    <h6>Email</h6>
    <p><?php echo $user['email'];?></p>
    <h6>Name</h6>
    <p><?php echo $user['first_name']." ".$user['last_name'];?></p>
    <h6>Sex</h6>
    <p><?php if($user['sex'] == "M"){echo "Masculine";}else{echo "Feminine";};?></p>
    <h6>Birthday</h6>
    <p><?php echo $user['birthday'];?></p>
    <h6>Country</h6>
    <p><?php echo $user['country'];?></p>
    <br>
    <br>
  </section>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawAdmin.js"></script>
  <script>

    function adminUpdateStatus(user) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("grid-board").innerHTML = this.responseText;
        };
      };
      xmlhttp.open("GET", "userProfileRefresh.php?user=" + user, true);
      xmlhttp.send();
    };

    setInterval (function(){
      user = $("#username").html();
      adminUpdateStatus(user);
    }, 1000);
  </script>
</body>
</html>
