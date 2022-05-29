<?php
include('partials/menu.php');

?>

<html>
    <head>
        <title>Food Order Website - Homepage</title>
        <link rel="stylesheet" href="./admin.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <!-- Main content section starts-->
        <div class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>
            <?php
                if(isset($_SESSION['login']) ){
                    echo $_SESSION['login']; 
                    unset($_SESSION['login']);    
                }
                if(isset($_SESSION['sign']) ){
                    echo $_SESSION['sign']; 
                    unset($_SESSION['sign']);    
                }

            ?>

           
</div>
        <!-- Main content section ends-->

<?php
include('partials/footer.php');
?>