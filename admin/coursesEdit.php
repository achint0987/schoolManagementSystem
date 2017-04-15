<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['Email'])){

      include '../includes/head.php';
    ?>


      <?php include 'HomeHeader.php'; ?>

      <?php include 'HomeSidebar.php';?>

     <?php $ccode = $_POST['btn1']; 
        $query= "SELECT * FROM coursesdetails WHERE courseCode = '$ccode'";
        $runQuery=mysql_query($query);
        if(mysql_num_rows($runQuery) > 0){
          while($row = mysql_fetch_array($runQuery)){
            $ccname=$row['courseName'];
            $semester=$row['semester'];
            $branch=$row['branch'];
          }

        }

      ?>
      <div class="container">
      <ol class="breadcrumb ">
        <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Home</a></li>
        <li><a href="courses.php"><i class="fa fa-book"></i> Courses</a></li>
        <li><a href="coursesEdit.php"><i class="fa fa-edit"></i>Courses Edit</a></li>
      
      </ol>
      <form class="form-horizontal" action="editValidation.php" method="post" onsubmit="return confirm()">
          <div class ="form-group">
          <label for="inputPassword" class="control-label col-xs-2">Course Name</label>
                        <div class="col-xs-4">
                           <?php echo "<input type='text' name='cname' class='form-control' id='inputPassword' placeholder='Course Name' value=" . $ccname . " required >" ?>
                        </div>
                        
                     <label for="inputPassword" class="control-label col-xs-2">Semester</label>
                        <div class="col-xs-4">
                            <?php echo "<input type='number' name='semester' class='form-control' id='inputPassword' placeholder='Semester' value=" . $semester . " required >" ?>
                      </div>
        </div>
      <div class ="form-group">
        <?php echo "<h3 align='right'> E-mail:" . $ccode . "</h3>"?>
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
      <div class="col-xs-offset-2 col-xs-10">
                           <?php echo " <button type='submit' name='ccode' value=". $ccode . " class='btn btn-primary'>Edit</button> "; ?>
                        </div>
          
        </form>
</div>
      

<?php }else echo "Connection failed"?>

 </section><!-- /.content -->
      </div>