<?php 

    session_start();

    include('../config/dbcon.php');

    $id = $_SESSION['id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $Surname = mysqli_real_escape_string($con, $_POST['Surname']);
    $street = mysqli_real_escape_string($con, $_POST['street']);
    $zip = mysqli_real_escape_string($con, $_POST['zip']);
    $country = mysqli_real_escape_string($con, $_POST['country']);

    $update_query = "UPDATE users SET name='$name', email='$email', phone='$phone', password='$password' WHERE id='$id'";
    $update_query_run = mysqli_query($con,$update_query);

    $update_query_1 = "UPDATE user_data SET Surname='$Surname', street='$street', zip='$zip', country='$country' WHERE id_user='$id'";
    $update_query_run_1  = mysqli_query($con,$update_query_1);

    if($update_query_run && $update_query_run_1){
        $_SESSION["message"] = "Edited Succesfully";
        $_SESSION["name1"] = $name;
        header("Location: ../personalpage.php");
    }
    else{
        $_SESSION['message'] = "Something went wrong $name, $phone, $email, $password , $repassword";
        header("Location: ../personaledit.php");
    }
?>