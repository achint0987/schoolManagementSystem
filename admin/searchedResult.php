<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['Email'])){

      include '../includes/head.php';
    ?>


      <?php include 'HomeHeader.php'; ?>

      <?php include 'HomeSidebar.php';?>

      <?php $roll = $_GET['id']?>

        <ol class="breadcrumb ">
            <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Home</a></li>
            <li><a href="students.php"><i class="fa fa-dashboard"></i> Students</a></li>
        </ol>
          <div class="container">
           <div class="row well">
              <div class="col-sm-4">
                <img class="imageStyle" src=<?php echo findPic($roll);?>  alt="User Image">
              </div>
              <div class="col-sm-8" id=" tableStyle">
                <table class="table">
                    <tbody>
                     <tr class="success">
                        <th>NAME</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getName($roll); ?></td>
                        <td><button class='btn btn-xs' name='name' data-toggle="modal" data-target='#name'><i class='glyphicon glyphicon-pencil'></i></button></td>
                        <div class="modal fade" id="name" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Change Name</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                              <form method="post">
                              <div class="form-group">
                                <label for="email">First Name:</label>
                                <input type="text" name="firstname" class="form-control" required="required">
                              </div>

                              <div class="form-group">
                                <label for="pwd">Last Name:</label>
                                <input type="text" name="lastname" class="form-control" required="required">
                              </div>
                              <div class="modal-footer">
                              <button type="submit" class="btn btn-danger" name="editName">Update</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                              </form>
                              </p>
                            </div>
                          </div>
                      
                    </div>
                      </tr>
                      <tr class="danger">
                        <th>ROLL NO.</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo $roll; ?></span></td>
                        <td><button class='btn btn-xs' data-target='#roll' data-toggle='modal' name='roll'><i class='glyphicon glyphicon-pencil'></i></button></td>

                        <div class="modal fade" id="roll" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Change Roll no.</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                              <form method="post">
                                <div class="form-group">
                                <label for="email">Roll No. :</label>
                                <input type="text" name="roll" class="form-control" required="required">
                              </div>
                              <div class="modal-footer">
                              <button type="submit" class="btn btn-danger" name="editRoll">Update</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                              </form>
                              </p>
                            </div>
                          </div>

                      </tr>
                      <tr class="info">
                        <th>EMAIL</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getEmail($roll); ?></span></td>
                        <td><button class='btn btn-xs' data-target='#mail' data-toggle='modal' name='email'><i class='glyphicon glyphicon-pencil'></i></button></td>

                        <div class="modal fade" id="mail" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Change Email</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="email" name="email" class="form-control" required="required">
                                  </div>
                                <div class="modal-footer">
                              <button type="submit" class="btn btn-danger" name="editEmail">Update</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                              </form>
                              </p>
                            </div>
                          </div>
                      </tr>
                      <tr class="warning">
                        <th>BRANCH</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getBranch($roll); ?></span></td>
                        <td><button class='btn btn-xs' data-target='#bra' data-toggle='modal' name='branch'><i class='glyphicon glyphicon-pencil'></i></button></td>

                        <div class="modal fade" id="bra" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Change Branch</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                              <form method="post">
                                <div class="form-group">
                                <label for="email">Branch :</label>
                                <input type="text" name="branch" class="form-control" required="required">
                              </div>
                                <div class="modal-footer">
                              <button type="submit" class="btn btn-danger" name="editBranch">Update</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                              </form>
                              </p>
                            </div>
                          </div>
                      </tr>
                      <tr class="active">
                        <th>BATCH</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getBatch($roll); ?></span></td>
                        <td><button class='btn btn-xs' data-target='#bat' data-toggle='modal' name='batch'><i class='glyphicon glyphicon-pencil'></i></button></td>

                        <div class="modal fade" id="bat" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Change Batch</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                              <form method="post">
                                <div class="form-group">
                                <label for="email">Batch :</label>
                                <input type="text" name="batch" class="form-control" required="required">
                              </div>
                                <div class="modal-footer">
                              <button type="submit" class="btn btn-danger" name="editBatch">Update</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                              </form>
                              </p>
                            </div>
                          </div>
                      </tr>
                      <tr class="success">
                        <th>CONTACT</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getContact($roll); ?></td>
                        <td><button class='btn btn-xs' data-target='#con' data-toggle='modal' name='contact'><i class='glyphicon glyphicon-pencil'></i></button></td>

                        <div class="modal fade" id="con" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Change Your Profile Pic here</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                              <form method="post">
                                <div class="form-group">
                                <label for="email">Phone :</label>
                                <input type="text" name="contact" class="form-control" required="required">
                              </div>
                                <div class="modal-footer">
                              <button type="submit" class="btn btn-danger" name="editContact">Update</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                              </form>
                              </p>
                            </div>
                          </div>
                      </tr>
                      <tr class="danger">
                        <th>ADDRESS</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getAddress($roll); ?></span></td>
                        <td><button class='btn btn-xs' data-target='#add' data-toggle='modal' name='address'><i class='glyphicon glyphicon-pencil'></i></button></td>

                        <div class="modal fade" id="add" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Change Address</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                              <form method="post">
                                <div class="form-group">
                                <label for="email">Address :</label>
                                <input type="text" name="address" class="form-control" required="required">
                              </div>
                                <div class="modal-footer">
                              <button type="submit" class="btn btn-danger" name="editAddress">Update</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                              </form>
                              </p>
                            </div>
                          </div>
                      </tr>
                    </tbody>
                  </table>
                    </div>
                    
                 </div>
              </div><br></br>
              <!-- End of table -->
              <!-- Use of modals to change password, image and contact -->
              <div class="container">
                <div class="row well">
                  <div class="col-xs-4">
                    <button class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#changePic">Change Picture</button>
                    <div class="modal fade" id="changePic" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Change Your Profile Pic here</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                          <form method="post" enctype="multipart/form-data">
                            <input type="file" name="img">
                            <div class="modal-footer">
                          <button type="submit" class="btn btn-danger" name="imageUpload">Upload</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                          </p>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  </div>
                  <div class="col-xs-4">
                    <button class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#changePass">Change Password</button>
                    <div class="modal fade" id="changePass" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Change Your Password</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                            <form method="post">
                        <div class="form-group">
                          <label for="email">Current Password:</label>
                          <input type="password" name="currentPass" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                          <label for="pwd">New Password:</label>
                          <input type="password" name="newPass" class="form-control" required="required">
                        </div>
                          </p>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger" name="password">Update</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                           
                    </form>
                        </div>
                      </div>
                      </div>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <button class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#changePhone">Change Phone</button>
                        <div class="modal fade" id="changePhone" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Change Your Contact</h4>
                            </div>
                            <div class="modal-body">
                              <p>
                              <form method="post">
                            <div class="form-group">
                              <label for="email">New Phone Number:</label>
                              <input type="text" name="currentPhone" class="form-control" required="required">
                            </div>
                                </p>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" name="phone">Update</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                              </form>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>

                  </div>
              </div>
              

              </section>
            </div>

       <?php 

        if(isset($_POST['password'])){
          $check = updatePassword($_POST['currentPass'], $_POST['newPass'], $_SESSION['$rollno']);
          if($check == "noMatch"){
            echo "<script>alert('Password Doesn\'t match');</script>";
          }else if($check == 'ohk'){
            echo "<script>alert('Password successfully Changed');</script>";
          }
        }

        if(isset($_POST['imageUpload']) ){

          $imageTarget=   "../images/".basename($_FILES['img']['name']);
          $$rollno = $_SESSION['$rollno'];
          $image = $_FILES['img']['name'];
          $query = "update studentDetails set image='$image' where $rollNo = '$$rollno'";
            $runQuery = mysql_query($query);
            if($runQuery){
              if(move_uploaded_file($_FILES['img']['tmp_name'], $imageTarget)){
                echo "<script>alert('Picture update successfully');</script>";
              }
            }
          
        }
        if(isset($_POST['phone'])){
          $check = updatePhone($_POST['currentPhone'], $_SESSION['$rollno']);
          if($check == 'ohk'){
            echo "<script>alert('Phone Number successfully Changed');</script>";
          }
        }
        if(isset($_POST['editName'])){
          $roll = $_GET['id'];
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $query = "update studentDetails set FirstName='$firstname', LastName='$lastname' where RollNo='$roll'";
          $runQuery = mysql_query($query);

          if($runQuery){
            echo "<script>alert('Name Changed Successfully');</script>";
            echo "<script>window.location.href='studentEdit.php?id=$roll'</script>";
          }
        }

        if(isset($_POST['editRoll'])){
          $roll = $_GET['id'];
          $RollNo = $_POST['roll'];
          $query = "update studentDetails set RollNo='$RollNo' where Rollno='$roll'";
          $runQuery = mysql_query($query);
           
          $query = "update courses set rollno='$RollNo' where rollno='$roll'";
          $runQuery = mysql_query($query);

          $query = "update grades set rollno='$RollNo' where rollno='$roll'";
          $runQuery = mysql_query($query);

          $query = "update attendance set rollno='$RollNo' where rollno='$roll'";
          $runQuery = mysql_query($query);

          if($runQuery){
            echo "<script>alert('RollNo Changed Successfully');</script>";
            echo "<script>window.location.href='studentEdit.php?id=$RollNo'</script>";
          }
        }

        if(isset($_POST['editEmail'])){
          $roll = $_GET['id'];
          $email = $_POST['email'];
         
          $query = "update studentDetails set Email='$email' where RollNo=$roll";
          $runQuery = mysql_query($query);

          if($runQuery){
            echo "<script>alert('Email Changed Successfully');</script>";
            echo "<script>window.location.href='studentEdit.php?id=$roll'</script>";
          }
        }
        if(isset($_POST['editBranch'])){
          $roll = $_GET['id'];
          $email = $_POST['branch'];
         
          $query = "update studentDetails set Branch='$email' where RollNo=$roll";
          $runQuery = mysql_query($query);

          if($runQuery){
            echo "<script>alert('Email Changed Successfully');</script>";
            echo "<script>window.location.href='studentEdit.php?id=$roll'</script>";
          }
        }

        if(isset($_POST['editBatch'])){
          $roll = $_GET['id'];
          $email = $_POST['batch'];
         
          $query = "update studentDetails set yearOfJoining='$email' where RollNo=$roll";
          $runQuery = mysql_query($query);

          if($runQuery){
            echo "<script>alert('Batch Changed Successfully');</script>";
            echo "<script>window.location.href='studentEdit.php?id=$roll'</script>";
          }
        }

        if(isset($_POST['editContact'])){
          $roll = $_GET['id'];
          $email = $_POST['contact'];
         
          $query = "update studentDetails set contactNum='$email' where RollNo=$roll";
          $runQuery = mysql_query($query);

          if($runQuery){
            echo "<script>alert('Phone Number Changed Successfully');</script>";
            echo "<script>window.location.href='studentEdit.php?id=$roll'</script>";
          }
        }

        if(isset($_POST['editAddress'])){
          $roll = $_GET['id'];
          $email = $_POST['address'];
         
          $query = "update studentDetails set Address='$email' where RollNo=$roll";
          $runQuery = mysql_query($query);

          if($runQuery){
            echo "<script>alert('Address Changed Successfully');</script>";
            echo "<script>window.location.href='studentEdit.php?id=$roll'</script>";
          }
        }
       ?>

        
         </section>
      </div>
      
      <?php include'HomeBottom.php'; ?>

<?php }else echo "Connection failed"?>

    