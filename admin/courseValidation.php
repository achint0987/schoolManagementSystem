<?php
	include('../functions/function.php');
	if(isset($_POST['cname'])&& isset($_POST['ccode'])&& isset($_POST['semester'])&& isset($_POST['branch']) && isset($_POST['ccredit'])){
		$cname=$_POST['cname'];
		$ccode=$_POST['ccode'];
		$semester=$_POST['semester'];
		$branch=$_POST['branch'];
		$credit=$_POST['ccredit'];
		$cname=InjectionCheck($cname);
		$ccode=InjectionCheck($ccode);
		$semester=InjectionCheck($semester);
		$branch=InjectionCheck($branch);
		$credit=InjectionCheck($credit);
		// Connecting to the database
			include '../connection/dbCon.php';
		
		// query to check for data duplication

			$query = "select courseCode from coursesdetails where courseCode = '$ccode'";
			$runQuery= mysql_query($query);
		//check the number of rows found in the database
			if(mysql_num_rows($runQuery) > 0){
				echo "<script>alert('Course already Exist');</script>";
				echo "<script>window.location.href= 'addCourse.php'</script>";
			}
			else{
				$query= "insert into coursesdetails values('$ccode','$cname','$semester','$branch', '$credit')";
			}
			$runQuery = mysql_query($query);
				if($runQuery){
			echo "<script>alert('Successfully Added');</script>";
			echo "<script>window.location.href= 'courses.php'</script>";
		}else{
			echo "<script>alert('Unable to Add');</script>";
			echo "<script>window.location.href= 'addCourse.php'</script>";
		}
			


	}
	?>
	