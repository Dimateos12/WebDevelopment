<?php include("includes/header.php");
include("config/dbcon.php"); ?>
<style>
    :root {
        --red: hsl(0, 78%, 62%);
        --cyan: hsl(180, 62%, 55%);
        --orange: hsl(34, 97%, 64%);
        --blue: hsl(212, 86%, 64%);
        --varyDarkBlue: hsl(234, 12%, 34%);
        --grayishBlue: hsl(229, 6%, 66%);
        --veryLightGray: hsl(0, 0%, 98%);
        --weight1: 200;
        --weight2: 400;
        --weight3: 600;
    }

    body {
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        background-color: var(--veryLightGray);
    }

    .attribution {
        font-size: 11px;
        text-align: center;
    }

    .attribution a {
        color: hsl(228, 45%, 44%);
    }

    h1:first-of-type {
        font-weight: var(--weight1);
        color: var(--varyDarkBlue);

    }

    h1:last-of-type {
        color: var(--varyDarkBlue);
    }

    @media (max-width: 400px) {
        h1 {
            font-size: 1.5rem;
        }
    }

    .header {
        text-align: center;
        line-height: 0.8;
        margin-bottom: 50px;
        margin-top: 100px;
    }

    .header p {
        margin: 0 auto;
        line-height: 2;
        color: var(--grayishBlue);
    }


    .box p {
        color: var(--grayishBlue);
    }

    .box {
        border-radius: 5px;
        box-shadow: 0px 30px 40px -20px var(--grayishBlue);
        padding: 30px;
        margin: 20px;
    }

    img {
        float: right;
    }

    @media (max-width: 450px) {
        .box {
            height: 200px;
        }
    }

    @media (max-width: 950px) and (min-width: 450px) {
        .box {
            text-align: center;
            height: 180px;
        }
    }

    .cyan {
        border-top: 3px solid var(--cyan);
    }

    .red {
        border-top: 3px solid var(--red);
    }

    .blue {
        border-top: 3px solid var(--blue);
    }

    .orange {
        border-top: 3px solid var(--orange);
    }

    h2 {
        color: var(--varyDarkBlue);
        font-weight: var(--weight3);
    }


    @media (min-width: 950px) {
        .row1-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .row2-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box-down {
            position: relative;
            top: 150px;
        }

        .box {
            width: 20%;

        }

        .header p {
            width: 30%;
        }

    }
</style>

<?php //  $_SESSION['id'] 
$id_user = $_SESSION['id'];
$query = "SELECT * FROM user_data WHERE id_user = '$id_user' ";
$query_run = mysqli_query($con,$query);

if(mysqli_num_rows($query_run)> 0 ) {
  $data = mysqli_fetch_array($query_run);
?>



<div class="header">
    <h1>Welcome <?= $_SESSION['name1'] ?>  ! </h1>
    <h1>Your panel of user </h1>

    <p>
        Your personal information<br>
      <b>Name:</b> <?= $_SESSION['name1'] ?>
      <b>Surname:</b> <?= $data['Surname']?>

      <b>Street:</b> <?= $data['street']?>
      <b>Zip:</b> <?= $data['zip']?>
      <b>Country:</b> <?= $data['country']?>
      </p>
</div>

<div class="row1-container">
    <div class="box box-down cyan">
       <a href="history.php"> <h2>Check you history of buy</h2></a>
        <p></p>
        <img src="https://assets.codepen.io/2301174/icon-supervisor.svg" alt="">
    </div>

    <div class="box red">
    <a href="personaledit.php">  <h2>Change your Information </h2> </a>
        <p></p>
        <img src="https://assets.codepen.io/2301174/icon-team-builder.svg" alt="">
    </div>

    <div class="box box-down blue">
       <a href="shopcart.php"> <h2>Your shop cart</h2> </a>
        <p></p>
        <img src="https://assets.codepen.io/2301174/icon-calculator.svg" alt="">
    </div>
</div>
<div class="row2-container">
    <div class="box orange">
    <a href="opinion.php"> <h2>Opinion</h2> </a>
        <p></p>
        <img src="https://assets.codepen.io/2301174/icon-karma.svg" alt="">
    </div>
</div>

<?php } ?>
<?php include("includes/footer.php"); ?>