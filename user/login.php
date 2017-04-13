<?php
session_start();
include ("../db/connect.php");


if(isset($_POST['submit']))
{
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    //$password = md5(stripslashes($password));
    // $username = mysqli_real_escape_string($con,$username);
    // $password = mysqli_real_escape_string($con,$password);

    $query = "select * from user where username = '$username' and password = '$password'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    //print_r($row);

    if($count == 1){
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["role"]= $row["role"];

        header("Location:view_user.php");
    }
    else{
        echo "Something went wrong while logging in";
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include('../includes/all_head.php')?>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/Marksheet/marks/enter_sem_roll.php">STUDENT RESULT</a>
                </div>
                </div>
</nav>
        <title>Login</title>
    </head>

    <body>

    <div class="container" >

        <form method="post" action="login.php" class="form-signin">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" name="username" class="form-control" style="width: 30%" placeholder="Username" required autofocus>
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control" style="width: 30%" placeholder="Password" required>

            <button class="btn btn-primary" type="submit" name="submit">Login</button>
        </form>

    </div> <!-- /container -->

    </body>
    </html>
