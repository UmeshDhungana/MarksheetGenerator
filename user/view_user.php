<?php
session_start();
include ('../db/connect.php');
include("../includes/session.php");

if($_SESSION['role'] != "superadmin" || $_SESSION['role'] != "admin") {
    header("Location :login.php");
}

$result = mysqli_query($con,"SELECT * from user");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../includes/all_head.php');
    include ('../includes/navbar.php');
    ?>
    <title>View Users</title>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="add_user.php">Add New User <span class="sr-only">(current)</span></a></li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <h2 class="sub-header">User List</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                    <?php
                    while ($res = mysqli_fetch_assoc($result))
                    {
                        ?>
                        <tr>
                            <td><?php echo $res["user_name"] ?></td>
                            <td><?php echo stripslashes($res["username"]); ?></td>
                            <td><?php echo $res['role']?></td>
                            <td><?php echo $res["status"]?></td>

                            <td><a href="edit_user.php?user_id=<?php echo $res['user_id']; ?>">Edit</a></td>
                            <?php if($_SESSION['role'] == "superadmin") { ?>
                            <td><a href="delete_user.php?user_id=<?php echo $res['user_id']; ?>">Delete</a></td>
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




