<?php 

    $email = $_POST['name'];
    $password = $_POST['password'];

    //ONLy FOR TEST 
    echo ".$email";
    echo ".$password";

    //DATABBASE CONNECTION 

    $conncetion = new mysqli("localhost","root","","WEBDEVELOPMENT");


if($conncetion->connect_error){
    die("Failed to connect : " .$conncetion->connect_error);

}
else{
    //echo "Connect works !";
    $stmt = $conncetion ->prepare("select * from user where username = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password'] == $password){
            echo "<h2>Loggin Successfully</h2>";
            session_start();
            $_SESSION["loggin"] = $email;
            header("Location: index.html");
        }
        else{

        }
    }else{
        header("Location: logginform.html");
    }
}


?>