<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$pub_date = $_POST['pub_date'];

		$sql = "UPDATE files SET isbn = '$isbn', title = '$title', author = '$author', publish_date = '$pub_date' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'File updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:book.php');

?>