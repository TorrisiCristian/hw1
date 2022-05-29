<?php include('../config/constants.php');?>

<html>
    <head>
        <title>Food Order - Login</title>
        <link rel="stylesheet" href="../admin/admin.css">
        <script src="../admin/controll-form.js"></script>
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>

            <br><br>
            <!--Form starts here -->

            <form action="" method="post" name="Login_form" onsubmit="return ValidateLoginForm()" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="Insert username" > <br><br>
                Password: <br>
                <input type="password" name="password" placeholder="Insert password" ><br><br>
                <br>
                <input type="submit" name="submit" value="Login" class="btn-primary">
                
               <div>Non hai un account? <a href="sign-in.php">Registrati</a></div> 
            </form>
             <!--Form ends here -->
        </div>
    </body>
</html>

<?php
if(isset($_POST['submit'])){

    
    //Get values form Form
      $username = $_POST['username'];
      $password = md5($_POST['password']);

    //Sql query per prelevare username e password form database
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    //exe query
    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);
       
    if($count == 1){
        //User avaiable
        $_SESSION['log']= $row['id'];
        $_SESSION['login-name'] = "<p class='login-user-style'> $username </p>";
        $_SESSION['login'] = "<div class='success text-center'>Login successful</div>";
        header('location:'.SITEURL.'admin/');
    }else{

        //User not avaiable
        $_SESSION['login'] = "<div class='error text-center'>Failed login</div>";
        header('location:'.SITEURL.'admin/login.php');
    }

       
    
}

?>