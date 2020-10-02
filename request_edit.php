<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
        $firstname = $_POST['facultyname'];
        $approve = $_POST['approve'];
		

		$sql = "UPDATE studentfiles SET facultyname = '$firstname', approve = '$approve' WHERE facultyname = '$firstname'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Request Accepted';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:request.php');

?>