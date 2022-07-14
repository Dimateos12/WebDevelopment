<?php

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['bday'];
    $sex = $_POST['sex'];
    $tel = $_POST['telephone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $reppassword = $_POST['reppassword'];

    //ONLy FOR TEST
    echo ".$name";
    echo ".$surname";
    echo ".$birthday";
    echo ".$sex";
    echo ".$tel";
    echo ".$email";
    echo ".$username";
    echo ".$password";
    echo ".$reppassword";

    //DATABBASE CONNECTION

    $conncetion = new mysqli("localhost","root","","WEBDEVELOPMENT");


if($conncetion->connect_error){
    die("Failed to connect : " .$conncetion->connect_error);

}
else{
    echo "Connect works !";
    $stmt = $conncetion ->prepare("insert into anagraphic (name,surname,birthday,sex,tel,email) values (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $name, $surname, $birthday, $sex, $tel, $email);
    $stmt->execute();
    $aid = mysqli_insert_id();
    if($password == $reppassword){
        $stmt = $conncetion ->prepare("insert into user (username,password,anagraphic_id) values (?,?,?)");
        $stmt->bind_param("ssi", $username, $password, $aid);
        $stmt->execute();
    }
    else{
        echo "<h2>Repeat password incorrect</h2>";
    }
    echo "<h2>Register Successfully</h2>";
}


?>
