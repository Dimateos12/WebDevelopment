<?php   

session_start();

    include('../config/dbcon.php');

    $author_id = $_SESSION['id'];
    $name =  $_SESSION['name1'];
    $text = mysqli_real_escape_string($con, $_POST['text']);
    

        $insert_query = "INSERT INTO opinions (comment,id_user,user_name) VALUES('$text','$author_id','$name')";
       
        $insert_query_run = mysqli_query($con,$insert_query);

    if($insert_query_run){
        $_SESSION["message"] = "Opinion send";
       header("Location: ../opinion.php");
    }
    else{
        $_SESSION['message'] = "Something went wrong '  '";
        header("Location: ../opinion.php");
    }

?>