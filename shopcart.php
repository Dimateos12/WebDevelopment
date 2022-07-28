<?php
include("includes/header.php");
include("config/dbcon.php");
?>


<style>
<<<<<<< HEAD
  @media (min-width: 1025px) {
    .h-custom {
      height: 100vh !important;
    }
  }

  .number-input input[type="number"] {
    -webkit-appearance: textfield;
    -moz-appearance: textfield;
    appearance: textfield;
  }

  .number-input input[type=number]::-webkit-inner-spin-button,
  .number-input input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
  }

  .number-input button {
    -webkit-appearance: none;
    background-color: transparent;
    border: none;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    margin: 0;
    position: relative;
  }

  /* .number-input button:before,
=======
    @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}

.number-input input[type="number"] {
-webkit-appearance: textfield;
-moz-appearance: textfield;
appearance: textfield;
}

.number-input input[type=number]::-webkit-inner-spin-button,
.number-input input[type=number]::-webkit-outer-spin-button {
-webkit-appearance: none;
}

.number-input button {
-webkit-appearance: none;
background-color: transparent;
border: none;
align-items: center;
justify-content: center;
cursor: pointer;
margin: 0;
position: relative;
}

/*.number-input button:before,
>>>>>>> 3bf31c36e06d518f0699b7b121a5e783f60f3a3b
.number-input button:after {
display: inline-block;
position: absolute;
content: '';
height: 2px;
transform: translate(-50%, -50%);
<<<<<<< HEAD
} */

  .number-input button.plus:after {
    transform: translate(-50%, -50%) rotate(90deg);
  }

  .number-input input[type=number] {
    text-align: center;
  }

  .number-input.number-input {
    border: 1px solid #ced4da;
    width: 10rem;
    border-radius: .25rem;
  }

  .number-input.number-input button {
    width: 2.6rem;
    height: .7rem;
  }

  .number-input.number-input button.minus {
    padding-left: 10px;
  }

  .number-input.number-input button:before,
  .number-input.number-input button:after {
    width: .7rem;
    background-color: #495057;
  }

  .number-input.number-input input[type=number] {
    max-width: 4rem;
    padding: .5rem;
    border: 1px solid #ced4da;
    border-width: 0 1px;
    font-size: 1rem;
    height: 2rem;
    color: #495057;
  }

  @media not all and (min-resolution:.001dpcm) {
    @supports (-webkit-appearance: none) and (stroke-color:transparent) {

      .number-input.def-number-input.safari_only button:before,
      .number-input.def-number-input.safari_only button:after {
        margin-top: -.3rem;
      }
    }
  }

  .shopping-cart .def-number-input.number-input {
    border: none;
  }

  .shopping-cart .def-number-input.number-input input[type=number] {
    max-width: 2rem;
    border: none;
  }

  .shopping-cart .def-number-input.number-input input[type=number].black-text,
  .shopping-cart .def-number-input.number-input input.btn.btn-link[type=number],
  .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:hover,
  .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:focus {
    color: #212529 !important;
  }

  .shopping-cart .def-number-input.number-input button {
    width: 1rem;
  }

  .shopping-cart .def-number-input.number-input button:before,
  .shopping-cart .def-number-input.number-input button:after {
    width: .5rem;
  }

  .shopping-cart .def-number-input.number-input button.minus:before,
  .shopping-cart .def-number-input.number-input button.minus:after {
    background-color: #9e9e9e;
  }

  .shopping-cart .def-number-input.number-input button.plus:before,
  .shopping-cart .def-number-input.number-input button.plus:after {
    background-color: #4285f4;
  }
=======
}*/

.number-input button.plus:after {
transform: translate(-50%, -50%) rotate(90deg);
}

.number-input input[type=number] {
text-align: center;
}

.number-input.number-input {
border: 1px solid #ced4da;
width: 10rem;
border-radius: .25rem;
}

.number-input.number-input button {
width: 2.6rem;
height: .7rem;
}

.number-input.number-input button.minus {
padding-left: 10px;
}

.number-input.number-input button:before,
.number-input.number-input button:after {
width: .7rem;
background-color: #495057;
}

.number-input.number-input input[type=number] {
max-width: 4rem;
padding: .5rem;
border: 1px solid #ced4da;
border-width: 0 1px;
font-size: 1rem;
height: 2rem;
color: #495057;
}

@media not all and (min-resolution:.001dpcm) {
@supports (-webkit-appearance: none) and (stroke-color:transparent) {

.number-input.def-number-input.safari_only button:before,
.number-input.def-number-input.safari_only button:after {
margin-top: -.3rem;
}
}
}

.shopping-cart .def-number-input.number-input {
border: none;
}

.shopping-cart .def-number-input.number-input input[type=number] {
max-width: 2rem;
border: none;
}

.shopping-cart .def-number-input.number-input input[type=number].black-text,
.shopping-cart .def-number-input.number-input input.btn.btn-link[type=number],
.shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:hover,
.shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:focus {
color: #212529 !important;
}

.shopping-cart .def-number-input.number-input button {
width: 1rem;
}

.shopping-cart .def-number-input.number-input button:before,
.shopping-cart .def-number-input.number-input button:after {
width: .5rem;
}

.shopping-cart .def-number-input.number-input button.minus:before,
.shopping-cart .def-number-input.number-input button.minus:after {
background-color: #9e9e9e;
}

.shopping-cart .def-number-input.number-input button.plus:before,
.shopping-cart .def-number-input.number-input button.plus:after {
background-color: #4285f4;
}
>>>>>>> 3bf31c36e06d518f0699b7b121a5e783f60f3a3b
</style>




<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card shopping-cart" style="border-radius: 15px;">
          <div class="card-body text-black">

            <div class="row">
              <div class="col-lg-6 px-5 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your products</h3>

                <div id="mycart">
                  <?php

<<<<<<< HEAD
                $user_id = $_SESSION['id'];
                $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id=$user_id ORDER BY c.id DESC";
                $query_run = mysqli_query($con, $query);
                $price = 0;
                $tot=0;
                if (mysqli_num_rows($query_run) > 0) {

                  foreach ($query_run as $item) {

                ?>
                    <div class="container product_data px-4 px-lg-5 my-5">
                      <div class="d-flex align-items-center mb-5">
                        <div class="flex-shrink-0">
                          <img src="admin/uploads/<?= $item['image'] ?>" alt="<?= $item['image'] ?>" class="img-fluid" style="width: 150px;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                          <h5 class="text-primary"><?= $item['name'] ?></h5>
                          <div class="d-flex align-items-center">
                            <p class="fw-bold mb-0 me-5 pe-3"><?= $item['selling_price'] ?>$</p>
                            <div class="def-number-input number-input safari_only">
                             
                              <div class="d-flex ">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" class="form-control text-center input-qty bg-white" id="result" value="1" disabled>
                                <button class="input-group-text  increment-btn">+</button>
                              </div>
                              <?php 
                              
                              
                              
                              $tot +=$item['selling_price'];  ?>
                            </div>
=======
                  $user_id = $_SESSION['id'];
                  $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id=$user_id ORDER BY c.id DESC";
                  $query_run = mysqli_query($con, $query);

                  $tot = 0;
                  if (mysqli_num_rows($query_run) > 0) {

                      foreach ($query_run as $item) {

                        $tot = $tot + ($item['selling_price']*$item['prod_qty']);
                  ?>
                  
                  <div class="container product_data px-4 px-lg-5 my-5">
                    
                    <div class="d-flex align-items-center mb-5">
                      <div class="flex-shrink-0">
                        <img src="admin/uploads/<?= $item['image'] ?>" alt="<?= $item['image'] ?>"
                          class="img-fluid" style="width: 150px;">
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <button class="float-end text-black btn-close deleteItem" value="<?= $item['cid'] ?>"></button>
                        <h5 class="text-black"><?= $item['name'] ?></h5>
                        <div class="d-flex align-items-center">
                          <p class="fw-bold mb-0 me-5 pe-3"><?= $item['selling_price'] ?>$</p>
                          <div class="def-number-input number-input safari_only">

                          <input type="hidden" class="prodId" value="<?= $item['prod_id'] ?>">

                            <div class="d-flex">
                              <button class="input-group-text decrement-btn updateQty">-</button>
                              <input type="text" class="form-control text-center input-qty bg-white"  value="<?= $item['prod_qty'] ?>" disabled>
                              <button class="input-group-text increment-btn updateQty" >+</button>
                            </div>

>>>>>>> 3bf31c36e06d518f0699b7b121a5e783f60f3a3b
                          </div>
                        </div>
                      </div>
                    </div>
<<<<<<< HEAD
                <?php
                  }
                } else {
                  echo "data dont find";
                }
                ?>

=======
                    
                  </div>
                  
                  <?php
                        }
                    } else {
                        echo "data dont find";
                    }

                  ?>
                </div>
                
>>>>>>> 3bf31c36e06d518f0699b7b121a5e783f60f3a3b
                <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                  <h5 class="fw-bold mb-0">Total:</h5>
                  <h5 class="fw-bold mb-0"><?= $tot?> $</h5>
                </div>

              </div>
              <div class="col-lg-6 px-5 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Payment</h3>

                <form class="mb-5">

                  <div class="form-outline mb-5">
                    <input type="text" id="typeText" class="form-control form-control-lg" siez="17" value="1234 5678 9012 3457" minlength="19" maxlength="19" />
                    <label class="form-label" for="typeText">Card Number</label>
                  </div>

                  <div class="form-outline mb-5">
                    <input type="text" id="typeName" class="form-control form-control-lg" siez="17" value="John Smith" />
                    <label class="form-label" for="typeName">Name on card</label>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-5">
                      <div class="form-outline">
                        <input type="text" id="typeExp" class="form-control form-control-lg" value="01/22" size="7" id="exp" minlength="7" maxlength="7" />
                        <label class="form-label" for="typeExp">Expiration</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-5">
                      <div class="form-outline">
                        <input type="password" id="typeText" class="form-control form-control-lg" value="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                        <label class="form-label" for="typeText">Cvv</label>
                      </div>
                    </div>
                  </div>

                  <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit <a href="#!">obcaecati sapiente</a>.</p>

                  <button type="button" class="btn btn-primary btn-block btn-lg">Buy now</button>

                  <h5 class="fw-bold mb-5" style="position: absolute; bottom: 0;">
                    <a href="/index.php"><i class="fas fa-angle-left me-2"></i>Back to shopping</a>
                  </h5>

                </form>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include("includes/footer.php"); ?>