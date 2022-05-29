<?php

include('../config/constants.php');


if (!isset($_SESSION['log'])) {
    header('Location:'. "login.php");
		exit();
}



$sql_visual = "SELECT * FROM preferiti  WHERE utente = '".$_SESSION['log']."' ";
$res = mysqli_query($conn, $sql_visual);
if (mysqli_num_rows($res) > 0) {
    $success = true;
    $content = array();
    while ($row = mysqli_fetch_assoc($res)) {
      $content[] = $row;
    }
  } else {
    $success = false;
    $content = "Non ci sono post da visualizzare :(";
  }
  
  $response = ['success' => $success, 'content' => $content];
  echo json_encode($response);

?>