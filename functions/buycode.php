<?php

    session_start();    
    include('../config/dbcon.php');
    
    function validatecard($number)
    {
        global $type;

        $cardtype = array(
            "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
            "mastercard" => "/^5[1-5][0-9]{14}$/",
            "amex"       => "/^3[47][0-9]{13}$/",
            "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
        );

        if (preg_match($cardtype['visa'],$number))
        {
        $type= "visa";
            return 'visa';
        
        }
        else if (preg_match($cardtype['mastercard'],$number))
        {
        $type= "mastercard";
            return 'mastercard';
        }
        else if (preg_match($cardtype['amex'],$number))
        {
        $type= "amex";
            return 'amex';
        
        }
        else if (preg_match($cardtype['discover'],$number))
        {
        $type= "discover";
            return 'discover';
        }
        else
        {
            return false;
        } 
    }


    if(isset($_SESSION['auth'])){
        
        
        $user_id = $_SESSION['id'];
        
        $number = mysqli_real_escape_string($con, $_POST['number']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $exp = mysqli_real_escape_string($con, $_POST['exp']);
        $cvv = mysqli_real_escape_string($con, $_POST['cvv']);
        
        

        if(preg_match('#([0-9]{4}[- ]?){3}[0-9]{4}#',$number) && preg_match('#\d{2}\/\d{2}#',$exp) && preg_match('#\d{3}#',$cvv)){

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

                    $delete_query = "DELETE FROM carts WHERE id = $item[cid]";
                    $delete_query_run = mysqli_query($con, $delete_query);

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
                header("Location: ../shopcart.php");
            }
        }
        else{
            $_SESSION["message"] = "Wrong data in payment's field";
            header("Location: ../shopcart.php");
        }
    }
    else{
        echo 401;
    }

?>