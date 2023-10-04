<?php

    include("Includes/header.php");
    include("Includes/navbar.php");
   
    
?>


<main id="main">
<div class="my-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php include("message.php")?>
                <?php
                  $query = " SELECT p.*, c.name AS cname FROM posts p, blog_category c WHERE c.id = p.category_id AND c.status ='0' AND p.status ='0' ORDER BY p.id DESC ";
                     $query_run = mysqli_query($conn, $query);
                     if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $item){
                            

                            ?>

                <div class="mb-3 card shadow-sm mb-4">
                    <div class="card-header">
                        <!-- <div class="post-title ">
                        <h4 >Posts Title </h4>
                         </div> -->
                        <h5 class="text-dark me-2"><?= $item['title'] ?></h5>
                    
                    </div>
                    <div class="card-body">
                        <h5>Posts Description</h5>
                        <p class="text-dark me-2"><?= $item['post_content']?></p>

                    </div>
                    <div class="card-footer">
                        <lable class="text-dark me-2">
                            Category : <?= strtoupper($item['cname']) ?>
                        </lable>
                        <lable class="text-dark me-2">
                            Posted By : <?=  $item['created_by'] == '1 ' ? 'Admin': 'User' ?>
                        </lable>
                        <lable class="text-dark me-2 float-end">
                            Date : <?= date('d-M-Y', strtotime($item['created_at'])) ?>
                        </lable>
                    </div>

                </div>

                <?php
                        }
                     }
                    ?>



            </div>
            <div class="col-md-3">
                <div class="card">
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
                            </0l>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>


<footer id="footer" class="py-4 bg-light mt-auto  ">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Code Smasher's <?= date('Y') ?> Ownership  mrpankajpadney_</div>
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