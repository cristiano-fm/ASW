
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

echo "<div id='grid-pop'>
        <h6>Population</h6>";
        
echo "<p>".number_format($Status['population'], 0, '.', ' ')."</p>";
echo "</div>
      <div id='grid-hap'>
        <h6>Happiness</h6>
        <p>";
if (intval($Status['happiness']) > 100){
  echo "100%";
} else {
  echo $Status['happiness']."%";
};
echo "</p>
      </div>
      <div id='grid-mon'>
        <h6>Money</h6>
        <p>";
echo number_format($Status['money'], 0, '.', ' ');
echo "</p>
    </div>";
?>