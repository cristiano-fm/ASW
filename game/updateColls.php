<?php
session_start();
include('../openconn.php');

require_once "../webservices/lib/nusoap.php";
$client = new nusoap_client('http://localhost/cityfrontiers/webservices/InfoCaderneta.php');
$error = $client->getError();

$queryColl = "SELECT * FROM `collection`";
$resultColl = mysqli_query($conn, $queryColl);

    if (mysqli_num_rows($resultColl) > 0) {

        while($rowColl = mysqli_fetch_assoc($resultColl)){

            $query = "SELECT * FROM `game_cards` WHERE `collection`='".$rowColl['name']."' AND game_id=".$_SESSION['game_id'];
            $result = mysqli_query($conn, $query);
            $count = 0;
            if (mysqli_num_rows($result) > 0) {
                echo "<section class='coll' id='".$rowColl['name']."'>
                    <div class='back-card'></div>
                    <div class='middle-card'></div>
                    <div class='front-card' style='background-color: ".$rowColl['color'].";'>
                        <h3>".$rowColl['name']."</h3> 
                        <img src='../media/card_pics/".$rowColl['icon']."'>
                        <p>".$rowColl['description']."</p>
                    </div>
                    <div class='collectors'>";

                $queryUsers = "SELECT * FROM user, user_game, game_cards WHERE user.username = user_game.username AND user_game.game_id = game_cards.game_id AND game_cards.collection ='".$rowColl['name']."' GROUP BY user.username";
                $resultUsers = mysqli_query($conn, $queryUsers);
                
                while($rowUsers = mysqli_fetch_assoc($resultUsers)){
                    if($count < 3){
                        echo "<img src='../".$rowUsers['profile_pic']."'>";
                        $count = $count + 1;
                    };
                };

                $result = $client->call('infoCaderneta', array('nome' => $rowColl['name']));
                if($result['usersN'] > 3){
                    $usersN =  intval($result['usersN']) - 3;
                    echo "<p>+".$usersN." people have this collection</p>";
                };
                echo "</div>
                </section>"; 
            } else {
                echo "<section class='locked-coll' id='".$rowColl['name']."'>
                    <div class='back-card'></div>
                    <div class='middle-card'></div>
                    <div class='front-card' style='background-color: #B1B0B0;'>
                        <h3>".$rowColl['name']."</h3> 
                        <img src='../media/card_pics/".$rowColl['icon']."'>
                        <p>this collections is locked because you still don't have any cards from it</p>
                    </div>
                    <div class='collectors'>";

                $queryUsers = "SELECT * FROM user, user_game, game_cards WHERE user.username = user_game.username AND user_game.game_id = game_cards.game_id AND game_cards.collection ='".$rowColl['name']."' GROUP BY user.username";
                $resultUsers = mysqli_query($conn, $queryUsers);
                
                while($rowUsers = mysqli_fetch_assoc($resultUsers)){
                    if($count < 3){
                        echo "<img src='../".$rowUsers['profile_pic']."'>";
                        $count = $count + 1;
                    };
                };

                $result = $client->call('infoCaderneta', array('nome' => $rowColl['name']));
                if($result['usersN'] > 3){
                    $usersN =  intval($result['usersN']) - 3;
                    echo "<p>+".$usersN." people have this collection</p>";
                };
                echo "</div>
                </section>";  
            };
        };

    } else {
        echo "<p class='blank-window'>No collections *Fix*</p>";
    }

    mysqli_close($conn);
?>
