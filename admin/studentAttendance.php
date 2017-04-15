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
            <li><a href="students.php"><i class="fa fa-dashboard"></i> Students</a></li>
        </ol>

        <div class="container">
            <div class="well">
             <form  method="get" >
                <div class="input-group">
                  <input type="text" name="semester" class="form-control" placeholder="Search User as per semester">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
            </form>
            </div>
        </div>
                   <div class="container">
                     <div class="row well">
                    <div class="col-sm-12" id=" tableStyle">
                    <table class="table table-striped">
                      
                        <tbody class="studentbody">
                         <?php 
                              $query;
                              if(isset($_GET['semester'])){
                                $semester = $_GET['semester'];
                                $query = "select * from studentdetails where Semester='$semester'";
                              }else{
                                $query = "select * from studentdetails where Semester=1";
                              }
                              $runQuery = mysql_query($query);
                              
                              if(mysql_num_rows($runQuery) != 0){

                                echo "<tr style='font-size: 18px'  class='danger'>
                                      <td>Roll No</td>
                                      <td>NAME</td>
                                      <td>Email</td>
                                      <td>ATTENDANCE</td>
                                    </tr>";
                                    ?>
                             <?php
                                while($row = mysql_fetch_array($runQuery)){
                                  $roll = $row['RollNo'];
                                  $str = 'Are you sure';
                                  echo "<tr>
                                          <td>".$row['RollNo']."</td>
                                          <td>".$row['FirstName']." ". $row['LastName']."</td>
                                          <td>".$row['Email']."</td>
                                        <td>
                                            <form method='get' action='attendance.php'>
                                              <button class='btn btn-xs' name='id' value=".$row['RollNo']."><i class='glyphicon glyphicon-pencil'></i></button>
                                              </form>
                                            </td>
                                            
                                        </tr>";
                                }
                                
                              }else{
                              echo "<center><h3><div class='container'>Students Not Found</div></h3></center>";
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

    