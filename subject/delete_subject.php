<?php
session_start();
include ('../db/connect.php');
include("../includes/session.php");

if($_SESSION['role'] != "superadmin" || $_SESSION['role'] != "admin") {
    header("Location :login.php");
}

$sub_id = $_GET['sub_id'];
$query = "DELETE from subject where sub_id= $sub_id";
$result =mysqli_query($con,$query);

if($result) {
    header("Location:view_subject.php");
    //echo "Subject deleted";
}
else {
    echo "Could not deleted";
}
?>