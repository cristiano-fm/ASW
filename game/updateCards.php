<?php
session_start();
include('../openconn.php');


$query = "SELECT `name`, `collection`, `quantity` FROM `game_cards` WHERE `game_id`=".$_SESSION['game_id']." ORDER BY `collection`";
$result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $coll = "";
        while($row = mysqli_fetch_assoc($result)){

            $queryColor = "SELECT `color` FROM `collection` WHERE `name`='".$row['collection']."'";
            $resultColor = mysqli_query($conn, $queryColor);
            $rowColor = mysqli_fetch_assoc($resultColor);

            $queryCard = "SELECT * FROM `card` WHERE `name`='".$row['name']."'";
            $resultCard = mysqli_query($conn, $queryCard);
            $rowCard = mysqli_fetch_assoc($resultCard);
 
            if($coll=="" or $coll != $row['collection']){
                $coll = $row['collection'];
                echo " <h2>".$coll."</h2>";
            }

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
        };

    } else {
        echo "<p class='blank-window'>You don't have cards in your planet. <br> Buy more cards or wait for you daily reward</p>";
    }
    mysqli_close($conn);
?>
