<?php include("includes/header.php");
include("config/dbcon.php");
?>


<section class="section " id="products">
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center ">
                    <div class="inner-content">
                        <h2>Check Our Products</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="conteiner">
    <div class="row">
    <?php

    $query = "SELECT * FROM categories WHERE STATUS='0' ";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {

        foreach ($query_run as $item) {
    ?>

        <div class="col-md-3 mb-2">
            <a href ="products.php?category=<?= $item['slug']; ?>">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="admin/uploads/<?= $item['image']; ?>" width="50" height="500" alt="<?= $item['image']; ?>" class="w-100">
                        <!-- /opt/lampp/htdocs/WebDevelopment/admin/uploads/1658849951.png -->
                        <h4><?= $item['name']; ?></h4>    
                    </div>
                </div>
            </a>
        </div>
    <?php
        }
    } else {
        echo "data dont find";
    }



    ?>

    </div>
    </div>
</div>
    <?php include("includes/footer.php"); ?>