<?php
//session_start();
include("../db/connect.php");
//include("../includes/session.php");
//
//if($_SESSION['role'] != "superadmin" || $_SESSION['role'] != "admin") {
//    header("Location :login.php");
//}

$user_id = $_GET['user_id'];
$selectsql = "SELECT * FROM user WHERE user_id= $user_id ";

$result = mysqli_query($con,$selectsql);
$fetched_row = mysqli_fetch_array($result);


if(isset($_POST['update'])) {

    $user_id = $_GET['user_id'];

    $user_name = $_POST['user_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    $query = "UPDATE user SET user_name='$user_name', username='$username', password='$password', role='$role', status='$status'
              WHERE user_id = '$user_id' ";
    echo $query;

    $res = mysqli_query($con,$query) or die();

    if ($res) {
        header("Location:view_user.php");
        //echo "edited";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include('../includes/all_head.php');
    include ('../includes/navbar.php');
    ?>
    <title>Edit User</title>
</head>

<body>

<div class="container">

    <form method="post" action="edit_user.php?user_id=<?php echo $user_id; ?>" class="form-signin">
        <h2 class="form-signin-heading">Edit Users</h2>

        <label for="user_name" >Name of User</label>
        <input type="text" id="user_name" name="user_name" class="form-control" style="width: 30%" value="<?php echo $fetched_row['user_name'] ?>"  required autofocus>
        <label for="username" >Username</label>
        <input type="text" id="username" name="username" class="form-control" style="width: 30%" value="<?php echo $fetched_row['username']?>" >
        <label for="password" >Password</label>
        <input type="password" id="password" name="password" class="form-control" style="width: 30%" value="<?php echo $fetched_row['password']?>" required>
        <label for="role" >Role</label>
        <input type="text" id="role" name="role" class="form-control" style="width: 30%" value="<?php echo $fetched_row['role']?>" required>
        <label for="status" >Status</label>
        <input type="text" id="status" name="status" class="form-control" style="width: 30%" value="<?php echo $fetched_row['status']?>" required>

        <button class="btn btn-primary " type="submit" name="update"> Update</button>
    </form>

</div> <!-- /container -->

</body>
</html>


<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Edit User</title>-->
<!--</head>-->
<!--<body>-->
<!--<form method="post" action="edit_user.php?user_id=--><?php //echo $user_id; ?><!--">-->
<!---->
<!--    Name: <input type="text" name="user_name" value="--><?php //echo $fetched_row['user_name'] ?><!--"> <br />-->
<!--    Username: <input type="text" name="username" value="--><?php //echo $fetched_row['username']?><!--"> <br />-->
<!--    Password: <input type="text" name="password" value=" --><?php //echo $fetched_row['password'] ?><!--"> <br />-->
<!--    Role: <input type="text" name="role" value=" --><?php //echo $fetched_row['role'] ?><!--"> <br />-->
<!--    Status: <input type="text" name="status" value=" --><?php //echo $fetched_row['status']?><!-- "> <br/>-->
<!--    <input type="submit" name="update">-->
<!--</form>-->
<!--</body>-->
<!--</html>-->
