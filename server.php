<?php
session_start();
$username="";
$email="";
$password_1="";
$password_2="";
$password="";
$errors=array();
//connect to database
$db = mysqli_connect('localhost','root','','users') or die("could not connect to database");

// if submit button is clicked
if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($db, $_POST['username']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password_1=mysqli_real_escape_string($db,$_POST['password_1']);
    $password_2=mysqli_real_escape_string($db,$_POST['password_2']);
if(empty($username)){
    array_push($errors,"username is required");
}
if(empty($email)){
    array_push($errors,"Email is required");
}
if(empty($password_1)){
    array_push($errors,"password is required");
}
if($password_1 != $password_2){
    array_push($errors,"Password does not match");   
}
// if there are no errors then save useer to database
if(count($errors)==0){
    $password=md5($password_1); //encryption
    $sql="INSERT INTO users(username,email,password)
           VALUES('$username','$email','$password')";
           mysqli_query($db,$sql);
           $_SESSION['username']=$username;
           $_SESSION['success']="YOU ARE NOW LOGGED IN";
           header('location:index.php'); //homepage le jayega yeh command
}
}
//user ko login karwana hai 
if(isset($_POST['login'])){
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    
    //ensure that the form is filled correctly
    if(empty($username)){
        array_push($errors,"Username is required");
    }
    if(empty($password)){
        array_push($errors,"password is required");
    }
    if(count($errors)==0){
        $password=md5($password);
        $query="SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result=mysqli_query($db,$query);
        if(mysqli_num_rows($result)==1){
            $_SESSION['username']=$username;
           $_SESSION['success']="YOU ARE NOW LOGGED IN";
           header('location:index.php');

        }else{
            array_push($errors,"Wrong Credentials");
        }
    }

}

//logout
if(isset($_GET['logout'])){
    session_destroy();
    session_unset();
    unset($_SESSION['username']);
    header('location:login.php');

}
?>
