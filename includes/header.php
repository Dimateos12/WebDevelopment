

<!DOCTYPE html>
<html lang="en">
<!-- Font Awesome -->

<link href="assets/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />


<head>
  <meta charset="utf-8" />

 
    <script src="assets/js/custom.js"></script>
  <!-- Basic -->

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />

  <title>Timups</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <link rel='canonical' href='http://localhost/WebDevelopment/index.php' />
  <script type="text/javascript">
    var ezouid = "1";
  </script>
  <base href="http://localhost/WebDevelopment/index.php">




</head>

<body>

  <div class="hero_area">
    <div class="hero_social">
      <a href="">
        <i class="fa fa-facebook" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-twitter" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-linkedin" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </a>
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Giacteusz Shop
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="category.php"> Watches </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
            </ul>

            <?php
            if (isset($_SESSION['auth'])) {
            ?>
              <div class="user_option-box">
                <a href="../personalpage.php">
                  <i class="fa fa-user" href="" aria-hidden="true"></i>
                </a>
                <a href="">

                  <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </a>
                <a href="../logout.php">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>

                </a>
              </div>
              </a>


            <?php }
              else {
            ?>
           <div class="user_option-box">
                <a href="personalpage.php">
                  <i class="fa fa-user" href="" aria-hidden="true"></i>
                </a>
                <a href="">

                  <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </a>
                <a href="../login.php">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>

                </a>
              </div>
              </a>

              <?php
            }
            ?>



          </div>
        </nav>
      </div>
    </header>