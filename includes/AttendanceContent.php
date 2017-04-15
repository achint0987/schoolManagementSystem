        <ol class="breadcrumb ">
            <li><a href="Home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="attendance.php"><i class="fa fa-dashboard active"></i> Attendance</a></li>
        </ol>

          <div class="container">
            <div class="well">
                <form method="get">
                  <input type="number" placeholder="Semester" class="form-control" name="semester" required="required"><br>
                  <input type="submit" value="Check your attendance as per your semester" class="btn btn-block btn-flat btn-primary">
                </form>
            </div>
          </div>

         <div class="container">
           <div class="row well">
          <div class="col-sm-12" id=" tableStyle">
          <table class="table">
            
              <tbody class="studentbody">
               <?php 
                    $semester = getSemester($_SESSION['rollno']);
                    $branch   = getBranch($_SESSION['rollno']);

                    $roll = $_SESSION['rollno'];
                    
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
                            <td>TOTAL PRESENT</td>
                            <td>TOTAL CLASS</td>
                            <td>PERCENTAGE</td>

                          </tr>";
                    if($_SESSION['rollno'] == $row['rollno']){
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
                         
                          $percent = $y/$z*100;

                          if($row!=0)
                            echo "<tr class='success'>
                                    <td>".$k."</td>
                                    <td>".$row['courseName']."</td>
                                    <td>".$y."</td>
                                    <td>".$z."</td>
                                    <td>".round($percent,2)."</td>
                                  </tr>";
                          
                        }

                        }else{
                          echo "<center><h3><div class='container'>Attendance Not Update Yet</div></h3></center>";
                        }
                    
                    
                    

               ?>
              </tbody>
            </table>
              </div>
              
           </div>
        </div>
        
      </section>
    </div>