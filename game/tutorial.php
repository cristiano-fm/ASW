

<?php
session_start();

if(!isset($_SESSION['username'])) {
	header('Location: ../Landing.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City Frontiers</title>
    <link rel="icon" type="image/png" href="../media/icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/tutorial.css">
</head>
<body>
    <div id="load-block"></div>

    <section id="first">
    <a href="Home.php">
      <img class="skip" src="../media/close2.png">
    </a>
    <h1>Cards generate Buildings</h1>
    <img class="tutorial" src="../media/tutorial_1.png">
    <div>
      <img class="next" id="next-1" src="../media/next.png">
    </div>
    <img class="location" src="../media/loc1.png">
    </section>

    <section id="second">
    <a href="Home.php">
      <img class="skip" src="../media/close2.png">
    </a>
    <h1>Buildings have purposes</h1>
    <img class="tutorial"  src="../media/tutorial_2.png">
    <div>
      <img class="back" id="back-2" src="../media/back.png">
      <img class="next" id="next-2" src="../media/next.png">
    </div>
    <img class="location" src="../media/loc2.png">
    </section >

    <section id="third">
    <h1>Win, trade or buy Cards to evolve!</h1>
    <img class="tutorial" src="../media/tutorial_3.png">
    <div>
      <img class="back" id="back-3" src="../media/back.png">
      <a href="Home.php">
        <img class="next" src="../media/done.png">
      </a>
    </div>
    <img class="location" src="../media/loc3.png">
    </section>
  <script src="../js/main.js"></script>
</body>
</html>
