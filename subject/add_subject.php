<?php
session_start();
include("../includes/session.php");

if($_SESSION['role'] != "superadmin" || $_SESSION['role'] != "admin") {
    header("Location :../user/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('../includes/navbar.php')?>
    <title>Add Subject</title>
</head>

<body>

<div class="container">

    <form method="post" action="add_subject.php" class="form-signin">
        <h2 class="form-signin-heading">Please Add Subject</h2>

        <label for="sub_name" class="sr-only"> Name of Subject</label>
        <input type="text" id="sub_name" name="sub_name" class="form-control" style="width: 30%" placeholder="Subject Name" required autofocus>
        <label for="sub_semester" class="sr-only">Semester</label>
        <input type="text" id="sub_semester" name="sub_semester" class="form-control" style="width: 30%" placeholder="Semester" required >
        <label for="sub_marks" class="sr-only">Marks</label>
        <input type="number" id="sub_marks" name="sub_marks" class="form-control" style="width: 30%" placeholder="Marks" required >

        <button class="btn btn-primary" type="submit" name="submit">Add Subject</button>
    </form>

</div> <!-- /container -->

</body>
</html>

<?php

include ("../db/connect.php");

if(isset($_POST['submit'])) {
    $sub_name = $_POST['sub_name'];
    $sub_semester = $_POST['sub_semester'];
    $sub_marks = $_POST['sub_marks'];

    $insert_subject = "INSERT INTO subject (sub_name,sub_semester, sub_marks) VALUES('$sub_name','$sub_semester','$sub_marks')";

    $result = mysqli_query($con,$insert_subject);

//    if (!$result) {
//        echo "something went wrong. please try again";
//        //header("Location:content.php");
//    }
//    else
//       // echo "Subject Added Successfully";
//    header("Location:view_subject.php");

    if ($result) {
        echo "<script>
                window.location('view_subject.php');
            </script>";
    }
}
