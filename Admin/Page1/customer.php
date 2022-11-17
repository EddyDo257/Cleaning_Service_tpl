<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['admin_name'])) {
  $admin_name = $_SESSION['admin_name'];
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
                                    <li class="active">Customer List</li>
                                    
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
                              <form action='user-report.php' method='POST'>
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
                                    $query = "SELECT * FROM customer";
                                    $query_run = mysqli_query($conn, $query);

                        ?>
                                    <thead>
                                        <tr>
                            
                                            <th> id </th>
                                            <th> Username  </th>
                                            <th> Email_Address</th>
                                            <th> Phone_number</th>
                                            <th> Password </th>
                                            <th> Time </th>
                                            <th> Delete </th>
                                            
                                          </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      if(mysqli_num_rows($query_run) > 0){
                                                  while ($row = mysqli_fetch_assoc($query_run)) {
                                      ?>
                                                    <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['phone']; ?></td>
                                                    <td><?php echo $row['password']; ?></td>
                                                    <td><?php echo $row['time_happen']; ?></td>
                                                    
                                                      <td>
                                                        <form action='customer_add.php' method='POST'>
                                                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                                 <button class='btn btn-danger btn-sm delete btn-flat' type='submit' name="delete"><i class='fa fa-trash'></i> Delete</button>
                                                        </form>
                                                      </td>
                                                    
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
           header("Location: /project/cleaning/Admin/");
           exit();
      }
?>