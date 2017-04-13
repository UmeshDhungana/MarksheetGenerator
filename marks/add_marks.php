
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('../includes/navbar.php')?>
    <title>Add Marks</title>
</head>

<?php
include ("../db/connect.php");
if(isset($_POST['rollNo'])){

    $rollNo = $_POST['rollNo'];
    $query = "select stu_batch from student where stu_roll=$rollNo";


    if (mysqli_num_rows(mysqli_query($con, $query))>0){
    //if($rollNo == $_POST['stu_roll']) {
        // $query = "select * from student where stu_batch=$stuBatch ";
        $result = mysqli_query($con, $query);

        $sem = mysqli_fetch_assoc($result)['stu_batch'];

        $query = "select sub_id,sub_name from subject where sub_semester=$sem";
        $result = mysqli_query($con, $query);

        echo "<form method='post' class='container' action=''>";
        while ($res = mysqli_fetch_assoc($result)) {
            $sub_id = $res["sub_id"];
            $sub_name = $res["sub_name"];
            echo "<div> ";
            echo $sub_name . "<input type='text' name=$sub_id style=\"width: 30%\" class='form-control'><br>";
            echo "</div>";
        }
        echo "<input type='hidden' name='stu_roll' value=$rollNo>";
        echo "<input type='submit' class='btn btn-primary' name='submitMarks' value='submit'></form>";
    }
    else {
        echo "Student does not exists";
    }

}

if(isset($_POST['submitMarks'])) {
    $rollNo = $_POST['stu_roll'];
    while($key = current($_POST)){
        $subId = key($_POST);
        if($subId!="stu_roll" && $subId!="submitMarks"){
            $subMarks = $_POST[$subId];
            $query = "insert into student_marks (marks_stu_roll, marks_sub_id, obtained_marks)  VALUES($rollNo,$subId,$subMarks)";
            mysqli_query($con,$query);
            //echo $query;
        }
        next($_POST);
    }
    header("Location: enter_sem_roll.php");
}
