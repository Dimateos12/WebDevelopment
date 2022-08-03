<?php include("includes/header.php");
include('config/dbcon.php');
?>



<div class="p-5 text-center bg-image rounded-3 " style="
    
    height: 400px;
  ">
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">History</h1>
        <h4 class="mb-3">Your buying history</h4>
      </div>
    </div>
  </div>
</div>


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
                              Products and Qny
                          </th>
                          <th>
                              Date
                          </th>
                          <th>
                              Status
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                  
                      $user_id = $_SESSION['id'];
                      $query = "SELECT p.id as pu_id, p.id_user as pu_id_user, p.created_at as pu_created_at FROM purchases p, products_in_purchases m WHERE p.id=m.purchase_id AND p.id_user = $user_id GROUP BY pu_id";
                      $purchases_query = mysqli_query($con,$query);
                    
                      if(mysqli_num_rows($purchases_query) > 0)
                      {
                          foreach($purchases_query as $item)
                          {
                              ?>
                              <tr>
                              <td>
                                  <table class="table table-border">

                                      <?php
                                          $pur_id = $item['pu_id'];
                                          $product_query = "SELECT b.name as pr_id, m.product_qny as pr_qny FROM purchases p, products_in_purchases m, products b WHERE p.id=m.purchase_id AND m.product_id=b.id AND p.id=$pur_id";
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
                              <td>In progress</td>
                              </tr>
                              <?php
                          }
                      }
                    ?>

                    <?php
                  
                      $user_id = $_SESSION['id'];
                      $query = "SELECT p.purchase_id as pu_id, p.id_user as pu_id_user, p.created_at as pu_created_at FROM history_purchases p, products_in_history m WHERE p.purchase_id=m.purchase_id AND p.id_user = $user_id GROUP BY pu_id";
                      $purchases_query = mysqli_query($con,$query);
                    
                      if(mysqli_num_rows($purchases_query) > 0)
                      {
                          foreach($purchases_query as $item)
                          {
                              ?>
                              <tr>
                              <td>
                                  <table class="table table-border">

                                      <?php
                                          $pur_id = $item['pu_id'];
                                          $product_query = "SELECT b.name as pr_id, m.product_qny as pr_qny FROM history_purchases p, products_in_history m, products b WHERE p.purchase_id=m.purchase_id AND m.product_id=b.id AND p.purchase_id=$pur_id";
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
                              <td>Confirm</td>
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