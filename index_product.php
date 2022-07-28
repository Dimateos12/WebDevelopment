<?php include("includes/header.php");
include("config/dbcon.php");


$product_slug = $_GET['product'];
$product_data = "SELECT * FROM products WHERE slug='$product_slug' AND status='0' LIMIT 1";
$query_run = mysqli_query($con, $product_data);

$product = mysqli_fetch_array($query_run);

if ($product) {
} else {
    echo "cos poszlo nie tka";
}

?>


<section class="py-5">
    <div class="container product_data px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"  src="admin/uploads/<?= $product['image'] ?>" alt="<?= $product['image'] ?>" /></div>
            <div class="col-md-6">
                <div class="small mb-1"></div>
                <h1 class="display-5 fw-bolder"><?= $product['name'] ?></h1>
                <div class="fs-5 mb-5">
                    <span><?= $product['selling_price'] ?>$</span>
                </div>
                <p class="lead"><?= $product['description'] ?></p>

                <div class="d-flex">
                         
                        <button class="input-group-text decrement-btn">-</button>
                            <input type="text" class="form-control text-center input-qty bg-white"  value="1" disabled>
                        <button class="input-group-text increment-btn" >+</button>
                    
                    <button class="btn btn-outline-dark flex-shrink-0 addToCart-btn" value="<?= $product['id']?>" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>  
            </div>
        </div>
    </div>
</section>

<!-- Related items section-->



<?php include("includes/footer.php");?>