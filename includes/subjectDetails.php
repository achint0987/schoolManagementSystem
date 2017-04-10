    <ol class="breadcrumb ">
              <li><a href="Home.php"><i class="glyphicon glyphicon-home "></i> Home</a></li>
              <li><a href="subject.php"><i class="glyphicon glyphicon-user active"></i> Subject</a></li>
          </ol>
          <!-- table to display user profile -->
         <div class="container">
           <div class="row">
              <div class="col-sm-12" id=" tableStyle">
          <table class="table">
            
              <tbody class="studentbody">
               <?php 
                    $semester = getSemester($_SESSION['rollno']);
                    $branch   = getBranch($_SESSION['rollno']);

                    $query = "select * from courses ";
                    $runQuery = mysql_query($query);
                    $row = mysql_fetch_array($runQuery);
                    echo "<tr style='font-size: 18px'  class='danger'><td>COURSE CODE</td><td>COURSE NAME</td></tr>";
                   
                   while ($fieldinfo=mysql_fetch_field($runQuery)){
                      if($row[$fieldinfo->name] !=0 && $fieldinfo->name != 'rollno'){
                        $query1 = "select * from coursesdetails where courseCode = '$fieldinfo->name' AND semester=1";
                        $runQuery1 = mysql_query($query1);
                        $row1 = mysql_fetch_array($runQuery1);
                    
                          echo "<tr class='success'><td>".$fieldinfo->name."</td><td>".$row1['courseName']."</td></tr>";
                    
                          
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
