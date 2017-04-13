          <ol class="breadcrumb ">
              <li><a href="Home.php"><i class="glyphicon glyphicon-home "></i> Home</a></li>
              <li><a href="subject.php"><i class="glyphicon glyphicon-user active"></i> Subject</a></li>
          </ol>
          
          <div class="container">
            <div class="well">
                <form method="get">
                  <input type="number" placeholder="Semester" class="form-control" name="semester" required="required"><br>
                  <input type="submit" value="Check your grade as per your semester" class="btn btn-block btn-flat btn-primary">
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


                    $query = "select * from courses";
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
                    $query = "select * from grades";
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
                            <td>GRADES</td>

                          </tr>";
                    $totalGrade = 0;
                    $totalCredit =0;
                  
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

                        $totalCredit = $totalCredit + $row['grade'];

                        if($val == 'A+'){
                          $totalGrade = $totalGrade + 10* $row['grade'];
                        }else if($val == 'A'){
                          $totalGrade = $totalGrade + 9* $row['grade'];
                        }else if($val == 'B+'){
                          $totalGrade = $totalGrade + 8* $row['grade'];
                        }else if($val == 'B'){
                          $totalGrade = $totalGrade + 7* $row['grade'];
                        }else if($val == 'C+'){
                          $totalGrade = $totalGrade + 6* $row['grade'];
                        }else if($val == 'C'){
                          $totalGrade = $totalGrade + 5* $row['grade'];
                        }else if($val == 'D+'){
                          $totalGrade = $totalGrade + 4* $row['grade'];
                        }else if($val == 'D'){
                          $totalGrade = $totalGrade + 4* $row['grade'];
                        }else if($val == 'F'){
                          $totalGrade = $totalGrade + 2* $row['grade'];
                        }

                        if($row!=0)
                          echo "<tr class='success'>
                                  <td>".$k."</td>
                                  <td>".$row['courseName']."</td>
                                  <td>".$val."</td>
                                </tr>";
                        
                      }
                      echo "<tr style='font-size: 18px' class='danger'>
                                  <td></td>
                                  <td> SPI</td>
                                  <td>".round($totalGrade/$totalCredit, 1)."</td>
                                </tr>";

                      }else{
                        echo "<center><h3><div class='container'><div class='well'>Grades Not Update Yet</div></div></h3></center>";
                      }
                    
                    

               ?>
              </tbody>
            </table>
              </div>
              
           </div>
        </div>

        </section>
      </div>