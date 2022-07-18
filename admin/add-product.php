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
                    <h4>Add Product</h4>
                </div>

                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="">Select Category</label>
                                <select class="form-select">
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

                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Enter Category Name " class="form-control mb-2">
                            </div>


                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" name="slug" placeholder="Enter slug" class="form-control mb-2">
                            </div>

                            <div class="col-md-12">
                                <label for="">Small description</label>
                                <textarea row="3" name="small_description" placeholder="Enter small description" class="form-control mb-2"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea row="3" name="description" placeholder="Enter description" class="form-control mb-2"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="">Original Price</label>
                                <input type="text" name="original_price" placeholder="Enter Original Price" class="form-control mb-2">
                            </div>


                            <div class="col-md-6">
                                <label for="">Selling price</label>
                                <input type="text" name="selling_price" placeholder="Enter Selling price" class="form-control mb-2">
                            </div>

                            <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" calss="form-control mb-2 ">
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <label for="">Quantity</label>
                                    <input type="number" name="qty" placeholder="Enter Quantity" class="form-control mb-2">
                                </div>


                                <div class="col-md-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status">
                                </div>

                                <div class="col-md-3">
                                    <label for="">Popular</label>
                                    <input type="checkbox" name="popular">
                                </div>


                            </div>




                            <div class="col-md-12">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" placeholder="Enter meta title" class="form-control">
                            </div>

                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea row="3" name="meta_description" placeholder="Enter meta description" class="form-control"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <textarea row="3" name="meta_keywords" placeholder="Enter meta keywords" class="form-control"></textarea>
                            </div>

                            <div class="col-md12">
                                <button class="btn btn-primary" name="add_product_btn">Add</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

<?php include("includes/footer.php"); ?>