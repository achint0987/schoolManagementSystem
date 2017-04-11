    <ol class="breadcrumb ">
              <li><a href="Home.php"><i class="glyphicon glyphicon-home "></i> Home</a></li>
              <li><a href="subject.php"><i class="glyphicon glyphicon-user active"></i> Subject</a></li>
          </ol>
          <!-- table to display user profile -->
         <div class="container">
           <div class="row well">
          <div class="col-sm-12" id=" tableStyle">
          <table class="table">
            
              <tbody class="studentbody">
               <?php 
                    $semester = getSemester($_SESSION['rollno']);
                    $branch   = getBranch($_SESSION['rollno']);

                    $query = "select * from courses ";
                    $runQuery = mysql_query($query);
                    $row = mysql_fetch_array($runQuery);
                    echo "<tr style='font-size: 18px'  class='danger'>
                            <td>COURSE CODE</td>
                            <td>COURSE NAME</td>
                            <td>FACULTY</td>

                          </tr>";
                   
                   while ($fieldinfo=mysql_fetch_field($runQuery)){
                      if($row[$fieldinfo->name] !=0 && $fieldinfo->name != 'rollno'){
                        $query1 = "select * from coursesdetails where courseCode = '$fieldinfo->name' AND semester=1";
                        $runQuery1 = mysql_query($query1);
                        $row1 = mysql_fetch_array($runQuery1);
                        
                        if($row1 !=0){

                            $query2 = "select * from facultycourses where courseCode = '$fieldinfo->name'";
                            $runQuery2 = mysql_query($query2);
                            $row2 = mysql_fetch_array($runQuery2);
                            $row2 = $row2['facultyEmail'];
                            if(strpos($row2, "|")!== false){
                              
                              $x = strpos($row2, "|");
                              $emails = $row2;

                              $y = strpos($emails, "|");
                              $emails1 = substr($emails, 0, $y);
                              $emails2 = substr($emails, $y+1, strlen($emails));

                              $array1 = substr($row2, 0, $x);
                              $array2 = substr($row2, $x+1, strlen($row2));
                             
                              $query2 = "select * from faculty where Email = '$array1'";
                              $query3 = "select * from faculty where Email = '$array2'";

                              $runQuery2 = mysql_query($query2);
                              $row2 = mysql_fetch_array($runQuery2);

                              $runQuery3 = mysql_query($query3);
                              $row3 = mysql_fetch_array($runQuery3);
                        
                              echo "<tr class='success'>
                                      <td>".$fieldinfo->name."</td>
                                      <td>".$row1['courseName']."</td>
                                      <td>"."<a href='http://web.iiitdmj.ac.in/~$emails1' >".$row2['Name']."</a> || <a href='http://web.iiitdmj.ac.in/~$emails2' > ".$row3['Name'] ."</a></td>
                                    </tr>";
                              

                            }else{
                              $query2 = "select * from faculty where Email = '$row2'";
                              $runQuery2 = mysql_query($query2);
                              $row3 = mysql_fetch_array($runQuery2);

                               echo "<tr class='success'>
                                      <td>".$fieldinfo->name."</td>
                                      <td>".$row1['courseName']."</td>
                                      <td><a href='http://web.iiitdmj.ac.in/~$row2'>".$row3['Name']."</a></td>
                                    </tr>";
                            }

                        }
                        
                        
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