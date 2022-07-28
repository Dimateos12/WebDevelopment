<?php

    session_start();    
    include('../config/dbcon.php');

    if(isset($_SESSION['auth'])){

        if(isset($_POST['scope'])){
            $scope = $_POST['scope'];
            switch($scope){

                case "add":
                    $prod_id = $_POST['prod_id'];
                    $prod_qty = $_POST['prod_qty'];

                    $user_id = $_SESSION['id'];

                    $chk_existing_cart_run = $con->query("SELECT * FROM carts WHERE prod_id = $prod_id AND user_id = $user_id");

                    if(mysqli_num_rows($chk_existing_cart_run) > 0){

                        echo "existing"; 

                    }
                    else{

                        $insert_query_run = $con->query("INSERT INTO carts (user_id, prod_id, prod_qty) VALUES ($user_id, $prod_id, $prod_qty)");

                        if($insert_query_run){
                            echo 201;
                        }
                        else{
                            echo 500;
                        }
                    
                    }

                break;

                case "update":
                    $prod_id = $_POST['prod_id'];
                    $prod_qty = $_POST['prod_qty'];

                    $user_id = $_SESSION['id'];

                    $chk_existing_cart_run = $con->query("SELECT * FROM carts WHERE prod_id = $prod_id AND user_id = $user_id");

                    if(mysqli_num_rows($chk_existing_cart_run) > 0){

                        $update_query = "UPDATE carts SET prod_qty = $prod_qty WHERE prod_id = $prod_id AND user_id = $user_id";
                        $update_query_run = mysqli_query($con, $update_query);

                        if($update_query_run){
                            echo 200;
                        }
                        else{
                            echo 500;
                        }

                    }
                    else{

                        echo "something went wrong";
                    
                    }

                break;

                default :
                    echo 500;
            }
        }

    }
    else{
        echo 401;
    }

?>