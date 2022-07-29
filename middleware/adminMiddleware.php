<?php

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] != 1)
    {
        $_SESSION['message'] = "YOu are not authorized to acces";
        header('Location: login.php ');
    }
}
else{
    $_SESSION['message'] = "Login to continue";
    header('Location: login.php ');
}

?>