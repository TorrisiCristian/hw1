<?php include('partials/menu.php');?>

<script src="../admin/controll-form.js"></script>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <?php
            //Get id dell'admin a cui devo fare update
            $id = $_GET['id'];
           
            //Sql UPDATE
            $sql = "SELECT * FROM tbl_admin WHERE id = $id";
            //exe query
            $res = mysqli_query($conn,$sql);

            //Check query

            if($res == TRUE){
                //OK
                $count = mysqli_num_rows($res);
                if($count == 1){
                    //get detalis
                        //echo "Avaiable Admin";
                        $row = mysqli_fetch_assoc($res);
                        $full_name = $row['full_name'];
                        $username = $row['username'];
                }else{
                    //redirect
                    header('Location:'. SITEURL . 'admin/manage-admin.php');
                }
            }else{
                //NO
            }
        ?>

        <form action="" name="Update_form" onsubmit="return ValidateForm()" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                    
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
//Check se il submit è stato clickato
if(isset($_POST['submit'])){
    //echo "Botton is clicked";

    //Get all data from form
    $id =mysqli_real_escape_string($conn,$_POST['id']) ;
    $full_name=mysqli_real_escape_string($conn,$_POST['full_name']) ;
    $username= mysqli_real_escape_string($conn,$_POST['username']);

    //Creo query per aggiornare il database
    $sql = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$username'
    WHERE id = '$id'
    ";

    //exe query
    $res = mysqli_query($conn,$sql);

    if($res == TRUE){
        //ok admin update
        $_SESSION['update'] = "<div class='success' >Admin Update successfully </div>";
        header('Location:'.SITEURL. 'admin/manage-admin.php');
    }
    else{
        //no failed admin update
        $_SESSION['update'] = "<div class='error' >Failed Admin Update </div>";
        header('Location:'.SITEURL. 'admin/manage-admin.php');
    }
}

?>




<?php include('partials/footer.php');?>