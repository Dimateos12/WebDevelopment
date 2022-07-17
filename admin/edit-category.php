<?php
include("includes/header.php");
include('../middleware/adminMiddleware.php')

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php

            if (isset($_GET['id'])) {
                
                $id = $_GET['id'];
                $category = getByID("categories", $id);
                
                if(mysqli_num_rows($category) > 0){
                    
                }
            ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category</h4>
                    </div>

                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" name="name" placeholder="Enter Category Name " class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" placeholder="Enter slug" class="form-control">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea row="3" name="description" placeholder="Emter description" class="form-control"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="image" calss="form-control">
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

                                <div class="col-md-6">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Popular</label>
                                    <input type="checkbox" name="popular">
                                </div>

                                <div class="col-md12">
                                    <button class="btn btn-primary" name="add_category_btn">Add</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            <?php
            } else {
                echo "ID missing from url";
            }

            ?>
        </div>
    </div>

</div>

<?php include("includes/footer.php"); ?>