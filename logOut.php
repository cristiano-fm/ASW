<?php
session_start();
session_destroy();
header('Location: Landing.php');
exit();