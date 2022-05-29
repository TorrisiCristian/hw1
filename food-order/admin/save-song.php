<?php


include('../config/constants.php');

session_start();

if(isset($_SESSION['log'])){

    $component = json_decode($_GET['q'],true);
    echo "Canzone:". $component['song'] . "&nbsp &nbsp Artista:".$component['artist']. "&nbsp &nbsp immagine:". 
    $component['img']."&nbsp &nbsp Artista:".$component['link'] ;
     $utente = $_SESSION['log'];
    $artista = $component['artist'];
     $canzone = $component['song'];
     $img = $component['img'];
     $link = $component['link'];
    
    $sql_adder = "INSERT INTO preferiti SET autore='$artista',canzone='$canzone',utente='$utente', immagine = '$img',
    link = '$link'";

    $res = mysqli_query($conn,$sql_adder);

    if($res == TRUE){
        //Aggiunta compiuta
    }
    else{
        //Aggiunta Fallita
    }
}

?>