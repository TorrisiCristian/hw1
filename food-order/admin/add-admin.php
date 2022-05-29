<?php include('partials/menu.php');?>

<script src="../admin/controll-form.js"></script>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <div id="errorMessage"></div>

        <br><br>

        <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>

        <form action="" method="POST" onsubmit="return ValidateAdd()" >

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name = "full_name" placeholder="Add a fullname" id="full_name" >
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name = "username" placeholder="Add an username" id="username" >
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name = "password" placeholder="Add a password" id="password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
                    
                

            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php');?>

<?php
// Processo il valore in entrata dal Form e salvo in Database

//Check se il button è stato cliccato

if(isset($_POST['submit'])){
    //Button clicked
   
    //Prendo i dati dal Form
    $full_name =mysqli_real_escape_string($conn,$_POST['full_name']) ;
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password =mysqli_real_escape_string($conn,md5($_POST['password'])) ; //password encryption

    //Sql query per salvare i dati
    $sql = "INSERT INTO tbl_admin SET full_name = '$full_name', username = '$username' , password = '$password'";
    

    //Eseguo la query
    $res = mysqli_query($conn, $sql) ;

    //Check se la query è stata eseguita correttamente
    if($res == TRUE){
        //Data inserted
        //echo "Data inserted";
        $_SESSION['add'] = "Admin added succesfully";
        header("Location:". SITEURL . 'admin/manage-admin.php');

    }
    else{
        //Failed Data insert
        //echo "Failed Data insert";
    }
}


?>