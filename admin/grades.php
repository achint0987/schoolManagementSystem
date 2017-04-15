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
                <form method="post">
                  <input type="number" placeholder="Semester" class="form-control" name="semester" required="required"><br>
                  <input type="submit" value="Find Students as per semester" class="btn btn-block btn-flat btn-primary">
                </form>
            </div>
          </div>
                   <div class="container">
                     <div class="row well">
                    <div class="col-sm-12" id=" tableStyle">
                    <table class="table table-striped">
                      
                        <tbody class="studentbody">


                        <?php
                            $roll = $_GET['id'];
                            $query = "select * from courses where rollno = '$roll'";
                            $runQuery = mysql_query($query);
                            $row = mysql_fetch_array($runQuery);

                            $semester = mysql_query("select * from studentdetails where RollNo='$roll'");
                            $semester = mysql_fetch_array($semester);
                            $semester = $semester['Semester'];

                            
                            echo "<tr style='font-size: 18px'   class='danger'>
                            <td>COURSE CODE</td>
                            <td>COURSE NAME</td>
                            <td>GRADE</td>
                            <td>INSERT</td>
                            <td></td>
                            </tr>";
                            $fieldinfo="";
                            while ($fieldinfo = mysql_fetch_field($runQuery)) {
                              if($fieldinfo->name != 'rollno' && $row[$fieldinfo->name] != 0){
                                if(isset($_POST['semester'])){
                                  $sem = $_POST['semester'];
                                  $query = "select * from  coursesdetails where semester = $sem AND courseCode='$fieldinfo->name'";
                                }else{
                                  
                                $query = "select * from coursesdetails where semester = $semester AND courseCode='$fieldinfo->name'";
                                }
                                $query = mysql_query($query);
                                $row1  = mysql_fetch_array($query);
                                $x = $row1['courseCode'];
                                

                                if(!($x)){
                                      break;
                                }
                                $grades = mysql_query("select * from grades where rollno = '$roll' AND '$x' is not NULL");
                                

                                
                                if(mysql_num_rows($grades)==0){
                                  $value="NULL";
                                }else{
                                  $row2 = mysql_fetch_array($grades);
                                  $val = mysql_fetch_field($grades);
                                  $value = ($row2[$x]);
                                  
                                }
                                
                                echo "<tr><form method='GET'>
                                        <td>".$row1['courseCode']."</td>
                                        <td>".$row1['courseName']."</td>
                                        <td>
                                        <input type='text' value='$roll' name='id' hidden>
                                        <input type='text' value=$x name='sub' hidden>
                                        <input type='text'  class='form-control' style='width:55px; height: 27px;' value=$value  disabled>
                                        </td><td>
                                        <input type='text'  class='form-control' style='width:55px; height: 27px;' name='grade' >
                                          </td>
                                        <td><button class='btn btn-danger btn-xs btn-block' name='update'>Update</button></td>
                                        </form>
                                      </tr>";
                                      

                              }
                            }


                        ?>
                         
                        </tbody>
                      </table>                      
                    </div>
                  </div>
                  </div>
                        </div>
                        
                     </div>
                  </div>




         </section>
      </div>
      <?php
        if(isset($_GET['update'])){
          $roll = $_GET['id'];
          $val = $_GET['sub'];
          $grade = $_GET['grade'];
          $query = mysql_query("select * from grades where rollno = '$roll'");

          $var = mysql_num_rows($query);
          
          if(mysql_num_rows($query) == 0){
            $query = mysql_query("Insert into grades(rollno, $val) values('$roll', '$grade')");
            if($query){
              echo "<script>alert('dat successfully insertered');</script>";
              echo "<script>window.location.href= 'grades.php?id=$roll';</script>";
            }
          }else{

            $query = "UPDATE grades set $val = '$grade' Where rollno='$roll'";
            $runQuery = mysql_query($query);
            
            if($runQuery){
            echo "<script>alert(' successfully insertered');</script>";
            echo "<script>window.location.href= 'grades.php?id=$roll';</script>";
          }
        }
      }


      ?>

      <?php include'HomeBottom.php'; ?>

<?php }else echo "Connection failed"?>

