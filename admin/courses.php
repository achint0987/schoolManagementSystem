<?php
  include '../connection/dbCon.php';
  include '../functions/function.php';
  if(isset($_POST['btn1'])){
    $coursecode=$_POST['btn1'];
    $query = "DELETE FROM coursesdetails WHERE courseCode='$coursecode'";
    $run=mysql_query($query);
    if($run){
      echo "<script>alert('successfully Deleted');</script>";
      echo "<script>window.location.href= 'courses.php'</script>";
    }else{
      echo "<script>alert('Unable to delete');</script>";
      echo "<script>window.location.href= 'courses.php'</script>";
    }
  }
?> 


<?php
  session_start();
  

  if(isset($_SESSION['Email'])){

      include '../includes/head.php';
    ?>


      <?php include 'HomeHeader.php'; ?>

      <?php include 'HomeSidebar.php';?>

      <div class="container">
        <ol class="breadcrumb">
            <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Home</a></li>
            <li><a href="courses.php"><i class="fa fa-book"></i> Courses</a></li>
        </ol>
        <span class="pull-left"><form action="courses.php" method="post"  >
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search Courses/Course code/Branch...">
              <span class="input-group-btn">
                <button type="submit"  id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form></span>
      <span class= "pull-right"><a href="addCourse.php" class="btn btn-primary" role="button" >Add Courses</a> </span>
      <?php 
          if(isset($_POST['search'])){
            $search=$_POST['search'];
            $query="SELECT * FROM coursesdetails WHERE courseName LIKE '%$search%' OR courseCode LIKE '%$search%' or branch LIKE '%$search%'";
            $runQuery= mysql_query($query);
            $num= mysql_num_rows($runQuery);
            echo "<p class='h3'>" . $num . " entries found</p>";
          

      ?>
      <?php
    }
        else{
        $query="SELECT * FROM coursesdetails";
        $runQuery= mysql_query($query);
      }
        if(mysql_num_rows($runQuery)){
          echo "<table class='table table-bordered table-hover'>
          <thead>
          <tr class='success'>
            <th><h3>Course Name</h3></th>
            <th><h3>Course Code</h3></th>
            <th><h3>Semester</h3></th>
            <th><h3>Branch</h3></th>
            <th><h3>CREDIT</h3></th>
            <th></th>
            <th></th> </tr>
          </thead>";
          while($row= mysql_fetch_array($runQuery)){
            echo "
            <tbody>
              <tr> <td>" . $row['courseName'] . "</td>
              <td> " . $row['courseCode'] . "</td>
              <td> " . $row['semester'] . "</td>
              <td> " . $row['branch'] . "</td>
              <td> " . $row['grade'] . "</td>
              <td> 
                <form action='courses.php' method='post' onsubmit='return confirm()'>
                      <button type='submit' class='btn btn-link' name='btn1' value=". $row['courseCode'].">
                      <span class='glyphicon glyphicon-remove'></span>
                      </button>
                  </form> </td> <td>
                  <form action='coursesEdit.php' method='post'>
                      <button type='submit' class='btn btn-link' name='btn1' value=". $row['courseCode']. ">
                      <span class='glyphicon glyphicon-edit'></span>
                      </button></form></td>
              </td>
              </tr>
           </tbody>
            ";
          }
          echo " 
            </table>";

        }?>
      </div>
      </section>
      </div>

      <?php include'HomeBottom.php'; ?>

<?php }else echo "Connection failed"?>
</div>
</section><!-- /.content -->
      </div>