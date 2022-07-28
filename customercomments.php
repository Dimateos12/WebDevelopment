
<style>.link-muted { color: #aaa; } .link-muted:hover { color: #1266f1; }</style>

<section style="background-color: white;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="card text-dark">
          <div class="card-body p-4">
            <h4 class="mb-0">The last comment</h4>
            <p class="fw-light mb-4 pb-2">Latest Comment of the user</p>
            <div class="d-flex flex-start">

            <?php 
            
            $query = "SELECT * FROM opinions ORDER BY id DESC LIMIT 1 ";
            $query_run = mysqli_query($con, $query);
            $data = mysqli_fetch_array($query_run);


            if (mysqli_num_rows($query_run) > 0) {


            foreach ($query_run as $item) {


            
            ?>
            
              <div>
                <h6 class="fw-bold mb-1"><?= $item['user_name'] ?></h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                  <?= $item['created_at'] ?>
                  </p>
                </div>
                <p class="mb-0">
                <?= $item['comment'] ?>
                </p>
              </div>
            </div>
          </div>
                <?php }
            }
                ?>
      </div>
    </div>
  </div>
</section>