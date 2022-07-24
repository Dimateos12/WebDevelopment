<?php

    session_start();
    
    $host = "localhost";
    $username = "root";
    $password ="";
    $database ="web_development";


    // creating database connection
    $con = mysqli_connect($host,$username,$password,$database);

    // check if database has connection
    

    if(!$con){
        die("Conncetion failed ". mysqli_connect_error());
    }

    $author_id = $_SESSION['id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $text = mysqli_real_escape_string($con, $_POST['text']);

    $insert_query_run = $con->query("INSERT INTO message (from_name,from_email,from_phone,text,author_id) VALUES('$name','$email','$phone','$text','$author_id')");

    if($insert_query_run){
        $_SESSION["message"] = "Message send";
        header("Location: ../strona/contact.php");
    }
    else{
        $_SESSION['message'] = "Something went wrong $name, $phone, $email, $password , $repassword";
        header("Location: ../strona/contact.php");
    }

?>