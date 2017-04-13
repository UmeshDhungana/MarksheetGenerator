
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include('../includes/all_head.php') ?>
</head>

<body>

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/Marksheet/marks/enter_sem_roll.php">STUDENT RESULT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/Marksheet/user/view_user.php">User</a></li>
                <li><a href="/Marksheet/student/view_student.php">Student</a></li>
                <li><a href="/Marksheet/subject/view_subject.php">Subject</a></li>
                <li><a href="/Marksheet/marks/enter_roll.php">Add Marks</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/Marksheet/user/logout.php">Logout</a></li>
<!--                <li class="active"><a href="./">Static top <span class="sr-only">(current)</span></a></li>-->
<!--                <li><a href="../navbar-fixed-top/">Fixed top</a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
