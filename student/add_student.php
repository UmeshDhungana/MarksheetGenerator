<?php
session_start();
include("../includes/session.php");

if($_SESSION['role'] != "superadmin" || $_SESSION['role'] != "admin") {
    header("Location :login.php");
}
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include('../includes/all_head.php');
        include ('../includes/navbar.php');
        ?>
        <title>Add Student</title>
    </head>

    <body>

    <div class="container">

        <form method="post" action="add_student.php" enctype="multipart/form-data" class="form-signin">
            <h2 class="form-signin-heading">Please Add Student</h2>

            <label for="stu_name">Name</label>
            <input type="text" id="stu_name" name="stu_name" class="form-control" style="width: 30%" placeholder="Student Name" required autofocus>
            <label for="stu_roll">Roll</label>
            <input type="text" id="stu_roll" name="stu_roll" class="form-control" style="width: 30%" placeholder="Roll Number">

            <label for="stu_address" >Address</label>
            <input type="text" id="stu_address" name="stu_address" class="form-control" style="width: 30%" placeholder="Address">
            <label for="stu_batch" >Batch</label>
            <input type="text" id="stu_batch" name="stu_batch" class="form-control" style="width: 30%" placeholder="Sem">
            <label for="stu_mobile" >Mobile Number</label>
            <input type="number" id="stu_mobile" name="stu_mobile" class="form-control" style="width: 30%" placeholder="Mobile">
            <label for="stu_email" >Email</label>
            <input type="email" id="stu_email" name="stu_email" class="form-control" style="width: 30%" placeholder="Email">
            <label for="stu_image" >Image</label>
            <input type="file" id="stu_image" name="stu_image" class="form-control" style="width: 30%" placeholder="Image" required>

            <button class="btn btn-primary " type="submit" name="submit">Add Student</button>
        </form>

    </div> <!-- /container -->

    </body>
    </html>


    <?php
    include("../db/connect.php");

    if (isset($_POST['submit'])) {
        $stu_name = $_POST['stu_name'];
        $stu_roll = $_POST['stu_roll'];
        $stu_address = $_POST['stu_address'];
        $stu_batch = $_POST['stu_batch'];
        $stu_mobile = $_POST['stu_mobile'];
        $stu_email = $_POST['stu_email'];

        $stu_image = $_FILES['stu_image']['name'];
        $stu_image_temp = $_FILES['stu_image']['tmp_name'];


        $path = "../images/" . $stu_image;

        if (move_uploaded_file($stu_image_temp, $path)) {
        //    echo "Image Uploaded";
        } else {
          //  echo "Image Not Uploaded";
        }


        $insert_student = "INSERT INTO student (stu_name, stu_roll ,stu_address,stu_batch,stu_mobile,stu_email,stu_image)
			  VALUES ('$stu_name','$stu_roll','$stu_address','$stu_batch','$stu_mobile','$stu_email','$stu_image')";

        $result = mysqli_query($con, $insert_student);

        if ($result) {
            echo "<script>
            window.location('view_student.php');
</script>";
        }
   }
    ?>

