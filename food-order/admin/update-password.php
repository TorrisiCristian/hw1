<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
            
        ?>

        <form action="" method="POST" name="update_pass" onsubmit=" return ValidatePassForm()">
            <table class="tbl-30">

                <tr>
                    <td>Current Password:</td>
                    <td>
                    <input type="password" name="current_password" placeholder="Current password" required>
                    </td> 
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                    <input type="password" name="new_password" placeholder="New password" required>
                    </td>
                </tr>



                <tr>
                    <td>Confirm Password:</td>
                    <td>
                    <input type="password" name="confirm_password" placeholder="Confirm password" required>
                    </td>
                    
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
            

        </form>
    </div>
</div>

<?php

if(isset($_POST['submit']) ){

    $id = $_POST['id'];
    $current_password =mysqli_real_escape_string($conn,md5($_POST['current_password'])) ;
    $new_password =mysqli_real_escape_string($conn,md5($_POST['new_password'])) ;
    $confirm_password =mysqli_real_escape_string($conn,md5($_POST['confirm_password'])) ;

    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password' ";

    $res = mysqli_query($conn,$sql);

    if($res==TRUE){
        
        $count = mysqli_num_rows($res);
        
        if($count == 1){
            
            if(hash_equals($new_password,$confirm_password)){
                $sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id=$id ";
                $res2 = mysqli_query($conn, $sql2);
                if($res2 == TRUE){
                    //Display success message
                    $_SESSION['change-pwd'] = "<div class='success'>Password change successfully</div>";
                    header('location:' .SITEURL. 'admin/manage-admin.php');
                }else{
                    //Display error message
                    $_SESSION['change-pwd'] = "<div class='error'>Failed change password</div>";
                    header('location:' .SITEURL. 'admin/manage-admin.php');
                }
            }
            else
            {
                //Password non coincidenti
                $_SESSION['pwd-not-match'] = "<div class='error'>Password did not patch</div>";
                header('location:' .SITEURL. 'admin/manage-admin.php');
            }
        }
    }
    else{
        //Nessun utente con quella password
        $_SESSION['user-not-found'] = "<div class='error'>User not found</div>";
        header('Location:'. SITEURL.'admin/manage-admin.php');
    }

}

?>


<?php include('partials/footer.php')?>

