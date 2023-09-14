<?php
include("authentication.php");
include("Includes/header.php");


?>


<div class="container-fluid px-4">

 
 

   <div class="row mt-4">
      <div class="col-md-12 mb-3">
        <?php include('message.php') ?>
        <div class="card">
            <div class="card-header">
                <a href="add-post.php" class="btn btn-primary float-end"> Add New </a>
                <h4>View Post </h4>
                <?php include("message.php")?>
            </div>
            <div class="card-body">

                   <div class="table-responsive">
                    <table class=" table table-borderd table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Status</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                           $query = " SELECT p.*, c.name AS cname FROM posts p, blog_category c WHERE c.id = p.category_id ";
                           $query_run =  mysqli_query($conn, $query);
                           if(mysqli_num_rows($query_run) > 0){

                            foreach($query_run as $post){

                              ?> 
                              <tr>
                                <td><?=$post['id'] ?></td>
                                <td><?=$post['title'] ?></td>
                                <td><?=strtoupper($post['cname']); ?></td>
                                <td><?=$post['status'] == '1 ' ? 'hidden': 'visible' ?></td>
                                <td> <a href="edit-post.php?id=<?= $post['id'] ?>" class="btn btn-success">Edit</a></td>

                                <td>
                                  <form action="code.php" method="post">
                                    <button type="submit" class="btn btn-danger" value="<?= $post['id'] ?>" name="post_delete">Delete</button>
                                  </form>
                                </td>
                              </tr>
                              
                              <?php

                            }

                           }else{
                            ?>  
                                <tr>
                                  <td colspan="6">No Rerods Founds </td>
                                </tr>

                            <?php 
                           }
                        ?>
                       
                      </tbody>
                    </table>
                   </div>
            </div>
        </div>
      </div>


  </div> 
</div>


<?php
include("Includes/footer.php");
include("Includes/scripts.php");

?>