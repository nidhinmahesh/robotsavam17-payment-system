<?php
$userId=$_POST['userId'];
$userPhone=$_POST['userPhone'];

		
include('dbconnect.php');

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

		$query = "SELECT * from users WHERE userId='$userId' and userPhone='$userPhone'";
		$result=$mysqli->query($query);
		if($result) {
			$details=$result->fetch_array();
			echo json_encode($details);
		} else {
			echo 0;	
		}


?>