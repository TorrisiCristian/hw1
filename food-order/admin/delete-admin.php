<?php

include('../config/constants.php');


//Recupero l'id dell'admin da eliminare
 $id = $_GET['id'];

//SQL query per eliminare
$sql = "DELETE FROM tbl_admin WHERE id = $id";

//Exe query
$res = mysqli_query($conn,$sql);

//Check
if($res == TRUE){
    //OK
    //echo "Admin deleted";
    $_SESSION['delete'] = "<div class='success'> Admin delete successfully </div>";
    header('Location:'. SITEURL. 'admin/manage-admin.php');
}else{
    //NO
    //echo "Failed to delete Admin";
    $_SESSION['delete'] = "<div class='error'>Failed to delete Admin</div>";
    header('Location:'. SITEURL. 'admin/manage-admin.php');
}

?>