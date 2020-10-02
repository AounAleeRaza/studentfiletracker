<?php

     include 'includes/session.php';

     if(isset($_POST['id'])){
            $id = $_POST['id'];
            $sql = "SELECT *, faculty.faculty_id AS studid FROM faculty LEFT JOIN faculty ON faculty.id=borrow.faculty_id LEFT JOIN files ON files.id=borrow.book_id WHERE due_date <= CURDATE()";
            $query = $conn->query($sql);
            $row = $query->fetch_assoc();
          
            echo json_encode($row);
    }

                  ?>