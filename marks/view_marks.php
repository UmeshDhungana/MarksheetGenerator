<?php
/**
 * Created by PhpStorm.
 * User: UMESH
 * Date: 11/29/2016
 * Time: 10:18 AM
 */

include ("../db/connect.php");

if(isset($_POST['stu_roll']) && isset($_POST['stu_batch'])) {
    $stuRoll = $_POST['stu_roll'];
    $sem = $_POST['stu_batch'];

    $sql = "select stu_id from student where stu_roll=$stuRoll";
    $sqlresult = mysqli_query($con,$sql);
    $stuId = mysqli_fetch_assoc($sqlresult)['stu_id'];


              // $query = "select stu.stu_name as stu_name, sub.sub_name as sub_name, stom.obtained_marks as obtained_marks, sub.sub_marks as sub_marks
              //from student stu join student_marks stom on stu.stu_id=stom.marks_stu_roll join subject sub on stom.marks_sub_id= sub.sub_id
             // where stu.stu_id=$stuId and sub.sub_semester = $sem";
    $query = "SELECT * FROM `student_marks`,student,subject WHERE student.stu_roll=$stuRoll and student.stu_batch = $sem and student_marks.marks_sub_id = subject.sub_id and subject.sub_semester= $sem";
    //echo $query;

        $result = mysqli_query($con,$query);
    ?>

<html xmlns="http://www.w3.org/1999/html" xmlns:width="http://www.w3.org/1999/xhtml">
    <head>
        <?php include("../includes/navbar.php") ?>
        <title>View Marks</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>

    <div align="left"><input type="button" onclick="printDiv('printableArea')" value="Print Result" /></div>

    <div class="class_for_margin" id="printableArea">

        <h1 align="center"> Deerwalk Institute of Technology</h1>
        <h1 align="center"> Marksheet </h1>

        <?php

    $total_obtain_marks = 0;
    $total_marks = 0;

    $r = mysqli_fetch_assoc($result);
       $stuname =  $r['stu_name'];

//    $total_obtain_marks = $total_obtain_marks+ $r['obtained_marks'];
//    echo $total_obtain_marks;
    ?>
<div class="container-fluid">
    <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            </br>
            <p class="text-left"  style="width: 30%" > Name: <?php echo " $stuname" ?></p>
            <h2 class="sub-header"></h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <!--<th>Student Name</th>-->
                        <th>Subject Name</th>
                        <th>Obtained Marks</th>
                        <th>Total Marks</th>
                    </tr>
                    </thead>

    <?php

    while($row = mysqli_fetch_assoc($result)){
        ?>
        <body>

            <tbody>
                <tr>
                    <td> <?php echo $row['sub_name']; ?></td>
                    <td> <?php echo $row['obtained_marks']; ?></td>
                    <td> <?php echo $row['sub_marks']; ?></td>
                </tr>
                <?php
                $total_obtain_marks = $total_obtain_marks+ $row['obtained_marks'];
                $total_marks = $total_marks+$row['sub_marks'];
                }
                $percentage=round(((($total_obtain_marks*100)/$total_marks)),2);
                ?>
                <div class="form-inline">
                <div class="text-left" >
                     Total Marks: <?php echo " $total_marks"?>
                    </br> Obtained Marks: <?php echo "$total_obtain_marks"?>
                    </br> Percentage: <?php echo " $percentage"?>
                </div>
                </div>

                <?php
                }
                ?>
            </tbody>
                </table>
        </div>
        </div>
        </div>

    <script>
        function printDiv(print) {
            var printContents = document.getElementById(print).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

</body>
</html>


