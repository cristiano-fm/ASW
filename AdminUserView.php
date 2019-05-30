
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
  <link rel="stylesheet" href="css/adminUsers.css">
</head>
<body>

  <div id="load-block"></div>

  <header>
    <h2 id="title">CITY FRONTIERS <strong>USERS</strong></h2>
    <div>
      <a href="AdminLogin.php">
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

  <div id="search-box">
    <img id="search" src="./media/search.png">
    <img id="close" src="./media/close.png">
    <form>
      <select>
        <option value="username" selected="selected">&nbsp Username</option>
        <option value="email">&nbsp Email</option>
        <option value="first_name">&nbsp First name</option>
        <option value="last_name">&nbsp Last name</option>
        <option value="birthday">&nbsp Birthday</option>
        <option value="country">&nbsp Country</option>
        <option value="district">&nbsp District</option>
        <option value="county">&nbsp County</option>
        <option value="age">&nbsp Age</option>
      </select>
      <input>
    </form>
  </div>

  <section id="admin-users">
    <h4>USERS</h4>
    <?php
    include('openconn.php');
    $count = false;
    $query = "SELECT * FROM `user` WHERE 1";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
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
    } else {
      echo "<p>No users found</p>";
    }
    mysqli_close($conn);
    ?>
  </section>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawAdmin.js"></script>
</body>
</html>
