<?php 
session_start();
  
  if (isset($_SESSION['id']) && isset($_SESSION['worker_name'])) {
  $worker_name = $_SESSION['worker_name'];
  $worker_id= $_SESSION['id'];

  include'header_2.php';
 ?>
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="active">Order assignment List</li>
                                    
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <?php
                                  if(isset($_SESSION['error'])){
                                    echo "
                                      <div class='alert alert-danger alert-dismissible'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4></i> Error!</h4>
                                        ".$_SESSION['error']."
                                      </div>
                                    ";
                                    unset($_SESSION['error']);
                                  }
                                  if(isset($_SESSION['success'])){
                                    echo "
                                      <div class='alert alert-success alert-dismissible'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4></i> Success!</h4>
                                        ".$_SESSION['success']."
                                      </div>
                                    ";
                                    unset($_SESSION['success']);
                                  }
                                ?>
                                <form action='assign-report_pending.php' method='POST'>
                                    <input type="hidden" name="name_id" value="<?php echo $worker_name ?>">
                                 <button class='btn btn-primary btn-sm edit btn-flat' type='submit' name='edit_detail'><i class="fa fa-file-pdf-o"></i> Report in PDF</button>
                              </form>
                            </div>

                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                     <?php
                                    $conn = mysqli_connect('localhost', 'root', '', 'service');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    $query = "SELECT * FROM assign where employee_name='$worker_name' AND task='pending...'";
                                    $query_run = mysqli_query($conn, $query);

                        ?>
                                    <thead>
                                        <tr>
                            
                                            <th> ID </th>
                                            <th> Booking id </th>
                                            <th> Employee name  </th>
                                            <th> Time </th>
                                            <th> Order Detail </th>
                                            <th> Work Status </th>
                                            <th> Action </th>
                                            
                                          </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        if(mysqli_num_rows($query_run) > 0){
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                                      <tr>
                                                      <td><?php echo $row['id']; ?></td>
                                                      <td><?php echo $row['booking_id']; ?></td>
                                                      <td><?php echo $row['employee_name']; ?></td>
                                                      <td><?php echo $row['time']; ?></td>
                                                      <td>
                                                          <form action='template.php' method='POST'>
                                                                  <input type="hidden" name="c_id" value="<?php echo $row['booking_id']; ?>">
                                                                   <button class='btn btn-success btn-sm edit btn-flat' type='submit' name='c_btn'><i class='fa fa-info-circle'></i> check</button>
                                                          </form>
                                                        </td>
                                                      <?php
                                                      $yy= $row['task'];
                                                      if($yy == "pending..."){
                                                        ?>
                                                        <td>
                                                        <span class="badge badge-warning">Pending..</span>
                                                        </td>
                                                        <td>
                                                          <form action='assign_add.php' method='POST'>
                                                                  <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                                   <button class='btn btn-success btn-sm edit btn-flat' type='submit' name='edit_btn'><i class='fa fa-check-circle'></i> Done</button>
                                                          </form>
                                                        </td>
                                                        <?php
                                                      }else{
                                                        ?>
                                                        <td>
                                                        <span class="badge badge-primary">Complete</span>
                                                        </td>
                                                        <td>
                                                          <form action='' method='POST'>
                                                                  <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                                   <button class='btn btn-success btn-sm edit btn-flat' type='submit' name='edit_btn'><i class='fa fa-hand-peace-o' disabled></i> </button>
                                                          </form>
                                                        </td>
                                                        <?php
                                                      }
                                                      ?>
                                                      
                                                      
                                                    </tr>
                                                    <?php 
                                                  }
                                          }else{
                                                echo "no data found";
                                                }
                                                    ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    <?php 
    include'footer.php';
    include'script.php';
    }else{
           header("Location: /cleaning/Admin/");
           exit();
      }
?>