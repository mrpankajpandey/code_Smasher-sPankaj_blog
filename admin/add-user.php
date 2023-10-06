<?php
include("authentication.php");
include("Includes/header.php");


?>


<div class="container-fluid px-4">

   <div class="row mt-4">
      <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header">
                <a href="view_user.php" class="btn btn-danger float-end"> Back</a>
                <h4>Add User/Admin </h4>
            </div>
            <div class="card-body">
            

                      
                <form action="code.php" method="post">
                    <div class="row">
                
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Name</label>
                            <input required type="text"  value= "" name="name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Email</label>
                            <input required type="email" value= "" name="email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Password</label>
                            <input required type="text" value= "" name="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="">....Select Role.....</option>
                                <option value="1">admin</option>
                                <option value="0" >user</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Status</label>
                            <input type="checkbox" name="status" class="" width="70px" height="70px" >
                        </div>
                        <div class="col-md-12 mb-3">
                           <Button class="btn btn-primary" name="add_user" type="submit">Submit</Button>
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