<?php
session_start();
session_destroy();
 unset($_SESSION['loggedin']);
 echo "logg is ".$_SESSION['loggedin'];
header('Location: login.php');?>
