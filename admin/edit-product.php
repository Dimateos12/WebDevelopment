<?php
include("includes/header.php");
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product</h4>
                </div>

                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">

                    <?php 

                    $id = $_GET['id'];
                    $query = "SELECT * FROM products WHERE id='$id' ";
                    $query_run = mysqli_query($con,$query);

                    if(mysqli_num_rows($query_run)> 0 ) {
                        $data = mysqli_fetch_array($query_run);
                ?>
                    <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="">Select Category</label>
                                <select name="category_id" value class="form-select">
                                    <option selected>Select Category</option>
                                    <?php
                                    $categories = "categories";
                                    $query = "SELECT * FROM $categories";
                                    $category = mysqli_query($con, $query);

                                    foreach ($category  as $item) {
                                    ?>
                                        <option value="<?= $item['id']; ?>"><?= $item['name']; ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter Category Name " class="form-control mb-2">
                            </div>


                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" name="slug"value="<?= $data['slug']?>" placeholder="Enter slug" class="form-control mb-2">
                            </div>

                            <div class="col-md-12">
                                <label for="">Small description</label>
                                <input type="text" name="small_description" value="<?= $data['small_description'] ?>" placeholder="Enter small description " class="form-control mb-2">
                            </div>
                            </div>

                            <div class="col-md-12">
                                <label for="">Description</label>
                                <input type="text" name="description" value="<?= $data['description'] ?>" placeholder="Enter description " class="form-control mb-2">

                            </div>

                            <div class="col-md-6">
                                <label for="">Original Price</label>
                                <input type="text" name="original_price" value="<?= $data['original_price']?>"  placeholder="Enter Original Price" class="form-control mb-2">
                            </div>


                            <div class="col-md-6">
                                <label for="">Selling price</label>
                                <input type="text" name="selling_price" value="<?= $data['selling_price']?>"   placeholder="Enter Selling price" class="form-control mb-2">
                            </div>

                            <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" calss="form-control mb-2 ">
                                <label for="">Current Image</label>
                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                <img src="uploads/<?= $data['image'] ?>" height="70px" width="50px" alt="">
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <label for="">Quantity</label>
                                    <input type="number" name="qty" value="<?= $data['qty']?>"  placeholder="Enter Quantity" class="form-control mb-2">
                                </div>


                                <div class="col-md-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" <?= $data['status'] ? "checked": "" ?> name="status">
                                </div>

                                <div class="col-md-3">
                                    <label for="">Trending</label>
                                    <input type="checkbox" <?= $data['status'] ? "checked": "" ?> name="status">
                                </div>


                            </div>


                            <div class="col-md-12">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" placeholder="Enter meta title" value="<?= $data['meta_title']?>" class="form-control">
                            </div>

                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <input type="text" name="meta_description" placeholder="Enter meta description" value="<?= $data['meta_description']?>" class="form-control">
                            </div>

                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <input type="text" name="meta_keywords" placeholder="Enter meta keywords" value="<?= $data['meta_keywords']?>" class="form-control">
                            </div>

                            <div class="col-md12">
                                <button class="btn btn-primary" name="update_product_btn">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
                <?php 
                }
            
            else
            {
                echo "Category not found";
            }
            
            ?>

            </div>
        </div>
    </div>

</div>

<?php include("includes/footer.php"); ?>