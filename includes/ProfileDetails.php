		<ol class="breadcrumb ">
              <li><a href="Home.php"><i class="glyphicon glyphicon-home "></i> Home</a></li>
              <li><a href="Profile.php"><i class="glyphicon glyphicon-user active"></i> Profile</a></li>
          </ol>
          <!-- table to display user profile -->
         <div class="container">
           <div class="row">
           		<div class="col-sm-4">
           			<img class="imageStyle" src=<?php echo findPic($_SESSION['rollno']);?>  alt="User Image">
           		</div>
           		<div class="col-sm-8" id=" tableStyle">
					<table class="table">
					    <tbody>
					     <tr class="success">
					        <th>NAME</th>
					        <td>:</td>
					        <td><span class="subName"><?php echo getName($_SESSION['rollno']); ?></td>
					      </tr>
					      <tr class="danger">
					        <th>ROLL NO.</th>
					        <td>:</td>
					        <td><span class="subName"><?php echo $_SESSION['rollno']; ?></span></td>
					      </tr>
					      <tr class="info">
					        <th>EMAIL</th>
					        <td>:</td>
					        <td><span class="subName"><?php echo getEmail($_SESSION['rollno']); ?></span></td>
					      </tr>
					      <tr class="warning">
					        <th>BRANCH</th>
					        <td>:</td>
					        <td><span class="subName"><?php echo getBranch($_SESSION['rollno']); ?></span></td>
					      </tr>
					      <tr class="active">
					        <th>BATCH</th>
					        <td>:</td>
					        <td><span class="subName"><?php echo getBatch($_SESSION['rollno']); ?></span></td>
					      </tr>
					      <tr class="success">
					        <th>CONTACT</th>
					        <td>:</td>
					        <td><span class="subName"><?php echo getContact($_SESSION['rollno']); ?></td>
					      </tr>
					      <tr class="danger">
					        <th>ADDRESS</th>
					        <td>:</td>
					        <td><span class="subName"><?php echo getAddress($_SESSION['rollno']); ?></span></td>
					      </tr>
					    </tbody>
					  </table>
           		</div>
           		
           </div>
        </div><br></br>
        <!-- End of table -->
        <!-- Use of modals to change password, image and contact -->
        <div class="container">
        	<div class="row">
        		<div class="col-xs-2">
        			<button class="btn btn-primary btn-flat btn-wide" data-toggle="modal" data-target="#changePic">Change Picture</button>
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
        		<div class="col-xs-2">
        			<button class="btn btn-primary btn-flat btn-wide" data-toggle="modal" data-target="#changePass">Change Password</button>
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
					    <div class="col-xs-2">
		        		<button class="btn btn-primary btn-flat btn-wide" data-toggle="modal" data-target="#changePhone">Change Phone</button>
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
 		$check = updatePassword($_POST['currentPass'], $_POST['newPass'], $_SESSION['rollno']);
 		if($check == "noMatch"){
 			echo "<script>alert('Password Doesn\'t match');</script>";
 		}else if($check == 'ohk'){
 			echo "<script>alert('Password successfully Changed');</script>";
 		}
 	}

 	if(isset($_POST['imageUpload']) ){

 		$imageTarget= 	"../images/".basename($_FILES['img']['name']);
 		$rollno = $_SESSION['rollno'];
 		$image = $_FILES['img']['name'];
 		$query = "update studentDetails set image='$image' where RollNo = '$rollno'";
	  	$runQuery = mysql_query($query);
	  	if($runQuery){
	  		if(move_uploaded_file($_FILES['img']['tmp_name'], $imageTarget)){
	  			echo "<script>alert('Picture update successfully');</script>";
	  		}
	  	}
 		
 	}
 	if(isset($_POST['phone'])){
 		$check = updatePhone($_POST['currentPhone'], $_SESSION['rollno']);
 		if($check == 'ohk'){
 			echo "<script>alert('Phone Number successfully Changed');</script>";
 		}
 	}

 ?>
