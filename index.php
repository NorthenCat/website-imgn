<?php session_start(); include 'db/koneksi.php'; ?>
<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- File CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--light-slider.css------------->
    <link rel="stylesheet" type="text/css" href="css/lightslider.css">
    <!--Jquery-------------------->
    <script type="text/javascript" src="js/Jquery.js"></script>
    <!--lightslider.js--------------->
    <script type="text/javascript" src="js/lightslider.js"></script>

    <!-- Fontawosome -->
    <script src="https://kit.fontawesome.com/8c565c76d4.js" crossorigin="anonymous"></script>
    <script>
      function lettersOnly(input) {
        var regex = /[^a-zA-Z0-9_ ]/gi;
        input.value = input.value.replace(regex, "");
      }
    </script>

    <title>IMGN.CO | Catalog</title>
  </head>
  <body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-black" style="background-color: #F9F9F9;">
      <div class="container-fluid">
        <a class="navbar-brand">IMGN.CO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-size: 20px; font-family: Copperplate;">
            <li class="nav-item">
              <a class="nav-link text-dark" aria-current="page" href="index.php?page=product">PRODUCT</a>
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link text-dark">|</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" aria-current="page" href="index.php?page=cart">CART</a>
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link text-dark">|</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link text-dark" aria-current="page" href="index.php?page=history">HISTORY</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto mb-2 mb-lg-0" style="font-size: 20px; font-family: Copperplate;">
            <?php if(isset($_SESSION['akun'])):?>
              <li class="nav-item">
                <a class="nav-link text-dark" href="index.php?page=profile&id=<?php echo $_SESSION['akun']['id_akun'] ?>">PROFILE</a>
              </li>
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link text-dark">|</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="db/logout.php">LOG OUT</a>
              </li>
            <?php else: ?>
             <li class="nav-item">
              <a class="nav-link text-dark" href="login.php">SIGN IN</a>
            </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>

<main>
  <?php if (isset($_GET['page'])){
    if ($_GET['page']=='product') {
      include 'produk.php';
    } elseif ($_GET['page']=='cart') {
      include 'keranjang.php';
    } elseif ($_GET['page']=='checkout') {
      include 'checkout.php';
    } elseif ($_GET['page']=='deletecart') {
      include 'hapuskeranjang.php';
    } elseif ($_GET['page']=='note') {
      include 'nota.php';
    } elseif ($_GET['page']=='history') {
      include 'riwayat.php';
    } elseif ($_GET['page']=='profile') {
      include 'profil.php';
    } elseif ($_GET['page']=='buy') {
      include 'beli.php';
    }
  }else{
    include 'produk.php';
  }
  ?>
</main>
<!-- Footer -->
<footer class="footer text-center text-lg-start bg-light text-muted" style="margin-top:65px;">

  <!-- Section: Links  -->
  <section class="d-flex justify-content-center justify-content-lg-between p-3">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>IMAGINE COMPANY
          </h6>
          <p>
            A company that provides clothes, jackets, hoodies with good and premium quality.
          </p>
        </div>
        <!-- Grid column -->


        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> Tangerang, ZIP 15710, Indonesia</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            imgn.co@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 62 851 5695 0595</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
</footer>
<!-- Footer -->



  <!-- Script Link -->
  <script type="text/javascript" src="js/scripts.js"></script>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>
</html>