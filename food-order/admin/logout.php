<?php
include('../config/constants.php');
//Destroy session

session_destroy();
header('Location:'.SITEURL.'admin/index.php');

?>