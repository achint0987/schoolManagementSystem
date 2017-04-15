<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['Email'])){

      include '../includes/head.php';
    ?>


      <?php include 'HomeHeader.php'; ?>

      <?php include 'HomeSidebar.php';?>

      <div class="container">
        <ol class="breadcrumb">
            <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Home</a></li>
            <li><a href="courses.php"><i class="fa fa-dashboard"></i> Courses</a></li>
            <li><a href="addCourse.php"><i class="fa fa-dashboard"></i>Add Course</a></li>
        </ol>

        <form class="form-horizontal" action="courseValidation.php" method="post" onsubmit="return confirm()">
        <div class ="form-group">
          <label for="inputPassword" class="control-label col-xs-2">Course Name</label>
                        <div class="col-xs-4">
                            <input type="text" name="cname" class="form-control" id="inputPassword" placeholder="Course Name" required>
                        </div>
                        
                     <label for="inputPassword" class="control-label col-xs-2">Course Code</label>
                        <div class="col-xs-4">
                            <input type="text" name="ccode" class="form-control" id="inputPassword" placeholder="Course Code" required>
                      </div>
        </div>
        <div class ="form-group">
          <label for="inputPassword" class="control-label col-xs-2">Semester</label>
                        <div class="col-xs-4">
                            <input type="number" name="semester" class="form-control" id="inputPassword" placeholder="Semester" required>
                        </div>
                        
                          <label for="inputPassword" class="control-label col-xs-2">Branch</label>
                           <div class="col-xs-4">
                            <select class="form-control" name="branch">
                            <option value="CSE">Computer Science and Engineering</option>
                            <option value="ECE">Electronics and Communication Engg.</option>
                            <option value="ME">Mechanical Engineering</option>
                            <option value="ALL">ALL</option>
                            </select>
                      </div>
        </div>
        <div class ="form-group">
          <label for="inputPassword" class="control-label col-xs-2">Credits</label>
                        <div class="col-xs-4">
                            <input type="text" name="ccredit" class="form-control" id="inputPassword" placeholder="Credit" required>
                        </div>
        </div>
        <div class="col-xs-offset-2 col-xs-10">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
        
      </form>
      </div>
      </section><!-- /.content -->
      </div>
      <?php include'HomeBottom.php'; ?>

<?php }else echo "Connection failed"?>