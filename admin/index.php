<?php
include("authentication.php");
include("Includes/header.php");


?>


<div class="container-fluid px-4">
 <h1 class="mt-4">PHP Admin Pannel</h1>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Admin Pannel</li>
   </ol>

   <div class="row ">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Category
                                       
                                        <?php
                                        $query = "SELECT * FROM blog_category";
                                        $query_run =mysqli_query($conn, $query);
                                        if( $total_category=mysqli_num_rows($query_run)){
                                            echo '<h4 class="mb-0 mr-2">'.$total_category.'</h4>';
                                            

                                        }else{
                                              echo '<h4 class="mb-0" >No Data  </h4>';
                                        }
                                        
                                        ?>
                                    </div>
                                    
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="category-view.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                           </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Total Posts
                                    <?php
                                        $query = "SELECT * FROM posts";
                                        $query_run =mysqli_query($conn, $query);
                                        if( $total_posts=mysqli_num_rows($query_run)){
                                            echo '<h4 class="mb-0 mr-2">'.$total_posts.'</h4>';
                                            

                                        }else{
                                              echo '<h4 class="mb-0" >0  </h4>';
                                        }
                                        
                                        ?>
                                    </div>
                                   
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="view-post.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Users
                                    <?php
                                        $query = "SELECT * FROM users";
                                        $query_run =mysqli_query($conn, $query);
                                        if( $total_users=mysqli_num_rows($query_run)){
                                            echo '<h4 class="mb-0 mr-2">'.$total_users.'</h4>';
                                            

                                        }else{
                                              echo '<h4 class="mb-0" >No Data  </h4>';
                                        }
                                        
                                        ?>
                                    </div>
                                    
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="view_user.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                          
</div>


<?php
include("Includes/footer.php");
include("Includes/scripts.php");

?>