<?php include('../config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login Page</h1>
        <br>

        <?php
        if(isset($_SESSION['login']))
        {
         echo $_SESSION['login'];
         unset ($_SESSION['login']);
        }
        
        if(isset( $_SESSION['no-login-message']))
        {
         echo $_SESSION['no-login-message'];
         unset ($_SESSION['no-login-message']);
        }


        ?>
        <br><br>



        <!-- Login starts from here -->
        <form action="" method="POST" class="text-center">
        Username: <br>
        <input type="text" name="username" placeholder="Enter Username"><br><br>
        Password: <br>
        <input type="password" name="password" placeholder="Enter Password"><br><br>
        <input type="submit" name="submit" value="Login" class="btn-primary">



        <!-- Login ends from here -->
        <p class="text-center">Created by - <a href="#">Nobody</a></p>
        </form>
    </div>
</body>
</html>

<?php
//check wether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //processs for login

    //1. GET the data from login form
    /*echo*/ $username=$_POST['username'];
    /*echo*/ $password=md5($_POST['password']);

    //2.SQL to check wether the user with username and password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    //3. execute the query
    $res = mysqli_query($conn, $sql);

    //4.Count rows to check wether the user exists or not
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        //user available and login success
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user']  = $username; //This is to check wether the user is logged in or not and logout will unset it.

        //redirect to home page/dashboard
        header('location:'.SITEURL.'admin/');
    }
    else
    {
        //user unavailable and login failed
        $_SESSION['login']="<div  class='error text-center'>Username or Password did not match.</div>";
        //redirect to home page/dashboard
        header('location:'.SITEURL.'admin/login.php');

    }
}

?>