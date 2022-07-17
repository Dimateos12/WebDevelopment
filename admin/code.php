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

        $cat_query = "INSERT INTO categories
        (name,slug,description,meta_title,meta_description,meta_ketwords,status,popular,image)
        VALUES('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status,'$popular','$image')";


        $cat_query_1 = "INSERT INTO categories
        (name,slug,description,status,popular,image,meta_tittle,meta_description,meta_keywords)
        VALUES('$name','$slug','$description','$status','$popular','$image','$meta_title','$meta_description','$meta_keywords')";

        $cat_query_2 = "INSERT INTO categories SET 
        name='$name',
        slug='$slug',
        description='$description',
        status='$status',
        popular='$popular',
        image='$image',
        meta_title='$meta_title',
        meta_description='$meta_description',
        meta_keywords='$meta_keywords'
        ";



        $cat_query_run = mysqli_query($con,$cat_query_1);

        if($cat_query_run == true){

            echo "'$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status,'$popular'";
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            echo "wysylanie";
            redirect("add-category.php","Category Added Successfully");
        }
        else{
            echo "'$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status,'$popular'";
            echo "brak";

            // $_SESSION["message"] = "added failed";
            // header("Location: add-category.php");
        }

    }
    else{
        echo "BLAD";
    }


?>