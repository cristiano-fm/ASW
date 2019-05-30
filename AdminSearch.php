
<?php
session_start();
include('openconn.php');

if(!isset($_SESSION['ADMIN'])) {
	header('Location: AdminLogin.php');
  exit();
}

if(empty($_POST['target']) || empty($_POST['search'])) {
  echo $_POST['target'] . $_POST['search'];
	//header('Location: AdminUsers.php');
	exit();
} else if ($_POST['target'] == "card"){
  $search = mysqli_real_escape_string($conn, $_POST['search']);
  $query = "SELECT * FROM `game_cards` as GC, `user_game` as UG, `user` as U WHERE GC.name = '".$search."' AND GC.game_id = UG.game_id AND UG.username = U.username";
  $result = mysqli_query($conn, $query);

} else if ($_POST['target'] == "collection"){
  $search = mysqli_real_escape_string($conn, $_POST['search']);
  $query = "SELECT * FROM `game_cards` as GC, `user_game` as UG, `user` as U WHERE GC.collection = '".$search."' AND GC.game_id = UG.game_id AND UG.username = U.username GROUP BY U.username";
  $result = mysqli_query($conn, $query);

} else{
  $target = mysqli_real_escape_string($conn, $_POST['target']);
  $search = mysqli_real_escape_string($conn, $_POST['search']);
  $query = "SELECT * FROM `user` WHERE " .$target. "= '" .$search. "'";
  $result = mysqli_query($conn, $query);
};
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
    <h2 id="title">CITY FRONTIERS <strong>USERS</strong></h2>
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
    <span class="dark-bt"><strong>&#171;</strong> &nbsp; RETURN</span>
  </a>

  <div id="search-box">
    <img id="search" src="./media/search.png">
    <img id="close" src="./media/close.png">
    <form id="search-form" action="AdminSearch.php" method="POST">
      <select name="target">
        <option value="username" selected="selected">&nbsp Username</option>
        <option value="email">&nbsp Email</option>
        <option value="first_name">&nbsp First name</option>
        <option value="last_name">&nbsp Last name</option>
        <option value="country">&nbsp Country</option>
        <option value="district">&nbsp District</option>
        <option value="county">&nbsp County</option>
        <option value="age">&nbsp Age</option>
        <option value="card">&nbsp Card</option>
        <option value="collection">&nbsp Collection</option>
      </select>
      <input type="text" name="search">
    </form>
  </div>

  <section id="admin-users">
    <h4><?php echo "<strong style='text-transform: uppercase'>" .$_POST['target']. "</strong>: ". $_POST['search'] ?></h4>

    <?php
    $count = false;
    if (mysqli_num_rows($result) > 0 && $_POST['target']!="age") {
      while($row = mysqli_fetch_assoc($result)){
        echo "<div class='"; if($count){echo "darker ";}; echo "user'>
              <img src='" .$row['profile_pic']. "'>
              <p> " .$row['username']. " • " .$row['first_name']. " " .$row['last_name']. " • " .$row['email']. " </h5>
              <div>
                <div class='view'>
                  <img src='./media/view.png'>
                </div>
                <div class='delete'>
                  <img src='./media/delete.png'>
                </div>
              </div>
            </div>";
        if($count){
          $count = false;
        } else{
          $count = true;
        };
      };
    } elseif($_POST['target']=="age"){
      echo "<p>This method of search is not available yet.</p>";
    } else {
      echo "<p id='big-p'>No users found</p>";
    }

    mysqli_close($conn);
    ?>
  </section>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawAdmin.js"></script>
</body>
</html>
