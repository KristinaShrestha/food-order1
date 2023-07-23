<?php
//include constants.php for SITEURL
include('../config/constants.php');

//1.destroy the session
session_destroy(); //unsets $_SESSION['user']
 



//Redirect the session

header('location:' .SITEURL.'admin/login.php');



?>