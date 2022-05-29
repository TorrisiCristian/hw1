<?php include('../config/constants.php');?>

<html>
    <head>
        <title>Food Order Website - Homepage</title>
        <link rel="stylesheet" href="admin.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>

    <body>
         <!--Menu section starts -->
         
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="main-search.php">Ricerca</a></li>
                    <li><a href="login.php">Log in </a></li>
                    <li><a href="profile.php"><?php echo $_SESSION['login-name']; ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                   
                    
                </ul>
            </div>
        </div>
         <!-- Menu section ends-->

        