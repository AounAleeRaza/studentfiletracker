<div class="hidden"> 
<?php
                  $sql = "SELECT *, faculty.faculty_id AS studid FROM borrow LEFT JOIN faculty ON faculty.id=borrow.faculty_id LEFT JOIN files ON files.id=borrow.book_id WHERE due_date <= CURDATE()";
                  $query = $conn->query($sql);
                  $count =  mysqli_num_rows($query);
                  while($row = $query->fetch_assoc()){
                    
                      echo "
                      <tr>
                          <td>".date('M d, Y', strtotime($row['date_borrow']))."</td>
                          <td>".$row['faculty_code']."</td>
                          <td>".$row['firstname'].' '.$row['lastname']."</td>
                          <td>".$row['isbn']."</td>
                          <td>".$row['due_date']."</td>
                          <td>
                          <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['studid']."'><i class='fa fa-edit'></i> Remind</button>
                        </td>
                         
                     </tr>
                      ";
                    }

                    ?>
                    </div>