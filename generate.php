<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<style type="text/css">

@media print {
  body * {
    visibility: hidden;
  }
  #printMe, #printMe * {
    visibility: visible;
  }
  #printMe {
    position: absolute;
    left: 0;
    top: 0;
  }
}

</style>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Generate Borrow Files
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Transaction</li>
        <li class="active">Generate</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Error!</h4>
                <ul>
                <?php
                  foreach($_SESSION['error'] as $error){
                    echo "
                      <li>".$error."</li>
                    ";
                  }
                ?>
                </ul>
            </div>
          <?php
          unset($_SESSION['error']);
        }

        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <div class="box-body">
              <table id="printMe" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Borrower</th>
                  <th>Name</th>
                  <th>Student File Record</th>
                  <th>Due date</th>
                  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, faculty.faculty_id AS studid, borrow.status AS barstat FROM borrow LEFT JOIN faculty ON faculty.id=borrow.faculty_id LEFT JOIN files ON files.id=borrow.book_id ORDER BY date_borrow DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      if($row['barstat']){
                        $status = '<span class="label label-success">Ready</span>';
                      }
                      else{
                        $status = '<span class="label label-danger">Pending</span>';
                      }
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".date('M d, Y', strtotime($row['date_borrow']))."</td>
                          <td>".$row['faculty_code']."</td>
                          <td>".$row['firstname'].' '.$row['lastname']."</td>
                          <td>".$row['isbn']."</td>
                          <td>".$row['due_date']."</td>
                          
                          </tr>
                        
                      ";
                    }
                  ?>


                </tbody>
                
              </table><br/>
              <div class="container bg-light">
        <div class="col-md-12 text-center">
              <input type="button" value="Generate" class= "btn btn-info btn-lg" id='btn' onclick='window.print()'>
            </div>
            </div>
            
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>


    </script>
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/borrow_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>


</body>
</html>
