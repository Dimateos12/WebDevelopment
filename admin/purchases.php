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
               <h4> Purchases </h4>
            </div>
            <div class="card-body">
                <table class="table table-border">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            ID User
                        </th>
                        <th>
                            Products and Qny
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Confirm
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                
                    $query = "SELECT p.id as pu_id, p.id_user as pu_id_user, p.created_at as pu_created_at FROM purchases p, products_in_purchases m WHERE p.id=m.purchase_id GROUP BY pu_id";
                    $purchases_query = mysqli_query($con,$query);
                   
                    if(mysqli_num_rows($purchases_query) > 0)
                    {
                        foreach($purchases_query as $item)
                        {
                            ?>
                            <tr>
                            <td><?= $item['pu_id']; ?></td>
                            <td><?= $item['pu_id_user']; ?></td>
                            <td>
                                <table class="table table-border">

                                    <?php
                                        $pur_id = $item['pu_id'];
                                        $product_query = "SELECT m.product_id as pr_id, m.product_qny as pr_qny FROM purchases p, products_in_purchases m WHERE p.id=m.purchase_id AND p.id=$pur_id";
                                        $product_query_run = mysqli_query($con,$product_query);

                                        foreach($product_query_run as $product){
                                    ?>
                                    <tr>
                                        <td><?php echo $product['pr_id']; ?></td>
                                        <td><?php echo $product['pr_qny']; ?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                            </td>
                            <td><?= $item['pu_created_at']; ?></td>
                            <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="purchase_id" value="<?= $item['pu_id']; ?>">
                                    <button type="submit" name="done_purchase_btn" class="btn btn-success">Confirm</button>
                                </form>
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