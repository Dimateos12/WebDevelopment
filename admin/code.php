<?php 

    include('../config/dbcon.php');
    include('../functions/myfunction.php');
    
    session_start();

        echo "test";

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
        VALUES('$name','$slug','$description','$status','$popular','$image','$meta_title','$meta_description','$meta_keywords')";

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

            $_SESSION["message"] = "Sucessfuly add";
            header("Location: add-category.php");
        }
        else{
            // $_SESSION["message"] = "added failed";
            // header("Location: add-category.php");
        }

    }
    else if(isset($_POST['update_category_btn'])) {
        
        $path = "uploads";
        $category_id = $_POST['category_id'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $description = $_POST['description'];
        $meta_title = $_POST['meta_title'];
        $meta_description = $_POST['meta_description'];
        $meta_keywords = $_POST['meta_keywords'];
        $status = isset($_POST['status']) ? '1':'0';
        $popular = isset($_POST['popular']) ? '1':'0';

        $new_image = $_FILES['image']['name'];
        $old_image =  $_POST['old_image'];

            if($new_image != ""){
                $update_filname = $new_image;
            }
            else{
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

            $update_query_run = mysqli_query($con,$update_query);

            if($update_query_run){
               
                if($_FILES['image']['name'] != "")
                {
                    move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);
                    if(file_exists(("uploads/".$old_image))){
                        unlink("uploads/".$old_image);
                    }
                }

                ;
                $_SESSION['message'] = "Category updated";
                header("Location: edit-category.php?id=$category_id");



            }
            else {
            echo " nie dziala ";
            } 

    }

    else if(isset($_POST['delete_category_btn'])){
        $category_id = mysqli_real_escape_string($con,$_POST['category_id']);
        $delete_query = "DELETE FROM categories WHERE id='$category_id'";
        $delete_query_run = mysqli_query($con,$delete_query);
        
        if($delete_query){
            $_SESSION['message'] = "Category deleted";
            header("Location: category.php");
        }
        else{
            $_SESSION['message'] = "Something went wrong";
            header("Location: category.php");
        }
    }


?>