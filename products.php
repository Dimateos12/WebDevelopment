<?php include("includes/header.php");
include("config/dbcon.php");

$category_slug = $_GET['category'];

$category_data = "SELECT * FROM categories WHERE slug='$category_slug' AND status='0' LIMIT 1";
$query_run = mysqli_query($con, $category_data);
$category = mysqli_fetch_array($query_run);
$cid = $category['id'];
?>

<div class="p-5 text-center bg-image rounded-3" style="
    background-image: url('admin/uploads/bc.png');
    height: 400px;
  ">
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3"><?= $category["name"];?></h1>
        <h4 class="mb-3">Check our products</h4>
      </div>
    </div>
  </div>
</div>




<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
<?php

    $query = "SELECT * FROM products WHERE category_id= $cid AND STATUS='0' ";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {

        foreach ($query_run as $item) {
    ?>
                    <div class="col mb-5">
                        <div class="card h-100 bg-image hover-zoom">
                            <!-- Product image-->
                            <img class="card-img-top" src="admin/uploads/<?= $item['image']; ?>"  width="100" height="400" alt="<?= $item['image']; ?>" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $item['name']; ?></h5>
                                    <!-- Product price-->
                                    <?= $item['description']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="index_product.php?product=<?= $item['slug']; ?>">Check product</a></div>
                            </div>
                        </div>
            </div>

    <?php
                    }
                } else {
                    echo "data dont find";
                }
    ?>
        </div>
    </div>
</section>