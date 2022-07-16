<?php session_start(); include("includes/header.php");  ?>

<h1>Hello, world!</h1>


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