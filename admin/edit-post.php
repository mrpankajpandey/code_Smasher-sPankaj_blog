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
                <h4>Edit Post </h4>
            </div>
            <div class="card-body">

            <?php
            if(isset($_GET['id'])){
                $post_id = $_GET['id'];
                $query =  "SELECT * FROM posts WHERE id= '$post_id' LIMIT 1 ";
                $query_run = mysqli_query($conn,  $query);
                if(mysqli_num_rows($query_run) > 0){

                    $post_row = mysqli_fetch_array($query_run);
                    ?>

            <form action="code.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-6 mb-3">
                            <label for="" class="form-label">ID</label>
                            <input readonly="true" type="text" value= "<?= $post_row['id']?>" name="id" class="form-control">
                        </div>
                    <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Category List</label>
                            <?php $category = "SELECT * FROM blog_category WHERE status ='0' ";
                            $category_run = mysqli_query($conn, $category);
                               if(mysqli_num_rows($category_run) > 0){

                                ?> 
                                <select name="category_id"  class="form-control" id="">
                                    <option value="">....Select Category....</option>
                                    <?php foreach($category_run as $category_item){
                                           ?>
                                             <option value="<?= $category_item['id'] ?>" <?=$category_item['id'] == $post_row['category_id'] ? 'selected' : ''?> > 
                                             <?= $category_item['name'] ?> 
                                            </option>
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
                            <input required type="text"  value= "<?= $post_row['title']?>" name="title" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">URL</label>
                            <input required type="text"  value= "<?= $post_row['url']?>" name="url" class="form-control">
                        </div> 
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Meta Title</label>
                            <input type="text" value= "<?= $post_row['meta_title']?>" name="meta_title" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Meta Description</label>
                            <textarea required type="textarea" name="meta_description" class="form-control"rows="4" ><?= $post_row['meta_description']?></textarea>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Meta Keyword</label>
                            <textarea required type="textarea" name="meta_keywords" class="form-control"rows="4" ><?= $post_row['meta_keywords']?></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Post Discription</label>
                            <textarea  required type="textarea" id="summernote" name="post_content" rows="4" class="form-control"><?= $post_row['post_content']?> </textarea>
                        </div>
                    
                        <div class="col-md-6 mt-5">
                            <label for="" class="form-label">Status</label>
                            <input <?= $post_row['status'] =='1' ? 'checked': ''?> type="checkbox" name="status" class="" >
                        </div>
                        <div class="col-md-12 mb-3">
                           <Button class="btn btn-primary" name="edit_post" type="submit">update Post</Button>
                        </div>
                    </div>
            </form>


                <?php
                }else{
                    ?> 
                        <h4>NO Records founds</h4>
                    
                    <?php 
                }
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