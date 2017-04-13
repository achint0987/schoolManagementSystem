<?php

	include '../connection/dbCon.php';

/*	$facultName = array(
			"Aparajita Ojha", "Atul Gupta", "Ayan Seal",
			"Kusum Kumari Bharti", "Manish Kumar Bajpai",
			"Pritee Khanna", "Ruchir Gupta", "Sraban Kumar Mohanty",
			"Vinod Kumar Jain", "Anil Kumar", "Dinesh Kumar V", 
			"Biswajeet Mukherjee", "Jawar Singh", "Manoj Singh Parihar",
			"Matadeen Bansal", "P.N Kondekar", "Prabin Kumar Padhy", 
			"Sachin Kumar Jain", "Varun Bajaj", "Amarnath M.",
			"Goutam Dutta", "H. Chelladurai", "Mohd. Zahid Ansari",
			"Pavan Kumar Kankar", "Prashant K. Jaan", "Puneet Tandon",
			"Sujoy Mukherjee", "Sunil Agrawal", "Tanuja Sheorey", 
			"Vijay Kumar Gupta", "Amaresh Chandra Mishra", "Asish K. Kundu",
			"Bhupendra Gupta", "Deepmala", "Lokendra Balyan", "Mamta Anand", 
			"Manoj Kumar Panda", "Mukesh Kumar Roy", "Neeraj K. Jaiswal",
			"Nihar Kumar Mahato", "Nihar Ranjan Jena", "Subir Lamba",
			"Yashpal Singh Katharria", "Prabir Mukhopadhyay", "Sangeeta Pandit",
			"Shekhar Chatterjee"
			);
	
	$facultyEmail = array(
			"aojha", "atul", "ayan", "kusum", "mkbajpai", "pkhanna",
			"rgupta", "sraban", "vkjain", "anilk", "dineshk", "b.mukherjee",
			"jawar", "mparihar", "mbansal", "pnkondekar", "prabin16",
			"skjain", "varunb", "amarnath", "gd", "chella", "zahid", 
			"kankar", "pkjain", "ptandon", "sujoy", "sa", "tanush",
			"vkgupta", "amresh", "asish.kundu", "bhupen", "deepmala",
			"balyan", "manand", "mkpanda", "mkroy", "neeraj", "nihar",
			"nrjena", "subirs", "yashpalk", "prabir", "s.pandit", "chatterjees"
			);

/*	for($i=0;$i<sizeof($facultyEmail); $i++)
{
	$query = "insert into faculty(Name, Email) values('$facultName[$i]', '$facultyEmail[$i]')";
	mysql_query($query);
}


	$courseCode = array(

	"NS101", "NS102", "HS101", "ES101", "ES102", "PR101", "ES204", "MN201", "ME201", "EC201", "CS201","NS205d", "NS205e", "NS205h", "NS205i", "NS205j", "EC202", "ME202", "CS202", "PR201"


	);
	$courseName = array(

	"Mathematics", "Engineering Mechanics", "Effective Communication Skills", "Fundamentals of Electrical & Electronics Engineering", "Fundamentals of Computing", "project", "Digital Electronics", "Manufacturing Process", "Kinematics and Dynamics of Machine", "Electronic Devices and Circuits", "DBMS","Applied Probability and statistics", "Numerical Methods","Material Science", "Culture and Science-a Comparison", "Mathematical Physics", "Instrumentation and Measurement",
		"IT Workshop", "OOPs with java", "project"

	);

	$semester = array(
		1, 1, 1, 1, 1, 1,3,3,3,3,3,3,3,3,3,3,3,3,3,3
		);
	$optional = array(
		0, 1, 2, 3, 4, 5, 0, 1, 2, 2, 2, 3, 3, 3, 3, 3,4,4,4,5
		);
	$branch = array(
		"ALL", "ALL", "ALL", "ALL","ALL", "ALL", "ALL", "ALL", "ME", "ECE", "CSE", "ALL", "ALL", "ALL", "ALL", "ALL",
		"ECE", "ME", "CSE","ALL"
		);

	for($i=0;$i<sizeof($courseCode); $i++){

		$query = "insert into coursesdetails(courseName, courseCode, semester,  branch) values('$courseName[$i]', '$courseCode[$i]', '$semester[$i]', '$branch[$i]')";
		mysql_query($query);
	}

	$courseCode = array(

	"NS101", "NS102", "HS101", "ES101", "ES102", "PR101", "ES204", "MN201", "ME201", "EC201", "CS201","NS205d", "NS205e", "NS205h", "NS205i", "NS205j", "EC202", "ME202", "CS202", "PR201"


	);

	$facultyEmail = array(
			"nihar|deepmala", "mkroy|yashpalk", "manand", "prabin16|dineshk", "ayan", "","b.mukherjee","chella|zahid", "tanush","dineshk","pkhanna", "bhupen", "gd","neeraj","manand","amresh","skjain","aks","kkb","tanush"
		);

	for($i=0;$i<sizeof($courseCode); $i++){

		$query = "insert into facultyCourses(courseCode, facultyEmail) values('$courseCode[$i]','$facultyEmail[$i]')";
		mysql_query($query);
	}
	
	*/

	//INSERT INTO `grades` (`rollno`, `NS101`, `NS102`, `HS101`, `ES101`, `ES102`, `PR101`, `ES204`, `MN201`, `ME201`, `EC201`, `CS201`, `NS205d`, `NS205e`, `NS205h`, `NS205i`, `NS205J`, `EC202`, `ME202`, `CS202`, `PR201`) VALUES ('2015002', 'A', 'A+', 'B+', 'C', 'D', 'C+', 'D+', 'D+', 'A+', 'A+', 'B', 'B+', 'C', 'C+', 'D+', 'D+', 'A', 'A+', 'B', 'B+');

	
?>