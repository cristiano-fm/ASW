<?php
session_start();
include('../openconn.php');


$queryCard = "SELECT * FROM `card` WHERE `collection`='".$_GET['coll']."' ORDER BY price";
$resultCard = mysqli_query($conn, $queryCard);

echo "  <div class='top-bar'>
            <img class='return' src='../media/back.png'>
            <h1 class='tab' id='coll-name'>".$_GET['coll']."</h1>
            <img class='skip' src='../media/close2.png'>
        </div>
        <section class='interior'>";

if (mysqli_num_rows($resultCard) > 0) {
    while($rowCard = mysqli_fetch_assoc($resultCard)){

        $queryColor = "SELECT `color` FROM `collection` WHERE `name`='".$_GET['coll']."'";
        $resultColor = mysqli_query($conn, $queryColor);
        $rowColor = mysqli_fetch_assoc($resultColor);

        $query = "SELECT * FROM `game_cards` WHERE `game_id`=".$_SESSION['game_id']." AND `name`='".$rowCard['name']."'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0){
            echo "<section class='card'>
                <section class='card-inner'>
                    <section class='card-front' style='background-color: ".$rowColor['color'].";'>
                        <div>
                            <h3>".$row['name']."</h3> 
                            <p>".$row['quantity']."</p> 
                        </div>
                        <img src='../media/card_pics/".$rowCard['pic']."'>
                        <p>".$rowCard['description']."</p>
                        <img class='card-icon' src='../media/".$rowCard['attribute'].".png'>
                        <p class='card-power'>+".$rowCard['power']."</p>
                    </section>
                    <section class='card-back' style='background-color: ".$rowColor['color'].";'>
                        <div>
                            <h3>".$row['name']."</h3> 
                            <p>".$row['quantity']."</p> 
                        </div>
                        <span class='trade-bt'>TRADE</span>
                        <span class='delete-bt'> DELETE</span> 
                        <p class='disclamer'>Actions are applied to only one of 
                            the repeated cards at the time</p>
                    </section>
                </section>
            </section>";

        } else{

            echo "<section class='locked-card'>
                    <section>
                        <h3>".$rowCard['name']."</h3>
                        <h1>?</h1>
                    </section>     
                </section>";
        };
    };

    echo "</section>";

} else {
    echo "<p class='blank-window'>No collections *Fix*</p>";
};

mysqli_close($conn);
?>
