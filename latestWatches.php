<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Watches
        </h2>
      </div>
      <div class="row">
      <?php
   include("config/dbcon.php");
    $query = "SELECT * FROM products ";
    $query_run = mysqli_query($con, $query);

if (mysqli_num_rows($query_run) > 0) {
    $counter = 0;

    foreach ($query_run as $item) {
?>
        <div class="col-sm-6 col-xl-3 ">
          <div class="box">
            <a href="index_product.php?product=<?= $item['slug']; ?>" >
              <div class="img-box">
                <img src="admin/uploads/<?= $item['image']; ?>"  alt="<?= $item['image']; ?>" " alt="" />
              </div>
              <div class="detail-box">
                <h6>
                <?= $item['name']; ?>
                </h6>
                <h6>
                  Price:
                  <span>
                  <?= $item['selling_price']; ?>
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  Featured
                </span>
              </div>
            </a>
          </div>
        </div>
        <?php
        $counter++;
        if($counter>3){ break;}
        }
    } else {
        echo "data dont find";
        echo $cid;
    }

    ?>
      <div class="btn-box">
        <a href="category.php">
          View All
        </a>
      </div>
    </div>
  </section>
