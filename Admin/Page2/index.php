<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['worker_name'])) {
  $worker_name = $_SESSION['worker_name'];
  include'header.php';
 ?>
<div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <?php
                              $con = mysqli_connect('localhost', 'root', '', 'service');
                                
                                  // SQL query to display row count
                                  // in building table
                                  $sql = "SELECT * from assign where employee_name='$worker_name'";
                                
                                  if ($result = mysqli_query($con, $sql)) {
                                
                                  // Return the number of rows in result set
                                  $rowcount = mysqli_num_rows( $result );

                                    ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-5">
                                        <i class="fa fa-share-square-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span><?php echo $rowcount; ?></span></div>
                                            <div class="stat-heading">All Assignemnt order</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <a class="btn btn-outline-success" href="assign.php" role="button">See Details</a>
                        </div>
                        <?php
                              
                          }
                            
                          // Close the connection
                          mysqli_close($con);
                            
                          ?>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <?php
                              $con = mysqli_connect('localhost', 'root', '', 'service');
                                
                                  // SQL query to display row count
                                  // in building table
                                  $sql = "SELECT * from assign where employee_name='$worker_name' AND task='pending...'";
                                
                                  if ($result = mysqli_query($con, $sql)) {
                                
                                  // Return the number of rows in result set
                                  $rowcount = mysqli_num_rows( $result );

                                    ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="fa fa-user-times"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span><?php echo $rowcount; ?></span></div>
                                            <div class="stat-heading">All pending order</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <a class="btn btn-outline-success" href="assign_pending.php" role="button">See Details</a>
                        </div>
                        <?php
                              
                          }
                            
                          // Close the connection
                          mysqli_close($con);
                            
                          ?>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <?php
                          $con = mysqli_connect('localhost', 'root', '', 'service');
                            
                              // SQL query to display row count
                              // in building table
                              $sql = "SELECT * from assign where employee_name='$worker_name' AND task='Complete'";
                            
                              if ($result = mysqli_query($con, $sql)) {
                            
                              // Return the number of rows in result set
                              $rowcount = mysqli_num_rows( $result );

                                ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="fa fa-check-square-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span><?php echo $rowcount; ?></span></div>
                                            <div class="stat-heading">All completed order</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <a class="btn btn-outline-success" href="assign_complete.php" role="button">See Details</a>
                        </div>
                        <?php
                              
                          }
                            
                          // Close the connection
                          mysqli_close($con);
                            
                          ?>
                    </div>
                    
                </div>
                <div class="clearfix"></div>
                <!-- Orders -->
                <!-- <div class="orders">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Orders </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">ID</th>
                                                    <th>Customer name</th>
                                                    <th>Customer phone</th>
                                                    <th>Service</th>
                                                    <th>Location</th>
                                                    <th>Avenue</th>
                                                    <th>Facility</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td>  <span class="name">Louis Stanley</span> </td>
                                                    <td>  <span class="phone">0780614280</span> </td>
                                                    <td> <span class="product">Cleaning</span> </td>
                                                    <td><span class="Location">kigali</span></td>
                                                    <td><span class="Avenue">456kk</span></td>
                                                    <td><span class="Aavenue">Home</span></td>
                                                    <td>
                                                        <span class="badge badge-complete">Complete</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div> 
                        </div>  
                    </div>
                </div> -->
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>

    <?php 
    include'footer.php';
    include'script.php';
    }else{
           header("Location: /cleaning/Admin/");
           exit();
      }
?>