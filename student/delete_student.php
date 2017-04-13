<?php
session_start();
include("../includes/session.php");
include("../db/connect.php");

if($_SESSION['role'] != "superadmin") {
    header("Location: ../user/login.php");
}

$stu_id = $_GET['stu_id'];
$query = "DELETE from student where stu_id= $stu_id";
$result =mysqli_query($con,$query);

if($result) {
    header("Location:view_student.php");
    //echo "deleted";
}
else {
   echo "Could not deleted";
}
?>