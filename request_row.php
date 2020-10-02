<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
       // $sql = "SELECT *, faculty.id AS fn, faculty.firstname,faculty_code,files.isbn,title,author FROM faculty INNER JOIN studentfiles ON faculty.firstname=studentfiles.facultyname INNER JOIN files ON studentfiles.bid=files.isbn WHERE studentfiles.approve=''";                 
	   $sql = "SELECT *, faculty.id AS fn FROM faculty LEFT JOIN studentfiles ON studentfiles.id=faculty.id LEFT JOIN files ON studentfiles.bid=files.isbn WHERE studentfiles.approve=''";	
	   $query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}

	
?>

