<?php
include("includes/header.php");
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "SELECT * FROM categories WHERE id='$id' ";
                $query_run = mysqli_query($con,$query);
               
                
                if(mysqli_num_rows($query_run)> 0 ) {
                    $data = mysqli_fetch_array($query_run);
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category</h4>
                </div>
              
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                             
                                <div class="col-md-6">
                                    <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter Category Name " class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" value="<?= $data['slug'] ?>" placeholder="Enter slug" class="form-control">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <input name="description" value="<?= $data['description'] ?>" placeholder="Emter description" class="form-control">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="image" calss="form-control">
                                    <label for="">Current Image</label>
                                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                    <img src="uploads/<?= $data['image'] ?>" height="70px" width="50px" alt="">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Meta Title</label>
                                    <input  name="meta_title" value="<?= $data['meta_tittle'] ?>" placeholder="Enter meta title" class="form-control">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Meta Description</label>
                                    <input  name="meta_description" value="<?= $data['meta_description'] ?>" placeholder="Enter meta description" class="form-control">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Meta Keywords</label>
                                    <input  name="meta_keywords" value="<?= $data['meta_keywords'] ?>" placeholder="Enter meta_keywords" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Status</label>
                                    <input type="checkbox"  <?= $data['status'] ? "checked": "" ?> name="status">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Popular</label>
                                    <input type="checkbox"  <?= $data['popular'] ? "checked": "" ?> name="popular">
                                </div>

                                <div class="col-md12">
                                    <button class="btn btn-primary" name="update_category_btn">Update</button>
                                </div>

                            </div>
                        </form>
                    </div>
                
            </div>
            <?php 
                }
            }
            else
            {
                echo "Category not found";
            }
            
            ?>
        </div>
    </div>

</div>

<?php include("includes/footer.php"); ?>