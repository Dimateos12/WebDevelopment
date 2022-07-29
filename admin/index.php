<?php
include("includes/header.php");
include("../config/dbcon.php");
include('../middleware/adminMiddleware.php');




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
            <div class="row mt-4">
                <div class="col-lg-7 position-relative z-index-2">
                    <div class="card card-plain mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column h-100">
                                        <h2 class="font-weight-bolder mb-0">General Statistics</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 col-sm-5">
                            <div class="card  mb-2">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">weekend</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Users</p>
                                        <?php


                                        $result = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `users`");
                                        $row = mysqli_fetch_array($result);
                                        $count = $row['count'];


                                        if (mysqli_num_rows($result) > 0) {

                                        ?>
                                            <h4 class="mb-0"><?= $count ?></h4>
                                        <?php } ?>
                                    </div>
                                </div>

                                <hr class="dark horizontal my-0">
                                <div class="card-footer p-3">
                                  
                                </div>
                            </div>

                            <div class="card  mb-2">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">leaderboard</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Bought</p>
                                        <h4 class="mb-0">2,300</h4>
                                    </div>
                                </div>

                                <hr class="dark horizontal my-0">
                                <div class="card-footer p-3">
                                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
                            <div class="card  mb-2">
                                <div class="card-header p-3 pt-2 bg-transparent">
                                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">store</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize ">Products</p>
                                        <?php


                                            $result = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `products`");
                                            $row = mysqli_fetch_array($result);
                                            $count = $row['count'];


                                            if (mysqli_num_rows($result) > 0) {

                                                ?>
                                        <h4 class="mb-0 "><?= $count ?></h4>
                                        <?php  } ?>
                                    </div>
                                </div>

                                <hr class="horizontal my-0 dark">
                                <div class="card-footer p-3">
                                </div>
                            </div>

                    

                               
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>


<?php include("includes/footer.php"); ?>