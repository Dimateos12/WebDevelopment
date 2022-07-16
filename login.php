<?php session_start();  ?>

<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="css/reg.css" rel="stylesheet">

<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <?php if (isset($_SESSION['message'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>STOP!</strong> <?= $_SESSION['message']; ?>

                                </div>
                            <?php
                                unset($_SESSION['message']);
                            } ?>
                            <h2 class="text-uppercase text-center mb-5">Loggin</h2>

                            <form action="functions/authcode.php" method="POST">

                                <div class="form-outline mb-4">
                                    <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                </div>


                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="login_btn" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Loggin</button>

                                </div>
                                <p class="text-center text-muted mt-5 mb-0">If you dont have a account? <a href="reg.php" class="fw-bold text-body"><u>Register here</u></a></p>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>