<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, faculty.id AS studid FROM faculty LEFT JOIN facultyinfo ON facultyinfo.code=faculty.faculty_code WHERE faculty.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}

	
?>

