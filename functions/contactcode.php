<?php   

session_start();

    include('../config/dbcon.php');

    $author_id = $_SESSION['id'];

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $text = mysqli_real_escape_string($con, $_POST['text']);

   
        $insert_query = "INSERT INTO message (from_name,from_email,from_phone,text,author_id) VALUES('$name','$email','$phone','$text','$author_id')";
        $insert_query_run = mysqli_query($con,$insert_query);

    if($insert_query_run){
        $_SESSION["message"] = "Message send";
       header("Location: ../contact.php");
    }
    else{
        $_SESSION['message'] = "Something went wrong ";
        header("Location: ../contact.php");
    }

?>