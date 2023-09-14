<?php
   
   session_start();
   include("admin/config/dbconn.php");
   if(isset($_POST['login_btn'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1 ";

    $login_query_run = mysqli_query($conn, $login_query);
    
    if (mysqli_num_rows($login_query_run) > 0) {


        foreach($login_query_run as $data){
            $user_id= $data['id'];
            $user_name= $data['name'];
            $user_email= $data['email'];
            $user_role= $data['role'];
        }
        
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$user_role"; // 1 for admin and 0 for normal user
        $_SESSION['auth_user'] = [
        'user_id'=>$user_id,
        'user_name'=>$user_name,
        'user_email'=>$user_email,
        ];

      if ($_SESSION['auth_role'] == "1") {    // you are a admin
        $_SESSION['message'] = "Welcome to Dashboard";
        header('Location:admin/index.php');
      }elseif($_SESSION['auth_role'] == "0"){   // you are a normal user
        $_SESSION['message'] = "You are Loged In";
        header('Location:index.php');
      }

    }else{
        $_SESSION['message'] = "Invalid Email or Password";
    header('Location:login.php');
    }
   
}else{
    $_SESSION['message'] = "You are not allowed to access this file";
    header('Location:login.php');
}

   
  
?>