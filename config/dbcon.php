<?php

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
else {
    echo "Conneccted successfully";
} 
?>