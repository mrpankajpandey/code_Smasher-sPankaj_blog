
<?php
session_start();

include("admin/config/dbconn.php");

if(isset($_POST['register_btn'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $conferm_password = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if ($password == $conferm_password) {
        # code...
         $checkemail = "SELECT email FROM users  WHERE email='$email'";
         $checkemail_run = mysqli_query($conn, $checkemail);
         if (mysqli_num_rows($checkemail_run) > 0) {

            $_SESSION['message'] = "already Email Exists";
            header('Location:register.php');
            exit(0);
            # code...
         }else{
               $user_query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email' ,'$password') ";
               $user_query_run = mysqli_query($conn, $user_query);
               if ($user_query_run) {
                $_SESSION['message'] = "User Registered Successfully";
                 header('Location:login.php');
                exit(0);
               }else{
                $_SESSION['message'] = "Something error";
                 header('Location:register.php');
                exit(0);
               }
         }
    }else{
          $_SESSION['message'] = "Passworrd and Confirm Password dos'nt match";
          header('Location:register.php');
          exit(0);
    }

}
else{
    header('Location:register.php');
    exit();
}
?>