<?php
session_start();
include ("../db/connect.php");
include("../includes/session.php");

if($_SESSION['role'] != "superadmin" || $_SESSION['role'] != "admin") {
    header("Location :login.php");
}

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role = $_POST['role'];
    $status= $_POST['status'];

    $query = "INSERT INTO user(user_name,username,password,role,status)
			  VALUES ('$user_name','$username','$password','$role','$status')";

    $result = mysqli_query($con,$query);

//    if (!$result) {
//        echo "something went wrong. please try again";
//    }
//    else
//        //echo "User Added Successfully";
//        header("Location:view_user.php");
    if ($result) {
        echo "<script>
                window.location('view_subject.php');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include ('../includes/navbar.php');
    ?>
</head>

<body>

<div class="container">

    <form method="post" action="add_user.php" class="form-signin">
        <h2 class="form-signin-heading">Please Add Users</h2>

        <label for="user_name" class="sr-only">Full Name of User</label>
        <input type="text" id="user_name" name="user_name" class="form-control" style="width: 30%" placeholder="Name" required autofocus>
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" style="width: 30%" placeholder="Username" required>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" style="width: 30%" placeholder="Password" required>
        <label for="role" class="sr-only">Role</label>
        <input type="text" id="role" name="role" class="form-control" style="width: 30%" placeholder="Role" required>
        <label for="status" class="sr-only">Status</label>
        <input type="text" id="status" name="status" class="form-control" style="width: 30%" placeholder="Status" required>

        <button class="btn  btn-primary" type="submit" name="submit">Add User</button>
    </form>

</div> <!-- /container -->

</body>
</html>


