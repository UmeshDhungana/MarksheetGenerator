<?php
session_start();
include("../includes/session.php");
include("../db/connect.php");

//echo $_SESSION['role'];

if($_SESSION['role'] == "superadmin") {

    $user_id = $_GET['user_id'];
    $query = "DELETE from user where user_id= $user_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location:view_user.php");
    } else {
        "Could not deleted";
    }
}
else {
    header("Location: login.php");
}
 ?>