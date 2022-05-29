<?php

include('../config/constants.php');

session_start();



    $component = json_decode($_GET['q'],true);

    //Elementi del dato da eliminare
    $utente = $_SESSION['log'];
    $artista = $component['artist'];
     $canzone = $component['song'];
     $img = $component['img'];
     $link = $component['link'];
    

     //Selezioniamo gli elementi
     $sql_sel = "SELECT * FROM preferiti WHERE utente = '".$utente."' AND autore = '".$artista."' AND
     canzone= '".$canzone."' ";
        
     $res = mysqli_query($conn,$sql_sel);
    if($res == TRUE){

        while ($row = mysqli_fetch_row($res)) {
            $id_canc= $row[0];
       }
       
       $sql_del = "DELETE  FROM preferiti WHERE id_pref = $id_canc ";
       $res1 = mysqli_query($conn,$sql_del);
      
       if($res1 == TRUE){
           
        $_SESSION['del-song'] = "<div class='success text-center' >Canzone eliminata dai preferiti </div>";
        
       }else{
           //Errore nell' sql_del

       }

    }else{
        //Errore nell' sql_sel
        $_SESSION['del-song'] = "<div class='error' >Canzone non eliminata dai preferiti </div>";

    }
    
     
   
        
    
     
    
    
?>