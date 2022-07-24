<?php 

session_start();

include('../config/dbcon.php');

if(isset($_POST['register_btn'])){

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $repassword = mysqli_real_escape_string($con, $_POST['repassword']);
    
    if($password == $repassword){
        // Insert user data 
        $insert_query = "INSERT INTO users (name,email,phone,password) VALUES('$name','$email','$phone','$password')";
        $insert_query_run = mysqli_query($con,$insert_query);

        if(!    $insert_query_runns){
            $_SESSION["message"] = "Registered Succesfully";
            header("Location: ../login.php");
        }
        else{
            $_SESSION['message'] = "Something went wrong $name, $phone, $email, $password , $repassword";
            header("Location: ../reg.php");
        }
    }
    else{
        $_SESSION['message'] = "Password do not match $name, $phone, $email, $password , $repassword";
        header("Location: ../reg.php");
    }


}

else if(isset($_POST['login_btn'])){


    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) >0){
        
        $_SESSION['auth'] = true;

        $userdate = mysqli_fetch_array($login_query_run);
        $username = $userdate['name'];
        $email = $userdate['email'];
        $role_as = $userdate['role_as'];



        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $email
        ];
        $_SESSION['name1'] = $userdate['name'];
        $_SESSION['id'] = $userdate['id'];
        $_SESSION['role_as'] = $role_as;

        if($role_as == 1){
        
            $_SESSION['message'] = "Welcome to Dashboard";
            header('Location: ../admin/index.php');
        
    
    }
    else{
        $_SESSION['message'] = "Loggin in successfully";
        header('Location: ../index.php');
    }
    }
    else{
        $_SESSION['message'] = "Invalid Credentials";
        header('Location: ../login.php');
    }
    


}