<?php 

    session_start();

    include('../config/dbcon.php');

    $id = $_SESSION['id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $update_query = "UPDATE users SET name='$name', email='$email', phone='$phone', password='$password' WHERE id='$id'";
    $update_query_run = mysqli_query($con,$update_query);

    if($update_query_run){
        $_SESSION["message"] = "Edited Succesfully";
        $_SESSION["name1"] = $name;
        header("Location: ../personalpage.php");
    }
    else{
        $_SESSION['message'] = "Something went wrong $name, $phone, $email, $password , $repassword";
        header("Location: ../personaledit.php");
    }
?>