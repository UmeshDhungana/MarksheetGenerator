<?php
include("../db/connect.php");

$stu_id = $_GET['stu_id'];
$selectsql = "SELECT * FROM student WHERE stu_id= $stu_id ";

$result = mysqli_query($con,$selectsql);
$fetched_row = mysqli_fetch_array($result);


if(isset($_POST['update'])) {

$stu_id = $_GET['stu_id'];

    $stu_name = $_POST['stu_name'];
    $stu_roll = $_POST['stu_roll'];
    $stu_address=$_POST['stu_address'];
    $stu_batch=$_POST['stu_batch'];
    $stu_mobile = $_POST['stu_mobile'];
    $stu_email= $_POST['stu_email'];

    $stu_image = $_FILES['stu_image']['name'];
    $stu_image_temp = $_FILES['stu_image']['tmp_name'];

    $path = "../images/".$stu_image;
    if(move_uploaded_file($stu_image_temp,$path)) {
        echo "Image Updated";
    }
    else {
        echo "Image Not Updated";
    }


    $query = "UPDATE student SET stu_name='$stu_name', stu_roll='$stu_roll', stu_address='$stu_address', stu_batch='$stu_batch', stu_mobile='$stu_mobile',
              stu_email='$stu_email', stu_image='$stu_image'
              WHERE stu_id = '$stu_id' ";
//echo $query;

$res = mysqli_query($con,$query) or die();

if ($res) {
    header("Location:view_student.php");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../includes/all_head.php');
    include ('../includes/navbar.php');
    ?>
    <title>Edit Student</title>
</head>

<body>

<div class="container">

    <form method="post" action="edit_student.php?stu_id=<?php echo $stu_id; ?>" class="form-signin">
        <h2 class="form-signin-heading">Edit Students</h2>

        <label for="stu_name">Name</label>
        <input type="text" id="stu_name" name="stu_name" class="form-control" style="width: 30%" value="<?php echo $fetched_row['stu_name'] ?>"  required autofocus>

        <label for="stu_roll" >Roll No</label>
        <input type="text" id="stu_roll" name="stu_roll" class="form-control" style="width: 30%" value="<?php echo $fetched_row['stu_roll'] ?>" >

        <label for="stu_address" >Address</label>
        <input type="text" id="stu_address" name="stu_address" class="form-control" style="width: 30%" value="<?php echo $fetched_row['stu_address'] ?>" >
        <label for="stu_batch" >Semester</label>
        <input type="text" id="stu_batch" name="stu_batch" class="form-control" style="width: 30%" value="<?php echo $fetched_row['stu_batch'] ?>" >
        <label for="stu_mobile" >Mobille Number</label>
        <input type="number" id="stu_mobile" name="stu_mobile" class="form-control" style="width: 30%" value="<?php echo $fetched_row['stu_mobile'] ?>" >
        <label for="stu_email" >Email</label>
        <input type="email" id="stu_email" name="stu_email" class="form-control" style="width: 30%" value="<?php echo $fetched_row['stu_email'] ?>" >
        <label for="stu_image" >Image</label>
        <input type="file" id="stu_image" name="stu_image" class="form-control" style="width: 30%" placeholder="Image" value="<?php echo $fetched_row['stu_image'] ?>" >

        <button class="btn btn-primary " type="submit" name="update"> Update</button>
    </form>

</div> <!-- /container -->

</body>
</html>


