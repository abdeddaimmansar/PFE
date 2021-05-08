<?php
session_start();
session_destroy();
exit;
// Redirect to the login page:
header('Location: login.php');?>
