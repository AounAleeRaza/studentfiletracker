<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$pub_date = $_POST['pub_date'];

		$sql = "INSERT INTO files (isbn, title, author, publish_date) VALUES ('$isbn', '$title', '$author', '$pub_date')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'File added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: book.php');

?>