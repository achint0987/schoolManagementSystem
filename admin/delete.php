<?php
	if(isset($_GET['id'])){
		$roll = $_GET['id'];
		include '../connection/dbCon.php';

		$query = "DELETE  FROM studentdetails where RollNo='$roll'";
		$runQuery = mysql_query($query);

		$query = "DELETE  FROM courses where rollno='$roll'";
		$runQuery = mysql_query($query);

		$query = "DELETE  FROM grades where rollno='$roll'";
		$runQuery = mysql_query($query);

		$query = "DELETE  FROM attendance where rollno='$roll'";
		$runQuery = mysql_query($query);

		if($runQuery){
			echo "<script>alert('successfully Deleted');</script>";
			echo "<script>window.location.href= 'students.php'</script>";
		}else{
			echo "<script>alert('Unable to delete');</script>";
			echo "<script>window.location.href= 'students.php'</script>";
		}
	}else{
		echo "<script>alert('Unable to delete');</script>";
			echo "<script>window.location.href= 'students.php'</script>";
	}

?>