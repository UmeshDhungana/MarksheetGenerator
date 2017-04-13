<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('../includes/navbar.php')?>
    <title>Roll</title>
</head>

<div class="container">

    <form method="post" action="view_marks.php" class="form-signin">
        <h2 class="form-signin-heading">Please Enter Roll Number and Semester</h2>

        <input type="text" id="stu_roll" name="stu_roll" style="width: 30%" class="form-control" placeholder="Enter Roll Number " required autofocus></br>

        <div class="form-group" style="width: 30%">
            <label for="stu_batch">Semester</label>
            <select name="stu_batch" required class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
        <button class="btn  btn-primary" type="submit" name="submit">Go</button>
    </form>

</div>


<!--<div class="container">-->
<!--    <form method="post" action="view_marks.php">-->
<!--        Semester: <select name="stu_batch">-->
<!--            <option selected value="1"> 1 </option>-->
<!--            <option value="2"> 2 </option>-->
<!--            <option value="3"> 3 </option>-->
<!--            <option value="4"> 4 </option>-->
<!--            <option value="5"> 5 </option>-->
<!--            <option value="6"> 6 </option>-->
<!--            <option value="7"> 7 </option>-->
<!--            <option value="8"> 8 </option>-->
<!--        </select>-->
<!--        Roll: <input type="number" name="stu_roll">-->
<!---->
<!--        <button type="submit" name="submit">Submit</button>-->
<!--    </form>-->
<!--</div>-->