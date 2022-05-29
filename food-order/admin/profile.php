
<?php include('../config/constants.php');?>
<?php include('./partials/menu.php');?>
<html>
    <head>
        <title>My Account</title>
        <link rel="stylesheet" href="./admin.css">
        <script src="./visual-pref.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <h1 class="user-display">
            Benvenuto, <?php  echo LOGIN_NAME;?>
        </h1>

       <div class="text-center">Questo è la mia pagina di profilo di <?php  echo LOGIN_NAME;?></div> 
        <br><br>
       <div class="text-center">
            <a href="./manage-admin.php" class="btn-secondary">Modifica credenziali</a></div>

            <!-- Dovrò inserire anche gli album preferiti del relativo utente-->
            
           
            <h1 class="user-display text-center">I miei preferiti</h1>
            <?php
                    if(isset($_SESSION['del-song'])){
                        echo $_SESSION['del-song'];
                        unset($_SESSION['del-song']);
                    }
                ?>


            <article id="album-view">
			
             </article>
             
    </body>
</html>
<?php include('./partials/footer.php');?>
