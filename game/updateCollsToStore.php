<?php
session_start();
include('../openconn.php');


$query = "SELECT * FROM `collection`";
$result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){

            echo "<section class='coll' id='".$row['name']."'>
                    <div class='back-card'></div>
                    <div class='middle-card'></div>
                    <div class='front-card' style='background-color: ".$row['color'].";'>
                        <h3>".$row['name']."</h3> 
                        <img src='../media/card_pics/".$row['icon']."'>
                        <p>".$row['description']."</p>
                    </div>
                </section>";
        };

    } else {
        echo "<p class='blank-window'>No collections *Fix*</p>";
    }

    mysqli_close($conn);
?>

