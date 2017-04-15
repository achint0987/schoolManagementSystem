<?php
	session_start();
	include '../connection/dbCon.php';
  	include '../functions/function.php';

  	if(isset($_POST['email']) && isset($_POST['fname'])&& isset($_POST['lname'])&&  isset($_POST['password'])){
  		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$fname=InjectionCheck($fname);
		$lname=InjectionCheck($lname);
		$email=InjectionCheck($email);
		$password=InjectionCheck($password);
		$password=md5($password);
		$query= "UPDATE admin set fname='$fname', lname = '$lname' , password='$password'
		WHERE email='$email'";
		$runQuery= mysql_query($query);

		if($runQuery){
			echo "<script>alert('successfully Updated');</script>";
			echo "<script>window.location.href= 'admin.php'</script>";
		}else{
			echo "<script>alert('Unable to Update');</script>";
			echo "<script>window.location.href= 'admin.php'</script>";
		}
  	}
?>