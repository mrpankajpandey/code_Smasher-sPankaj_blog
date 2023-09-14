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
                <a href="view_user.php" class="btn btn-danger float-end"> Back</a>
                <h4>Edit User's</h4>
            </div>
            <div class="card-body">
                <?php
                if(isset($_GET['id'])){
                  
                    $user_id = $_GET['id'];
                    
                    $user_query = "SELECT * FROM users WHERE id ='$user_id' ";
                    $user_query_run = mysqli_query($conn, $user_query);

                    if(mysqli_num_rows($user_query_run) > 0){

                        foreach($user_query_run as $user){
                            ?>

                      
                <form action="code.php" method="post">
                    <div class="row">
                    <div class="col-md-6 mb-3">
                            <label for="" class="form-label">ID</label>
                            <input type="text" readonly="true" value= "<?= $user['id'];?>" name="id" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text"  value= "<?= $user['name'];?>" name="name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" value= "<?= $user['email'];?>" name="email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">New Password</label>
                            <input type="text" value= "" name="Newpassword" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Old Password</label>
                            <input type="text" value= "" name="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="">....Select Role.....</option>
                                <option value="1" <?= $user['role']=="1" ? 'selected': '' ?>>admin</option>
                                <!-- <option value="0" >user</option> -->
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Status</label>
                            <input type="checkbox" name="status" class="" width="70px" height="70px" >
                        </div>
                        <div class="col-md-12 mb-3">
                           <Button class="btn btn-primary" name="update_btn" type="submit">Update</Button>
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