<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
        $id = $_POST['id'];
		$dd = $_POST['duedate'];
		
		$sql = "UPDATE borrow SET due_date = '$dd' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	

	header('location: borrow.php');

?>