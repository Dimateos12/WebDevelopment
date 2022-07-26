<?php include("includes/header.php");
include("config/dbcon.php");

$category_slug = $_GET['category'];

$category_data = "SELECT * FROM categories WHERE slug='$category_slug' AND status='0' LIMIT 1";
$query_run = mysqli_query($con, $category_data);
$category = mysqli_fetch_array($query_run);
$cid = $category['id'];



?>


<section class="section " id="products">
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center ">
                    <div class="inner-content">
                        <h2>Products</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="conteiner">
    <div class="row">
    <?php

    $query = "SELECT * FROM products WHERE category_id= $cid AND STATUS='0' ";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {

        foreach ($query_run as $item) {
    ?>

        <div class="col-md-3 mb-2">
            <a href ="index_product.php?product=<?= $item['slug']; ?>">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="uploads/<?= $item['image']; ?>"  alt="<?= $item['image']; ?>" class="w-100">
                        <h4><?= $item['name']; ?></h4>    
                    </div>
                </div>
            </a>
        </div>
    <?php
        }
    } else {
        echo "data dont find";
        echo $cid;
    }



    ?>

    </div>
    </div>
</div>
    <?php include("includes/footer.php"); ?>