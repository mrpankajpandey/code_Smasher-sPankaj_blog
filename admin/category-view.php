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
                <a href="category-add.php" class="btn btn-primary float-end"> Add Category</a>
                <h4>View Category </h4>
            </div>
            <div class="card-body">     
               <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                          $category = "SELECT * FROM blog_category WHERE status!='2' ";
                          $category_run = mysqli_query($conn, $category);
                          
                          if(mysqli_num_rows($category_run)>0){

                            foreach($category_run as $item ){

                                ?>
                                    <tr>
                                        <td><?=$item['id'] ?></td>
                                        <td><?=strtoupper($item['name'] )?></td>
                                        <td><?=$item['meta_title'] ?></td>
                                        <td>
                                           <?= $item['status'] == '1' ? 'hidden': 'visible'?>
                                        </td>
                                        <td>
                                            <a href="category-edit.php?id=<?=$item['id'] ?>" class="btn btn-success">Edit</a>
                                        </td>
                                        <td>
                                        <form action="code.php" method="post">
                                             <button value="<?= $item['id']; ?>" name="delete_category" type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                        </td>
                                        
                                    </tr>

                        <?php
                            }

                          }else{
                            ?>
                              <tr>
                                <td colspan="5">No Record founds</td>
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