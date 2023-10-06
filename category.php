<?php

    include("Includes/header.php");
    include("Includes/navbar.php");
   
    
?>

<div class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <?php
                    if(isset($_GET['title'])){
                        $url = mysqli_real_escape_string($conn, $_GET['title']);

                        $query = "SELECT id, url, status FROM blog_category WHERE url= '$url'AND status='0'  LIMIT 1 ";
                        $query_run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($query_run) > 0){

                            $category_item = mysqli_fetch_array($query_run);
                            $category_id = $category_item['id'];

                            $posts ="SELECT * FROM posts WHERE category_id = '$category_id' AND status='0' ";
                            $post_query_run =  $query_run = mysqli_query($conn, $posts);
                            if(mysqli_num_rows($post_query_run) > 0){

                                foreach($post_query_run as $p_item){
                                    ?>

                <div class="card mb-3 shadow-sm ">
                    <div class="card-header">
                        <!-- <div class="post-title">
                        <h4>Post Title</h4>
                    </div> -->
                        <h5 class="text-dark me-2"><?= $p_item['title'] ?></h5>
                    </div>
                    <div class="card-body">
                        <h5>Posts Description</h5>
                        <p class="text-dark me-2"><?= $p_item['post_content']?></p>

                    </div>
                    <div class="card-footer">

                        <label for="" class="text-dark me-2">Posted By :
                            <?= $p_item['created_by'] == '1 ' ? 'Admin': 'User' ?> </label>
                            
                        <label for="" class="text-dark me-2 float-end">Created At :
                            <?= date('d-M-Y', strtotime($p_item['created_at']))?> </label>
                    </div>
                </div>

                <?php
                                }

                            }else{
                                ?>
                <h4>No Post Found</h4>
                <?php
                            }

                        }

                    }else{
                        ?> <h4>No Such url Found</h4><?php
                    }
                ?>



            </div>
            <div class="col-md-3">
                <div class="card " >
                    <div class="card-header">
                        <h4>All Category</h4>
                    </div>
                    <div class="card-body">
                        <ol class="list-group list-group-numbered">
                            <?php 

                                $category_list= "SELECT * FROM blog_category WHERE status='0'";
                                $category_list_run = mysqli_query($conn, $category_list);
                                if (mysqli_num_rows($category_list_run) > 0) {
                                         
                                    foreach($category_list_run as $list){ 
                                        ?>
                            <a href="category.php?title=<?= $list['url'];?>" class="text-decoration-none">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold"><?= strtoupper($list['name'] );?></div>

                                        Availbale posts
                                    </div>
                                    <?php
                                         $category_id = $list['id'];
                                         $query = "SELECT * FROM posts WHERE category_id = $category_id AND status='0'";
                                         $query_run =mysqli_query($conn, $query);

                                         if( $total_posts=mysqli_num_rows($query_run)){
                                            echo '<span class="badge bg-primary rounded-pill">'.$total_posts.'</span>';
                                            

                                        }else{
                                              echo '<span class="badge bg-primary rounded-pill">0</span>';
                                        }
                                        ?>
                                    <?php
                                    ?>
                                </li>
                                </li>
                            </a>
                            <?php
                                    }
                                    
                                }else{
                                             ?>
                            <h4>No category Availbale</h4>
                            <?php
                                }
                                ?>
                            </ol>

                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
<footer id="footer" class="py-4 bg-light mt-auto  ">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Code Smasher's <?= date('Y') ?>  Ownership  mrpankajpadney_</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

<?php
 include("Includes/footer.php");
  ?>
