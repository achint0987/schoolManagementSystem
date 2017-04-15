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
                <form method="get">
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
                            $semester = getSemester($_SESSION['rollno']);
                            $query = "select * from courses where rollno='$roll'";
                            $runQuery = mysql_query($query);
                            $row = mysql_fetch_array($runQuery);

                            $array= array();
                            $i=0;
                          
                          while($fieldinfo = mysql_fetch_field($runQuery))
                            {
                              if($fieldinfo->name != 'rollno' && $row[$fieldinfo->name] == 1){
                                $array[$i] = $fieldinfo->name;
                                $i++;
                              }
                            }
                            $query = "select * from attendance where rollno='$roll'";
                            $runQuery = mysql_query($query);
                            $row = mysql_fetch_array($runQuery);

                            $i=0;
                            $j=0;
                            $val = array();
                            $grades = array();
                            while($fieldinfo = mysql_fetch_field($runQuery))
                            {
                              if($fieldinfo->name != 'rollno' ){
                                $grades[$fieldinfo->name] = $row[$fieldinfo->name];
                                $i++;
                              }
                            }
                            $actual = array();
                            for($i=0;$i<sizeof($array); $i++){
                              if($grades[$array[$i]]){
                                $actual[$array[$i]] = $grades[$array[$i]];
                              }
                            }
                            
                            
                            echo "<tr style='font-size: 18px'   class='danger'>
                            <td>COURSE CODE</td>
                            <td>COURSE NAME</td>
                            <td>PRESENT</td>
                            <td>TOTAL</td>
                            <td>EDIT PRESENT</td>
                            <td>EDIT TOTAL</td>
                            <td></td>
                            </tr>";
                            $fieldinfo="";
                            foreach($actual as $k => $val){
                            if(isset($_GET['semester'])){
                                $sem = $_GET['semester'];
                                $query = "select * from coursesdetails where courseCode = '$k' AND semester='$sem'";
                              }else{
                                $query = "select * from coursesdetails where courseCode = '$k' AND semester='$semester'";
                              }
                            $runQuery = mysql_query($query);
                            $row = mysql_fetch_array($runQuery);
                            $x;$y;$z;
                          
                            if(strpos($val,"|") != false){
                              $x = strpos($val, "|");
                              $y = substr($val, 0, $x);
                              $z = substr($val, $x+1, strlen($val));
                            }
                           
                            

                            if($row!=0)
                              echo "<tr class='success'><form method='GET'>
                                      <td>".$k."</td>
                                      <td>".$row['courseName']."</td>
                                      <td>".$y."</td>
                                      <td>".$z."</td>
                                      <td> 
                                        <input type='text' value='$roll' name='id' hidden>
                                        <input type='text' value=$k name='sub' hidden>
                                        <input type='text' class='form-control' name='present' style='width: 55px; height: 27px'></td>
                                      <td><input type='text' class='form-control' name='total' style='width: 55px; height: 27px'></td>
                                      <td><button class='btn btn-danger btn-xs btn-block' name='update'>Update</button></td>
                                      </form>
                                    </tr>";
                            
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
          $sub = $_GET['sub'];
          $present = $_GET['present'];
          $total = $_GET['total'];
          $val = $present."|".$total;
          $query = mysql_query("select * from attendance where rollno = '$roll'");

          $var = mysql_num_rows($query);
          
          if(mysql_num_rows($query) == 0){
            $query = mysql_query("Insert into attendance(rollno, $sub) values('$roll', '$val')");
            if($query){
              echo "<script>alert('dat successfully insertered');</script>";
              echo "<script>window.location.href= 'grades.php?id=$roll';</script>";
            }
          }else{

            $query = "UPDATE attendance set $sub = '$val' Where rollno='$roll'";
            $runQuery = mysql_query($query);
            
            if($runQuery){
            echo "<script>alert(' successfully insertered');</script>";
            echo "<script>window.location.href= 'attendance.php?id=$roll';</script>";
          }
        }
      }


      ?>

      <?php include'HomeBottom.php'; ?>

<?php }else echo "Connection failed"?>

