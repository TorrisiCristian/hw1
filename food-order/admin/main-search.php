<?php
//Pagina dedicata al Form per inserire i dati per la ricerca mediante API REST di Spotify
?>
<?php include("./partials/menu.php");?>
<html>
    <head>
    <link rel="stylesheet" href="../admin/admin.css">
    <script src="./call-spotify.js" defer>
    </script>
    <title>Ricerca</title>
    </head>
        <body>
            <!--Form -->
            
            <form action="" method="post" name="form_spo"  id="spo" class="text-center">
                Autore: <br>
                <input type="text" name="autore" placeholder="Insert autore" id="autore" > <br><br>
                <br>
                <input type="submit" name="submit" value="search" class="btn-primary">
            </form>
<!--Locazione dove far apparire i risultati-->
        
    <article id="album-view">
    
    </article>
        </body>
</html>
<?php include("./partials/footer.php");?>



