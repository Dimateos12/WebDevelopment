<?php
    include 'mysql_data.php';
    $conn = OpenCon();
    echo "Connected Successfully";
    CloseCon($conn);
    ?>