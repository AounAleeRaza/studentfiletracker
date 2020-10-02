<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$code = $_POST['faculty_code'];

		$sql = "UPDATE faculty SET firstname = '$firstname', lastname = '$lastname', faculty_code = '$code' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Faculty updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:notification.php');

?>