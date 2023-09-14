<?php
include("authentication.php");
include("Includes/header.php");


?>


<div class="container-fluid px-4">
 <!-- <h4 class="mt-4">Edit Admin</h4>
 
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Edit Admin</li>
   </ol> -->

   <div class="row mt-4">
      <div class="col-md-12 mb-3">
      <?php include('message.php') ?>
        <div class="card">
          
            <div class="card-header">
                <a href="category-view.php" class="btn btn-danger float-end"> Back</a>
                <h4>Edit Category</h4>
            </div>
            <div class="card-body">

            <?php
                if(isset($_GET['id'])){
                   
                    $category_id = $_GET['id'];
                    
                    $user_query = "SELECT * FROM blog_category WHERE id ='$category_id' ";
                    $user_query_run = mysqli_query($conn, $user_query);

                    if(mysqli_num_rows($user_query_run) > 0){

                        foreach($user_query_run as $item){

                            ?>

                            
                      <form action="code.php" method="post">
                          <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="" class="form-label">ID</label>
                            <input type="text" readonly="true" value= "<?= $item['id'];?>" name="id" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text"  value= "<?= strtoupper($item['name']);?>" name="name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">url</label>
                            <input type="text"  value= "<?= $item['url'];?>" name="url" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" value="<?= $item['meta_title'];?>"  name="meta_title" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Meta Discription</label>
                            <textarea type="textarea"  name="meta_description" rows="4" class="form-control"><?= $item['meta_description'];?></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Meta Keyword</label>
                            <textarea type="textarea"  name="meta_keywords" class="form-control"rows="4" ><?= $item['meta_keywords'];?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Status</label>
                            <input <?= $item['status'] =='1' ? 'checked': ''?> type="checkbox" name="status" class="" >
                        </div>
                        <div class="col-md-12 mb-3">
                           <Button class="btn btn-primary" name="category_update" type="submit">Submit</Button>
                        </div>
                    </div>
                    
                </form>


       
                             <?php
                        }

                    }else{
                        ?> 
                        <h4>No Record found</h4>
                        <?php
                    }
                } else{
                    ?> 
                    <h4>No Record found</h4>
                    <?php
                }
                
                ?>


            </div>
        </div>
      </div>


  </div> 
</div>


<?php
include("Includes/footer.php");
include("Includes/scripts.php");

?>