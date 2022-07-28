<?php

    session_start();    
    include('../config/dbcon.php');

    if(isset($_SESSION['auth'])){
        
        $user_id = $_SESSION['id'];
        
        $insert_query = "INSERT INTO purchases (id_user) VALUES($user_id)";
        $insert_query_run = mysqli_query($con,$insert_query);

        $id_query = "SELECT id FROM purchases ORDER BY id DESC LIMIT 1";
        $id_query_run= mysqli_query($con,$id_query);
        
        foreach ($id_query_run as $item) {
           
            $id_purchase = $item['id'];
            

        }
        
        
        
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id=$user_id ORDER BY c.id DESC";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {

            foreach ($query_run as $item) {

                $insert_query = "INSERT INTO products_in_purchases (product_id, purchase_id, product_qny) VALUES($item[pid],$id_purchase,$item[prod_qty])";
                $insert_query_run = mysqli_query($con,$insert_query);

                if($insert_query_run){
                    $_SESSION["message"] = "Buy Succesfully";
                    header("Location: ../personalpage.php");
                }
                else{
                    $_SESSION['message'] = "Something went wrong";
                    header("Location: ../personalpage.php");
                }
        
            }
        } else {
            echo "data dont find";
        }
        
    }
    else{
        echo 401;
    }

?>