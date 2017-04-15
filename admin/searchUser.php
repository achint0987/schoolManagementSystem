<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['rollno'])){

      include 'head.php';
    ?>


      <?php include 'HomeHeader.php'; ?>

      <?php include 'HomeSidebar.php';?>

          <ol class="breadcrumb ">
              <li><a href="Home.php"><i class="glyphicon glyphicon-home "></i> Home</a></li>
              <li><a href="Profile.php"><i class="glyphicon glyphicon-user active"></i> Profile</a></li>
          </ol>
          

          <div class="container">
            <div class="well">
             <form action="searchUser.php" method="post">
                <div class="input-group">
                  <input type="text" name="user" class="form-control" placeholder="Search User...">
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
                  if(isset($_POST['search'])){
                    $search = $_POST['user'];
                    $query = "select * from studentdetails where RollNo like  '%$search%' or FirstName like '%$search%' or LastName like '%$search%' or Email like '%$search%'";
                    $runQuery = mysql_query($query);
                    
                    if($runQuery){
                      echo "Number Of Results Found: ". mysql_num_rows($runQuery);

                      echo "<tr style='font-size: 18px'  class='danger'>
                                      <td>Roll No</td>
                                      <td>NAME</td>
                                      <td>Email</td>
                                      <td>View</td>
                                    </tr>";
                      
                      while($row = mysql_fetch_array($runQuery)){
                        $roll = $row['RollNo'];
                        echo "<tr>
                                          <td>".$row['RollNo']."</td>
                                          <td>".$row['FirstName']." ". $row['LastName']."</td>
                                          <td>".$row['Email']."</td>
                                        <td>
                                          <a href= 'searchedResult.php?id=$roll' class='btn' ><i class='glyphicon glyphicon-edit'></i></a>    
                                        </td>
                                            
                                        </tr>";

                      }
                    }else{
                      echo "not ";
                    }
                  } ?> 
                </tbody>
              </table>
            </div>
            </div>
           </div>
        </section>
      </div>


      <?php include'HomeBottom.php'; ?>



<?php }else echo "Connection failed"?>