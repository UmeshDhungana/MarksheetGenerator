<?php
session_start();
include("../includes/session.php");
include ('../db/connect.php');

if($_SESSION['role'] != "superadmin" || $_SESSION['role'] != "admin") {
    header("Location :../user/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('../includes/navbar.php')?>
    <title>Roll</title>
</head>

<div class="container">

    <form method="post" action="add_marks.php" class="form-signin">
        <h2 class="form-signin-heading">Please Enter Roll Number</h2>

        <label for="rollNo" class="sr-only"> Name of Subject</label>
        <select name="rollNo" required class="form-control" style="width: 30%">
            <?php
                $query = "select stu_roll from student";
                $result = mysqli_query($con,$query);
                while($res = mysqli_fetch_assoc($result)){
                    $roll = $res['stu_roll'];
                    echo '<option value="'.$roll.'">'.$roll.'</option>';
                }
            ?>
        </select>
<!--        <input type="text" id="rollNo" name="rollNo" style="width: 35%" class="form-control" placeholder="Enter Roll Number of student that you want to add marks of: " required autofocus></br>-->

        <button class="btn  btn-primary" type="submit" name="submit">Enter Roll number</button>
    </form>

</div> <!-- /container -->
<!--<form method="post" action="add_marks.php" >-->
<!--    Roll: <input type="text" name="rollNo" >-->
<!--<!--    UserName: <input type="text" name="stuBatch" >-->
<!--    <input type="submit" name="submit" value="submit">-->
<!--</form>-->
