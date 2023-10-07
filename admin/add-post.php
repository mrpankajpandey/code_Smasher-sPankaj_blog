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
                <a href="view-post.php" class="btn btn-danger float-end"> Back</a>
                <h4>Add Post </h4>
            </div>
            <div class="card-body">

            <form action="code.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Category List</label>
                            <?php $category = "SELECT * FROM blog_category WHERE status ='0' ";
                            $category_run = mysqli_query($conn, $category);
                               if(mysqli_num_rows($category_run) > 0){

                                ?> 
                                <select name="category_id" required class="form-control" id="">
                                    <option required value="">....Select Category....</option>
                                    <?php foreach($category_run as $category_item){
                                           ?>
                                             <option value="<?= $category_item['id'] ?>"> <?= $category_item['name'] ?> </option>
                                           <?php
                                    }
                              
                                ?>
                            </select>

                                <?php

                               }else{
                                     ?>
                                     <h5>No Category is Avialble</h5>
                                    <?php 
                               }
                             ?>
                           
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Title</label>
                            <input required type="text" required value= "" name="title" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">URL</label>
                            <input required type="text" required value= "" name="url" class="form-control">
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Meta Title</label>
                            <input required type="text" required value= "" name="meta_title" class="form-control">
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Post Content</label>
                            <textarea required id="summernote" type="textarea" value= "" name="post_content" rows="4" class="form-control"></textarea>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Meta Description</label>
                            <textarea required type="textarea" name="meta_description" class="form-control"rows="4" ></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Meta Keyword</label>
                            <textarea required type="textarea" name="meta_keywords" class="form-control"rows="4" ></textarea>
                        </div>
                    
                        <div class="col-md-6 mt-5">
                            <label for="" class="form-label">Status</label>
                            <input type="checkbox" name="status" class="" >
                        </div>
                        <div class="col-md-12 mb-3">
                           <Button class="btn btn-primary" name="post_add" type="submit">Save Post</Button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
      </div>


  </div> 
</div>


<?php
include("Includes/footer.php");
include("Includes/scripts.php");

?>