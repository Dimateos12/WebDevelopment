<?php include("includes/header.php");
?>

<h1>Hi <?php echo $_SESSION['name'];?>!</h1>

<div class="container d-flex justify-content-around p-5">
        <form action="cart.php">
            <button type="submit" class="btn btn-primary btn-lg">
                Your cart
            </button>
        </form>
        <form action="purchase.php">
            <button type="submit" class="btn btn-primary btn-lg">
                Your purchase
            </button>
        </form>
        <form action="personaledit.php">
            <button type="submit" class="btn btn-primary btn-lg">
                Your personal data
            </button>
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
