<?php
	include('../functions/function.php');
	if(isset($_POST['fname'])&& isset($_POST['lname'])&& isset($_POST['email'])&& isset($_POST['password'])){
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$fname=InjectionCheck($fname);
		$lname=InjectionCheck($lname);
		$email=InjectionCheck($email);
		$password=InjectionCheck($password);
		$password=md5($password);
		
		// Connecting to the database
			include '../connection/dbCon.php';
		
		// query to check for data duplication

			$query = "select email from admin where email = '$email'";
			
			$runQuery= mysql_query($query);
		//check the number of rows found in the database
			if(mysql_num_rows($runQuery) > 0){
				echo "<script>alert('Email already Exist');</script>";
				echo "<script>window.location.href= 'admin.php'</script>";
			}
			else{
				$query= "insert into admin values('$fname','$lname','$email','$password')";
				
			}
			
			$runQuery = mysql_query($query);
				if($runQuery){
			echo "<script>alert('successfully Added');</script>";
			echo "<script>window.location.href= 'admin.php'</script>";
		}else{
			echo "<script>alert('Unable to Add');</script>";
			echo "<script>window.location.href= 'admin.php'</script>";
		}
	}
?>