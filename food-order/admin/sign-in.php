
<?php include('../config/constants.php');?>

<html>
    <head>
        <title>Food Order - Sign in</title>
        <link rel="stylesheet" href="../admin/admin.css">
        <script src="../admin/controll-form.js"></script>
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Sign in</h1>
            <br><br>

            <?php
                if(isset($_SESSION['sign'])){
                    echo $_SESSION['sign'];
                    unset($_SESSION['sign']);
                }
            ?>

            <br><br>
            <!--Form starts here -->

            <form action="" method="post" name="sign_form"  class="text-center">
                FullName: <br>
                <input type="text" name="full_name" placeholder="Insert fullname" > <br><br>
                Username: <br>
                <input type="text" name="username" placeholder="Insert username" > <br><br>
                Password: <br>
                <input type="password" name="password" placeholder="Insert password" ><br><br>
                <br>
                <input type="submit" name="submit" value="Sign" class="btn-primary">
                
               <div>Hai già un account? <a href="login.php">Accedi</a></div> 
            </form>
             <!--Form ends here -->
        </div>
    </body>
</html>
<?php
if(isset($_POST['submit'])){

    
//Get values form Form
  $full_name = mysqli_real_escape_string($conn,$_POST['full_name']);
  $username =mysqli_real_escape_string($conn,$_POST['username']) ;
  $password =mysqli_real_escape_string($conn,md5($_POST['password'])) ;

$query_detection = "SELECT * FROM tbl_admin WHERE full_name = '$full_name', username = '$username' , password = '$password'" ;
$res0 = mysqli_query($conn,$query_detection);

if($res0 == FALSE){
    //Utente è già esistente
    $_SESSION['sign'] = "<div class='error text-center'> User alreay exits</div>";
    header('location:'.SITEURL.'admin/sign-in.php');
}

$sql = "INSERT INTO tbl_admin SET full_name = '$full_name', username = '$username' , password = '$password'";

//exe query
$res = mysqli_query($conn,$sql);



if($res == TRUE){
    //User avaiable
    $_SESSION['log']= $_POST['username'];
    $_SESSION['sign'] = "<div class='success text-center'>Sign in successful</div>";
    header('location:'.SITEURL.'admin/');
}else{

    //User not avaiable
    $_SESSION['login'] = "<div class='error text-center'>Failed Sign in </div>";
    header('location:'.SITEURL.'admin/sign-in.php');
}

}



?>


