<?php

include('../config/dbcon.php');


session_start();



if(isset($_POST['add_category_btn']))
    {
        echo "test2";

        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $description = $_POST['description'];
        $meta_title = $_POST['meta_title'];
        $meta_description = $_POST['meta_description'];
        $meta_keywords = $_POST['meta_keywords'];
        $status = isset($_POST['status']) ? '1':'0';
        $popular = isset($_POST['popular']) ? '1':'0';


        $image = $_FILES['image']['name'];
        $path ="uploads";

        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_ext;

        // $cat_query = "INSERT INTO categories
        // (name,slug,description,meta_title,meta_description,meta_ketwords,status,popular,image)
        // VALUES('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status,'$popular','$image')";


        $cat_query_1 = "INSERT INTO categories
        (name,slug,description,status,popular,image,meta_tittle,meta_description,meta_keywords)
        VALUES('$name','$slug','$description','$status','$popular','$filename','$meta_title','$meta_description','$meta_keywords')";

        // $cat_query_2 = "INSERT INTO categories SET 
        // name='$name',
        // slug='$slug',
        // description='$description',
        // status='$status',
        // popular='$popular',
        // image='$image',
        // meta_title='$meta_title',
        // meta_description='$meta_description',
        // meta_keywords='$meta_keywords'
        // ";



        $cat_query_run = mysqli_query($con,$cat_query_1);

        if($cat_query_run == true){
            move_uploaded_file($_FILES['image']["tmp_name"], $path . '/' . $filename);
            $_SESSION["message"] = "Sucessfuly add";
            header("Location: add-category.php");
        }
        else{
            // $_SESSION["message"] = "added failed";
            // header("Location: add-category.php");
            echo "asd";
        }

    }
else if (isset($_POST['update_category_btn'])) {

    $path = "uploads";
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image =  $_POST['old_image'];

    if ($new_image != "") {
        $update_filname = $new_image;
    } else {
        $update_filname = $old_image;
    }
    $update_query = "UPDATE categories
            SET
            name='$name',
            slug='$slug',
            description='$description',
            meta_tittle='$meta_title',
            meta_description  = '$meta_description',
            meta_keywords = '$meta_keywords',
            status='$status',
            popular= '$popular',
            image='$update_filname' WHERE id='$category_id'";

    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {

        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $new_image);
            if (file_exists(("uploads/" . $old_image))) {
                unlink("uploads/" . $old_image);
            }
        };
        $_SESSION['message'] = "Category updated";
        header("Location: edit-category.php?id=$category_id");
    } else {
        echo " nie dziala ";
    }
} else if (isset($_POST['delete_category_btn'])) {




   
 


    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if ($delete_query) {
        $_SESSION['message'] = "Category deleted";
        header("Location: category.php");
    } else {
        $_SESSION['message'] = "Something went wrong";
        header("Location: category.php");
    }

} else if (isset($_POST['add_product_btn'])) {

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';


    $image = $_FILES['image']['name'];
    $path = "uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    $product_query = "INSERT INTO products (category_id,name,slug,small_description,description,original_price,selling_price,
        qty,meta_title,meta_description,meta_keywords,status,trending,image) VALUES 
        ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$qty','$meta_title',
        '$meta_description','$meta_keywords','$status','$trending','$filename')";

    $product_query_run = mysqli_query($con, $product_query);

    if ($product_query_run) {

        move_uploaded_file($_FILES['image']["tmp_name"], $path . '/' . $filename);
        $_SESSION["message"] = "Sucessfuly add";
        header("Location: add-product.php");
    } else {

        echo " BlAD  categoria: '$category_id', name: '$name','slug : $slug', smalldescription: '$small_description',description: '$description', 
            original_price: '$original_price', selling_price: '$selling_price','qty: $qty',meta title: '$meta_title', metadescription '$meta_description'
            ,meta keywords: '$meta_keywords',status: '$status', trending: '$trending' obrazek: '$image' ";
        // $_SESSION["message"] = "Something Wrong to  add product ";
        // header("Location: add-product.php");
    }
} else if (isset($_POST['update_product_btn'])) {


    $path = "uploads";

    $product_id = $_POST['product_id'];

    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    
    $old_image =  $_POST['old_image'];



    if ($new_image != "") {
        $update_filname = $new_image;
    } else {
        $update_filname = $old_image;
    }
    $update_query = "UPDATE products SET
                    name = '$name',
                    slug='$slug',
                    small_description='$small_description',
                    description =' $small_description',
                    original_price = '$original_price',
                    selling_price = '$selling_price',
                    qty =' $qty',
                    meta_title = '$meta_title',
                    meta_description = '$meta_description',
                    meta_keywords = '$meta_keywords',
                    status = '$status', 
                    trending = '$trending',
                    image = '$update_filname' WHERE id = '$product_id'";


    echo "test";

    $product_query_run = mysqli_query($con, $update_query);
    echo "tess";

    if ($product_query_run) {
        echo "test";
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $new_image);
            if (file_exists(("uploads/" . $old_image))) {
                unlink("uploads/" . $old_image);
             
            }
        };
    
        $_SESSION['message'] = "Product updated";
        header("Location: edit-product.php?id=$product_id");
    } else {
        echo " BlAD  categoria: '$category_id', name: '$name','slug : $slug', smalldescription: '$small_description',description: '$description', 
        original_price: '$original_price', selling_price: '$selling_price','qty: $qty',meta title: '$meta_title', metadescription '$meta_description'
        ,meta keywords: '$meta_keywords',status: '$status', trending: '$trending' obrazek: '$image' ";
    }
}
else if (isset($_POST['delete_product_btn'])){



    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $delete_query = "DELETE FROM products WHERE id='$product_id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    
    if ($delete_query_run) {
        $_SESSION['message'] = "Products deleted";
        header("Location: products.php");
    } else {
        $_SESSION['message'] = "Something went wrong";
        header("Location: products.php");
    }
}
else if (isset($_POST['done_purchase_btn'])) {

    
    $purchase_id = $_POST['purchase_id'];

    $query = "SELECT created_at, id_user, id FROM purchases WHERE id='$purchase_id'";
    $query_run = mysqli_query($con, $query);
    
    if (mysqli_num_rows($query_run) > 0) {

        foreach($query_run as $item)
        {
            $created_at = $item['created_at'];
            $id_user = $item['id_user'];
            $id = $item['id'];
        }

        
        $history_query = "INSERT INTO history_purchases (created_at, id_user, purchase_id) VALUES ('$created_at', '$id_user', '$id')";
        $history_query_run = mysqli_query($con, $history_query);

    } else {
        echo "nooooo";
    }

    $query = "SELECT product_id, purchase_id, product_qny FROM products_in_purchases WHERE purchase_id='$purchase_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {

        foreach($query_run as $item)
        {
            $product_id = $item['product_id'];
            $purchase_id = $item['purchase_id'];
            $product_qny = $item['product_qny'];

            echo $product_id;

            $product_history_query = "INSERT INTO products_in_history (product_id, purchase_id, product_qny) VALUES ('$product_id', '$purchase_id', '$product_qny')";
            $product_history_query_run = mysqli_query($con, $product_history_query);

            $delete_pih_query = "DELETE FROM products_in_purchases WHERE purchase_id='$purchase_id'";
            $delete_pih_query_run = mysqli_query($con, $delete_pih_query);
        }

        $delete_query = "DELETE FROM purchases WHERE id='$purchase_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

    } else {
        echo "noonoo";
    }
    $_SESSION['message'] = "Purchase confirm";
    header("Location: purchases.php");
}