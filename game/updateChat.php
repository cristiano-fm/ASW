<?php
session_start();
include('../openconn.php');


$query = "SELECT * FROM `chat` WHERE 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){

        if( $row['username'] == $_SESSION['username']){
            
            echo "<div class='outer-msg-self'>
                    <p class='message'>".$row['message']."</p>
                </div>";

        }else{

            $queryUser = "SELECT `profile_pic` FROM `user` WHERE username='{$row['username']}'";
            $resultUser = mysqli_query($conn, $queryUser);
            $user = mysqli_fetch_assoc($resultUser);

            echo "<div class='outer-msg'>
                    <div class='msg-user'>
                        <img src='../".$user['profile_pic']."'>
                        <p>".$row['username']."</p>
                    </div>
                    <p class='message'>".$row['message']."</p>
                </div>";
        };
    };
}else{
    echo "<p class='blank-window'>No messages</p>";
};

mysqli_close($conn);
?>
