<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['Email'])){

      include '../includes/head.php';
    ?>


      <?php include 'HomeHeader.php'; ?>

      <?php include 'HomeSidebar.php';?>


      <?php
        $rollno = $_GET['id'];
        $tag=0;
        if(isset($_POST['btn']) && isset($_POST['filling'])){
          $val = $_POST['filling'];
          $query = "insert into courses(rollno) values($rollno)";
          $runQuery = mysql_query($query);
          foreach($val as $k){
            $query = "update courses set $k=1 where rollno = '$rollno'";
            $runQuery = mysql_query($query);
            if($runQuery){
              $tag+=1;
            }
          }
          if($tag!=0){
            echo "<script>alert('Data Successfully inserted');</script>";
          }
        }

      ?>

      <ol class="breadcrumb ">
            <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Home</a></li>
            <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Add Courses</a></li>
        </ol>

        <?php
          $rollno = $_GET['id'];
          $semester = getSemester($rollno);
          $query = "select * from coursesdetails where semester='$semester'";
          $runQuery = mysql_query($query);
        ?>

        <div class="container">
          <div class="row well">
            <div class="col-sm-12" id=" tableStyle">
              <table class="table">
                  <tbody>
                   <tr class="danger" style="font-size: 18px">
                     <td>COURSE CODE</td>
                     <td>COURSE NAME</td>
                     <td>SELECT</td>
                   </tr>
                   <form method='POST'>
                 <?php 
                      while($row = mysql_fetch_array($runQuery)){
                        echo "<tr class='success' style='font-size: 16px'>
                                <td>".$row['courseCode']."</td>
                                <td>".$row['courseName']."</td>
                                <td><input type='checkbox' style='width: 20px; height: 20px;' value=".$row['courseCode']." name='filling[]'></td>
                              </tr>";
                      }
                   ?>  
                  <tr>
                    <td></td>
                    <td><button name="btn" class="btn btn-primary btn-block">Add Courses</button></td>
                    <td></td>
                  </tr>
                  </tbody>

                  </form>
                </table>
                </div>
              </div>        
          </div>
        </section>
      </div>

      <?php include'HomeBottom.php'; ?>

<?php }else echo "Connection failed"?>