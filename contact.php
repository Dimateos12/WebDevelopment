<?php include("includes/header.php") ?>

  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Contact Us
              </h2>
            </div>
            <form action="functions/contactcode.php" method="POST">
              <div>
                <input type="text" name="name" placeholder="Full Name " />
              </div>
              <div>
                <input type="email" name="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" name="phone" placeholder="Phone number" />
              </div>
              <div>
                <input type="text" class="message-box" name="text" placeholder="Message" />
              </div>
              <div class="d-flex ">
                <button type="submit">
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/contact-img.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <?php include("includes/footer.php"); ?>