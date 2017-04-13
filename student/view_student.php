<?php
session_start();
include("../includes/session.php");
include ('../db/connect.php');

if($_SESSION['role'] != "superadmin" || $_SESSION['role'] != "admin") {
    header("Location :../user/login.php");
}

$result = mysqli_query($con,"SELECT * from student");
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php
//include('../includes/all_head.php');
include ('../includes/navbar.php');
?>
    <title>View Student</title>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li  class="active"><a href="add_student.php">Add New Student</a> <span class="sr-only">(current)</span></a></li>
<!--                <li><h2><a href="add_student.php">Add</a> New Student </h2></li>-->
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <h2 class="sub-header">Student List</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <th>Name</th>
                    <th>Roll No.</th>
                    <th>Address</th>
                    <th>Semester</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                    <?php
                    while ($res = mysqli_fetch_assoc($result))
                    {
                        ?>
                        <tr>
                            <td><?php echo stripslashes($res['stu_name']); ?></td>
                            <td><?php echo $res['stu_roll'] ?></td>
                            <td><?php echo $res['stu_address'] ?></td>
                            <td><?php echo $res['stu_batch']?></td>
                            <td><?php echo $res['stu_mobile']?></td>
                            <td><?php echo $res['stu_email']?></td>
<!--                            <td>--><?php //$im= $res['stu_image']; echo "<img src='$im' height='80px' width='90px' alt='user picture' "?><!--</td>-->
                            <td> <img src="../images/<?php echo $res['stu_image']; ?>  " width="90px" height="80px" /> </td>

                            <td><a href="edit_student.php?stu_id=<?php echo $res['stu_id']; ?>">Edit</a></td>
                            <?php
                                if($_SESSION['role'] == "superadmin") {
                            ?>
                            <td><a href="delete_student.php?stu_id=<?php echo $res['stu_id']; ?>">Delete</a></td>

                            <?php } ?>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../../assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
