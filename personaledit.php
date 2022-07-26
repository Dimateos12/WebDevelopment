<?php 
    include("includes/header.php");
    $host = "localhost";
    $username = "root";
    $password ="";
    $database ="web_development";


    // creating database connection
    $con = mysqli_connect($host,$username,$password,$database);

    // check if database has connection

    if(!$con){
        die("Conncetion failed ". mysqli_connect_error());
    }

    $id = $_SESSION['id'];

    $query_run = $con->query("SELECT * FROM users WHERE id='$id'");
    $userdate = mysqli_fetch_array($query_run);

    $name = $userdate['name'];
    $email = $userdate['email'];
    $phone = $userdate['phone'];
    $password = $userdate['password'];

?>

<h1><?php echo $_SESSION['name1']?></h1>

<div class="container d-flex justify-content-center p-5">
    <form action="../functions/editcode.php" method="POST">

        <p class="text-center">Edit your data</p>
        
        <!-- Name field -->
        <div class="form-group mb-4">
          <input type="text" id="editName" class="form-control" name="name" value="<?php echo $name ?>">
          <label class="form-label" for="editName">Name</label>
        </div>

         <!-- Email field -->
         <div class="form-group mb-4">
          <input type="text" id="editEmil" class="form-control" name="email" value=<?php echo $email ?>>
          <label class="form-label" for="editEmil">Email</label>
        </div>

         <!-- Phone field -->
         <div class="form-group mb-4">
          <input type="text" id="editPhone" class="form-control" name="phone" value=<?php echo $phone ?>>
          <label class="form-label" for="editPhone">Phone</label>
        </div>

         <!-- Password field -->
         <div class="form-group mb-4">
          <input type="password" id="editPassword" class="form-control" name="password" value=<?php echo $password ?>>
          <label class="form-label" for="editPassword">Password</label>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" name="edit_btn" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Edit</button>
        </div>

    </form>
</div>
<!-- add exit button -->
<button class="btn btn-primary">Test</button>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
    </div>
    <?php
    unset($_SESSION['message']);
} ?>

<?php include("includes/footer.php"); ?>