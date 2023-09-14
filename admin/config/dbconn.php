<?php
 $host ="localhost";
 $username ="root";
 $password ="";
 $databse ="myblog";
$conn = mysqli_connect("$host","$username","$password","$databse");

if(!$conn){
   
    header('Location: ../errors/dberror.php');
    die($conn);
}
?>
