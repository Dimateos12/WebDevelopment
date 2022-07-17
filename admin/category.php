<?php
include("includes/header.php");
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');

?>

<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
    </div>
<?php
    unset($_SESSION['message']);
} ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4> Cateogries </h4>
            </div>
            <div class="card-body">
                <table class="table table-border">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Edit
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   $categories = "categories";
                    $query = "SELECT * FROM $categories";
                    $category= mysqli_query($con,$query);
                   
                    if(mysqli_num_rows($category) > 0)
                    {
                        foreach($category as $item)
                        {
                            ?>
                            <tr>
                            <td><?= $item['id']; ?></td>
                            <td><?= $item['name']; ?></td>
                            <td>
                                <img src="uploads/<?= $item['image']; ?>" width = 50px; height=70px; alt="<?= $item['image']; ?>">
                            </td>
                            <td><?= $item['status'] == '0' ? "Visible": "Hidden"; ?></td>
                           
                            <td>
                                <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-primary"> Edit</a>
                            </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

</div>

<?php include("includes/footer.php"); ?>