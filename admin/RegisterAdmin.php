<?php

	if(isset($_POST['btn'])){
		$email=$_POST['btn'];
		$query = "DELETE FROM admin WHERE email='$email';";
		$run=mysql_query($query);
		if($run){
			echo "<script>alert('successfully Deleted');</script>";
			echo "<script>window.location.href= 'admin.php'</script>";
		}else{
			echo "<script>alert('Unable to delete');</script>";
			echo "<script>window.location.href= 'admin.php'</script>";
		}
	}
?> 






 <div class="container">
	<ol class="breadcrumb ">
            <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Home</a></li>
            <li><a href="admin.php"><i class="glyphicon glyphicon-education"></i> Admin Add/Edit</a></li>
        </ol>
	
	<ul class="nav nav-pills">
	<li class="active"><a href="#add" data-toggle="tab">Add</a></li>
	<li><a href="#edit" data-toggle="tab">Edit</a></li>
	</ul>
	<div id='tab' class='container'>
	<div class="tab-content well">
		<div class="tab-pane active" id="add">
			<form class="form-horizontal" action="AddAdmin.php" method="post" onsubmit="return confirm()">
				<div class ="form-group">
					<label for="inputPassword" class="control-label col-xs-2">Firstname</label>
                        <div class="col-xs-4">
                            <input type="text" name="fname" class="form-control" id="inputPassword" placeholder="Firstname" required>
                        </div>
                        
                     <label for="inputPassword" class="control-label col-xs-2">Lastname</label>
                        <div class="col-xs-4">
                            <input type="text" name="lname" class="form-control" id="inputPassword" placeholder="Lastname" required>
                      </div>
				</div>
				<div class ="form-group">
					<label for="inputPassword" class="control-label col-xs-2">E-mail ID</label>
                        <div class="col-xs-4">
                            <input type="email" name="email" class="form-control" id="inputPassword" placeholder="E-mail" required>
                        </div>
                        
                     <label for="inputPassword" class="control-label col-xs-2">Password</label>
                        <div class="col-xs-4">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
                      </div>
				</div>
				<div class="col-xs-offset-2 col-xs-10">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
				
			</form>
			
			
		</div>
		<div class="tab-pane" id="edit">
			<?php
				$query = "select * from admin";
				$runQuery=mysql_query($query);
				if(mysql_num_rows($runQuery) > 0){
					
					echo	" <table class='table table-bordered table-hover'>
							<thead>
							<tr class='success'>
								<th><h3>FirstName</h3></th>
								<th><h3>LastName</h3></th>
								<th><h3>Email</h3></th>
								<th></th>
								<th></th> </tr>
							</thead> ";
				while($row = mysql_fetch_array($runQuery)){
						echo	"<tbody>
								<tr>
								<td>". $row['fname'] . "</td>
								<td>". $row['lname'] . "</td>
								<td>". $row['email'] . "</td>
								<div class='col-xs-2'>
								<td> <form action='admin.php' method='post' onsubmit='return confirm()'>
											<button type='submit' class='btn btn-link' name='btn' value=". $row['email'].">
											<span class='glyphicon glyphicon-remove'></span>
											</button>
									</form> </td> </div><td>
									<form action='AdminEdit.php'method='post'>
											<button type='submit' class='btn btn-link' name='btn' value=". $row['email']. ">
											<span class='glyphicon glyphicon-edit'></span>
											</button></form></td>
								</td></tr>";
							
					}
					echo "</tbody>
						 </table>";
				} 
			?>
			
		</div>
	</div>
	</div>
	</div>
	   </section><!-- /.content -->
      </div>
    
