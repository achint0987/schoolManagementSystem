<?php
	session_start();
	include '../connection/dbCon.php';
  	include '../functions/function.php';

  	if(isset($_SESSION['Email'])){
  		include '../includes/head.php';
    ?>
     <?php include 'HomeHeader.php'; ?>

      <?php include 'HomeSidebar.php';?>
      <?php $email = $_POST['btn']; 
      	$query= "SELECT * FROM admin WHERE email = '$email'";
      	$runQuery=mysql_query($query);
      	if(mysql_num_rows($runQuery) > 0){
      		while($row = mysql_fetch_array($runQuery)){
      			$fname=$row['fname'];
      			$lname=$row['lname'];
      		}

      	}

      ?>
      <div class="container">
     <ol class="breadcrumb ">
            <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Home</a></li>
            <li><a href="Admin.php"><i class="glyphicon glyphicon-education"></i> Admin Add/Edit</a></li>
            <li><a href="AdminEdit.php"><i class="fa fa-edit"></i> Edit</a></li>
        </ol> 

        <form class="form-horizontal" action="edit.php" method="post" onsubmit="return confirm()">
        	<div class ="form-group">
					<label for="inputPassword" class="control-label col-xs-2">Firstname</label>
                        <div class="col-xs-4">
                           <?php echo "<input type='text' name='fname' class='form-control' id='inputPassword' placeholder='Firstname' value=" . $fname . " required >" ?>
                        </div>
                        
                     <label for="inputPassword" class="control-label col-xs-2">Lastname</label>
                        <div class="col-xs-4">
                            <?php echo "<input type='text' name='lname' class='form-control' id='inputPassword' placeholder='Lastname' value=" . $lname . " required >" ?>
                      </div>
				</div>
			<div class ="form-group">
				<?php echo "<h3 align='right'> E-mail:" . $email . "</h3>"?>
				<right><label for="inputPassword" class="control-label col-xs-2">Password</label>
                        <div class="col-xs-4">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
                 </div> </right>
			</div>
			<div class="col-xs-offset-2 col-xs-10">
                           <?php echo " <button type='submit' name='email' value=". $email . " class='btn btn-primary'>Edit</button> "; ?>
                        </div>
					
        </form>
      </div>
      <?php } ?>
       </section><!-- /.content -->
      </div>
      