<?php
include("authentication.php");


//Delete post

if(isset($_POST['post_delete'])){
    $post_id = $_POST['post_delete'];

    $query = "DELETE FROM posts WHERE id ='$post_id' LIMIT 1";
    $query_run = mysqli_query($conn,  $query);
    if($query_run){
        $_SESSION['message'] = "Post Delete Successfully";
        header('Location:view-post.php' );
        exit(0);
    }else{
        $_SESSION['message'] = "Something went wrong !";
        header('Location:view-post.php' );
        exit(0);
    }

}
// update post

 if(isset($_POST['edit_post'])){
    $post_id = $_POST['id'];

    $category_id = $_POST['category_id'];
    $name = $_POST['title'];
    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['url']); // For clean url remove all special character
    $f_string = preg_replace('/-+/','-',$string);
    $url = $f_string;
    $Post_content = $_POST['post_content'];
    $meta_title = $_POST['meta_title'];
    $meta_description =$_POST['meta_description'];
    $meta_keyword= $_POST['meta_keywords'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE posts SET category_id ='$category_id' ,title= '$name' , url='$url', post_content='$Post_content', meta_title='$meta_title', meta_description = '$meta_description', meta_keywords='$meta_keyword', status='$status' WHERE id='$post_id' ";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        $_SESSION['message'] = "Updated Successfully";
        header('Location:view-post.php' );
        exit(0);
    }else{
        $_SESSION['message'] = "Something went wrong !";
        header('Location:edit-post.php' );
        exit(0);
    }

 }


//add post

if(isset($_POST['post_add'])){
    
    $category_id = $_POST['category_id'];
    $name = $_POST['title'];
    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['url']); // For clean url remove all special character
    $f_string = preg_replace('/-+/','-',$string);
    $url = $f_string;
    $Post_content = $_POST['post_content'];
    $meta_title = $_POST['meta_title']; 
    $meta_description= $_POST['meta_description'];
    $meta_keyword= $_POST['meta_keywords'];
   
    $status = $_POST['status'] == true ? '1':'0';
    // $created_by =$_POST['created_by'];

  

    $query = "INSERT INTO posts (title, url,  post_content , category_id	, meta_title,  meta_description,	meta_keywords, status ) VALUES ('$name', '$url', '$Post_content', '$category_id', '$meta_title', '$meta_description' ,'$meta_keyword', '$status')";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        

        $_SESSION['message'] = " Post Added  Successfully";
        header('Location:view-post.php');
        exit(0);
    }else{
        $_SESSION['message'] = "Something went wrong !";
        header('Location:add-post.php' );
        exit(0);
    }

}

// update category
if(isset($_POST['category_update'])){
    $category_id = $_POST['id'];
    $name = strtolower($_POST['name']);
    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['url']); // For clean url remove all special character
    $f_string = preg_replace('/-+/','-',$string);
    $url = $f_string;
    $title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $keywords= $_POST['meta_keywords'];
    $status = $_POST['status']==true ? '1':'0';

    $query =" UPDATE blog_category SET name='$name', url='$url', meta_title='$title', meta_description='$meta_description', meta_keywords='$keywords' , status= '$status' WHERE id = '$category_id' ";

    $query_run =  mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = " Category Updated Successfully";
        header('Location:category-view.php');
        exit(0);
    }else{
        $_SESSION['message'] = "Something went wrong !";
        header('Location:category-edit.php?id='.$category_id );
        exit(0);
    }

}

// Delete category
if(isset($_POST['delete_category'])){
    $category_id=$_POST['delete_category'];
    $query = "UPDATE blog_category SET status = '2' WHERE id = $category_id LIMIT 1";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        $_SESSION['message']= "Category deleted Successfully!";
        header('Location: category-view.php');
        exit(0);

    }else{
        $_SESSION['message']= "Something Went Wrong !";
        header('Location: category-view.php');
        exit(0);
    }

}
// add category
if(isset($_POST['category_add'])){
    $name = strtolower($_POST['name']);
     
    $string = preg_replace('/[^A-Za-z0-9\-]/','-', $_POST['url']); // For clean url remove all special character
    $f_string = preg_replace('/-+/','-',$string);
    $url = $f_string;
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword= $_POST['meta_keywords'];
    $status = $_POST['status'] == true ? '1':'0';
   
    $check_category = "SELECT name FROM blog_category  WHERE name ='$name'";
    $check_category_run = mysqli_query($conn, $check_category);
    
    if(mysqli_num_rows($check_category_run) > 0){
         $_SESSION['message']= "Category already Exists";
        header('Location: category-edit.php');
        exit(0);
    }else{
    $query= "INSERT INTO blog_category (name, url, meta_title, meta_description, meta_keywords, status) VALUES('$name', '$url', '$meta_title','$meta_description','$meta_keyword', '$status')";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['message']= "Category Added Successfully";
        header('Location: category-view.php');
        exit(0);
    }else{
        $_SESSION['message']= "Something Went Wrong !";
        header('Location: category-add.php');
        exit(0);
    }
}
}

// Delete user code 
if(isset($_POST['user_delete'])){
    $user_id=$_POST['user_delete'];
    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        $_SESSION['message']= "User / Admin deleted Successfully!";
        header('Location: view_user.php');
        exit(0);

    }else{
        $_SESSION['message']= "Something Went Wrong !";
        header('Location: view_user.php');
        exit(0);
    }

}

// Add/ User admin code
if(isset($_POST['add_user'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role= $_POST['role'];
    $status= $_POST['status'] == true ? '1':'0';
  

    $checkemail = "SELECT email FROM users  WHERE email ='$email'";
    $checkemail_run = mysqli_query($conn, $checkemail);
    
    if(mysqli_num_rows($checkemail_run) > 0){
         $_SESSION['message']= "already Email Exists";
        header('Location: add-user.php');
        exit(0);
    }else{
         $query = "INSERT INTO users(name, email, password, role , status) VALUES('$name', '$email', '$password', '$role', '$status')";
        $query_run = mysqli_query($conn, $query);
      if($query_run){
        $_SESSION['message']= "Admin/User Added Successfully";
        header('Location: view_user.php');
        exit(0);
       }
       else{
        $_SESSION['message']= "Something Went Wrong !";
        header('Location: add-user.php');
        exit(0);
            }
    
        
    }
}


// update admin 
if(isset($_POST['update_btn'])){
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $Oldpassword = $_POST['password'];
    $Newpassword = $_POST['Newpassword'];
    $role= $_POST['role'];
    $status= $_POST['status'] == true ? '1':'0';

    $query = "SELECT password FROM users  WHERE password ='$Oldpassword'";
    $query_run = mysqli_query($conn, $query);
     $old=  mysqli_fetch_array($query_run);
     $oPass= $old['password'];
      echo "$OPass";

    if($oPass == $Oldpassword){
        
         $query =" UPDATE users SET name='$name', email='$email', password='$Newpassword', status='$status' WHERE role= '$role' ";

           $query_run =  mysqli_query($conn, $query);
   
         if($query_run){
             $_SESSION['message'] = "Updated Successfully";
              header('Location:view_user.php');
                exit(0);
            }
            else{
                $_SESSION['message']= "Something Went Wrong !";
                  header('Location: edit-admin.php?id='.$user_id);
                 exit(0);
               }

    }
    else{
        $_SESSION['message'] = "Password Dos'nt match !";
        header('Location:edit-admin.php?id='.$user_id);
        exit(0);
    }
}


?>