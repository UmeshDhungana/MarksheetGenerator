<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
    <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/Marksheet/index.php">STUDENT RESULT</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right btn-default" >
                <li><a href="/Marksheet/user/login.php">Admin Login</a></li>
            </ul>
        </div>
    </div>
    </nav>


    <div class="container">

        <form method="post" action="marks/view_marks.php" class="form-signin">
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

    </body>
</html>

