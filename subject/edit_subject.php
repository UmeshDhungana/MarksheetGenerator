<?php
//session_start();
include ('../db/connect.php');
//include("../includes/session.php");

//if($_SESSION['role'] != "superadmin" || $_SESSION['role'] != "admin") {
//    header("Location :../user/login.php");
//}


$sub_id = $_GET['sub_id'];
$selectsql = "SELECT * FROM subject WHERE sub_id= $sub_id ";

$result = mysqli_query($con,$selectsql);
$fetched_row = mysqli_fetch_array($result);

if(isset($_POST['update'])) {
    $sub_id = $_GET['sub_id'];

    $sub_name = $_POST['sub_name'];
    $sub_semester = $_POST['sub_semester'];
    $sub_marks = $_POST['sub_marks'];

    $query = "UPDATE subject SET sub_name='$sub_name', sub_semester='$sub_semester', sub_marks='$sub_marks' WHERE sub_id='$sub_id'";

    $res = mysqli_query($con,$query) or die();

    if ($res) {
        header("Location:view_subject.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('../includes/all_head.php')?>
    <title>Edit Subject</title>
</head>

<body>

<div class="container">

    <form method="post" action="edit_subject.php?sub_id=<?php echo $sub_id; ?>" class="form-signin">
        <h2 class="form-signin-heading">Please Edit Subject</h2>

        <label for="sub_name" > Name of Subject</label>
        <input type="text" id="sub_name" name="sub_name" class="form-control" style="width: 30%" value="<?php echo $fetched_row["sub_name"] ?>" placeholder="Subject Name" required autofocus>
        <label for="sub_semester">Semester</label>
        <input type="text" id="sub_semester" name="sub_semester" class="form-control" style="width: 30%" value="<?php echo $fetched_row["sub_semester"] ?>" placeholder="Semester" >
        <label for="sub_marks" >Marks</label>
        <input type="number" id="sub_marks" name="sub_marks" class="form-control" style="width: 30%" value="<?php echo $fetched_row["sub_marks"] ?>" placeholder="Marks" >

        <button class="btn btn-primary" type="submit" name="update">Update Subject</button>
    </form>

</div> <!-- /container -->

</body>
</html>


