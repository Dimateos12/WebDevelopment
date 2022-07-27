<?php include("includes/header.php");
      
?>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
    </div>
<?php
    unset($_SESSION['message']);
} ?>

<?php

include("section.php");
include("latestWatches.php");

?>

<section class="about_section layout_padding">

<?php
include("aboutUS.php");
?>
</section>








<section class="feature_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Features Of Our Watches
        </h2>
        <p>
        Discover the elements of a good quality watch before you buy it
        </p>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="images/f1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
              WATER RESISTANCE OF A WATCH
              </h5>
              <p>
              Bluetooth is the key feature that makes your smart watch wireless and that is the feature which is capable of increasing usability.
              </p>
              
           
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="images/f2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Alerts &amp; Notifications
              </h5>
              <p>
              Bluetooth is the key feature that makes your smart watch wireless and that is the feature which is capable of increasing usability of this gadget.
              </p>
            
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="images/f3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Messages
              </h5>
              <p>
              Bluetooth is the key feature that makes your smart watch wireless and that is the feature which is capable of increasing usability of this gadget.
              </p>
           
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="images/f4.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Bluetooth
              </h5>
              <p>
              Bluetooth is the key feature that makes your smart watch wireless and that is the feature which is capable of increasing usability of this gadget.
              </p>
           
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
  </section>


<?php include("includes/footer.php"); ?>