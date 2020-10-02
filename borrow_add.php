<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$faculty = $_POST['faculty'];
		$duedate = mysqli_real_escape_string($conn, $_REQUEST['due_date']);
		$sql = "SELECT * FROM faculty WHERE faculty_id = '$faculty'";
		$query = $conn->query($sql);
		if($query->num_rows < 1){
			if(!isset($_SESSION['error'])){
				$_SESSION['error'] = array();
			}
			$_SESSION['error'][] = 'Faculty not found';
		}
		else{
			$row = $query->fetch_assoc();
			$faculty_id = $row['id'];

			$added = 0;
			foreach($_POST['isbn'] as $isbn){
				if(!empty($isbn)){
					$sql = "SELECT * FROM files WHERE isbn = '$isbn' AND status != 1";
					$query = $conn->query($sql);
					if($query->num_rows > 0){
						$brow = $query->fetch_assoc();
						$bid = $brow['id'];

						$sql = "INSERT INTO borrow (faculty_id, book_id, date_borrow, due_date) VALUES ('$faculty_id', '$bid', NOW(), '$duedate')";
						if($conn->query($sql)){
							$added++;
							$sql = "UPDATE files SET status = 1 WHERE id = '$bid'";
							$conn->query($sql);
						}
						else{
							if(!isset($_SESSION['error'])){
								$_SESSION['error'] = array();
							}
							$_SESSION['error'][] = $conn->error;
						}

					}
					else{
						if(!isset($_SESSION['error'])){
							$_SESSION['error'] = array();
						}
						$_SESSION['error'][] = 'Book with ISBN - '.$isbn.' unavailable';
					}
		
				}
			}

			if($added > 0){
				$book = ($added == 1) ? 'Book' : 'Books';
				$_SESSION['success'] = $added.' '.$book.' successfully borrowed';
			}

		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: borrow.php');

?>