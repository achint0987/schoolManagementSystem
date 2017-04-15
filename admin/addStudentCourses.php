<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['Email'])){

      include '../includes/head.php';
    ?>


      <?php include 'HomeHeader.php'; ?>

      <?php include 'HomeSidebar.php';?>

      <ol class="breadcrumb ">
            <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Home</a></li>
      </ol>

     
         <div class="container">
            <div class="row well">
                <form method="post">
                  <input type="number" placeholder="Select Semester to get course Content" class="form-control" name="semester" required="required"><br>
                  <input type="submit" value="Check your subject as per your semester" class="btn btn-block btn-flat btn-primary">
                </form>
            </div>
          </div>
        <div class="container">
           <div class="row well">
          <div class="col-sm-12" id=" tableStyle">
          <table class="table">
            
              <tbody class="studentbody">
         <?php

            if(isset($_POST['semester'])){
              $sem = $_POST['semester'];
              $id = $_GET['id'];
              $query = "select * from courses where rollno='$id'";
              $runQuery = mysql_query($query);
              $row = mysql_fetch_array($runQuery);

              echo "<tr style='font-size: 18px'  class='danger'>
                            <td>COURSE CODE</td>
                            <td>ENROLLEMENT</td>
                            <td>ADD</td>
                    </tr>";
              if($runQuery){
                while($fielinfo= mysql_fetch_field($runQuery)){
                  $query = "select * from coursesdetails where semester='$sem' and courseCode='$fielinfo->name'";
                  $runQuery2 = mysql_query($query);
                  if(mysql_num_rows($runQuery2) ==1){
                    
                    if($fielinfo->name != 'rollno'  && $row[$fielinfo->name] != 0){    
                      echo "<tr>
                            <td>".$fielinfo->name."</td>
                            <td>Enrolled</td>
                            <td></td>
                            </tr>";
                    }else{
                      $x = $fielinfo->name;

                      echo "<tr>
                            <td>".$fielinfo->name."</td>
                            <td>Not Enrolled</td>
                            <td><form method='post'>
                              <input type='text' value='$id'  name='id' hidden/>
                              <button name='btn' value='$x'><i class='glyphicon glyphicon-plus'></i></button></td>
                              </form>
                          </tr>";
                    }
                  }
                }
              }
            }

         ?>

         <?php
          if(isset($_POST['btn'])){
            $id = $_GET['id'];
            $code = $_POST['btn'];
            $query = "update courses set $code=1 where rollno='$id'";
            $runQuery = mysql_query($query);
            echo $query;
            if($runQuery){
              echo "<script>alert('Course Added');</script>";
              echo "<script>window.location.href='addStudentCourses.php?id=$id';</script>";
            }else{
               echo "<script>alert('Error Occured while Adding');</script>";
              echo "<script>window.location.href='addStudentCourses.php?id=$id';</script>";
            }
          }

         ?>
         </tbody>
        </table>
       </div>  
      </div>
    </div>
             
        </section>
      </div>

      <?php include'HomeBottom.php'; ?>

<?php }else echo "Connection failed"?>