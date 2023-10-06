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
                <a href="category-view.php" class="btn btn-danger float-end"> Back</a>
                <h4>Add Category </h4>
            </div>
            <div class="card-body">

            <form action="code.php" method="post">
                    <div class="row">
                
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Name</label>
                            <input required type="text"  value= "" name="name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Url</label>
                            <input required type="text"  value= "" name="url" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Meta Title</label>
                            <input required type="text" value= "" name="meta_title" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Meta Discription</label>
                            <textarea required type="textarea" value= "" name="meta_description" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Meta Keyword</label>
                            <textarea required type="textarea" name="meta_keywords" class="form-control"rows="4" ></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Status</label>
                            <input type="checkbox" name="status" class="" >
                            
                        </div>
                        <div class="col-md-12 mb-3">
                           <Button class="btn btn-primary" name="category_add" type="submit">Save </Button>
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