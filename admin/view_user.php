<?php
include("authentication.php");
include("Includes/header.php");


?>

<div class="container-fluid px-4">


    <div class="row mt-4">
        
    <div class="col-md-12">
        <?php include("message.php") ?>
        <div class="card">
            <div class="card-header"> 
                <a href="add-user.php" class="btn btn-primary float-end"> Add User/Admin</a>
                <h4>Registered User</h4>
                
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $query = "SELECT * FROM users";
                         $query_run = mysqli_query($conn, $query);
                         if(mysqli_num_rows($query_run) > 0){

                            foreach($query_run as $row){
                                ?> 
                                   <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td>
                                        <?php
                                          if($row['role']=="1"){
                                            echo "Admin";
                                           ?> <td><a href="edit-admin.php?id=<?=$row['id']; ?>" class="btn btn-success">Edit</a></td>
                                        <?php  }elseif($row['role']=="0"){
                                             echo "User";
                                          ?>  <td></td>
                                           <?php 
                                          }
                                        ?>
                                    </td>
                                    <!-- <td><a href="" class="btn btn-success">Edit</a></td> -->
                                    <td>
                                        <form action="code.php" method="post">
                                        <button value="<?= $row['id']; ?>" name="user_delete" type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    </td>
                                   </tr>
                                <?php
                            }

                         }else{
                            ?>
                            <tr>
                                <td colspan="6">No Record founds</td>
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

<?php
include("Includes/footer.php");
include("Includes/scripts.php");

?>