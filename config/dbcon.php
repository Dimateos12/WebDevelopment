<?php


$_SESSION['session']=session_id();


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


function total_online()
{
 global $con;
 $current_time=time();
 $timeout = $current_time - (60);
 $session_exist_query = "SELECT session FROM total_visitors WHERE session='".$_SESSION['session']."'";
 $session_exist = mysqli_query($con,$session_exist_query);
 $session_check = mysqli_num_rows($session_exist);

 if($session_check==0 && $_SESSION['session']!="")
 {
  $query_run = "INSERT INTO total_visitors values ('','".$_SESSION['session']."','".$current_time."')";
  mysqli_query($con,$query_run);
 }
 else
 {
  $sql ="UPDATE total_visitors SET time='".time()."' WHERE session='".$_SESSION['session']."'";
  mysqli_query($con,$sql);
 }

 $select_total_query  = "SELECT * FROM total_visitors WHERE time>= '$timeout'";
 $select_total= mysqli_query($con,$select_total_query);
 $total_online_visitors = mysqli_num_rows($select_total);
 return $total_online_visitors;
}

if(isset($_POST['get_online_visitor']))
{
 $total_online=total_online();
 echo $total_online;
 exit();
}

?>