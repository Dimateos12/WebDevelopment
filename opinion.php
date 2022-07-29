<?php include("includes/header.php");
include('config/dbcon.php');
?>


<section class="contact_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="form_container">
          <div class="heading_container">
            <h2>
              Your opinion
            </h2>
          </div>
          <form action="functions/opinion_script.php" method="POST">
            <div>
              <input type="text" class="message-box" name="text" placeholder="Opinion" />
            </div>
            
              <button type="submit">SEND</button>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("includes/footer.php"); ?>