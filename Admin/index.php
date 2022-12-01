<?php session_start(); include 'db/koneksi.php'; 

if ($_SESSION['tipeuser']!=='admin') {
  echo "<script>alert('Harap login sebagai admin !');window.location='../login.php';</script>"; 
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Bootstrap Icon CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
  <!-- CK Editor -->
  <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    
  <script>
    function lettersOnly(input) {
      var regex = /[^a-zA-Z0-9_ ]/gi;
      input.value = input.value.replace(regex, "");
    }
    function numbersOnly(input) {
      var regex = /[^0-9]/gi;
      input.value = input.value.replace(regex, "");
    }
  </script>
  
  <title>IMGN.CO | Admin</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand">IMGN.CO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-size: 20px; font-family: Copperplate;">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="index.php?page=product">PRODUCT</a>
          </li>
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link text-white">|</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="index.php?page=buyer">BUYER</a>
          </li>
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link text-white">|</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="index.php?page=customer">CUSTOMER</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0" style="font-size: 20px; font-family: Copperplate;">
          <?php if(isset($_SESSION['akun'])):?>
            <li class="nav-item">
              <a class="nav-link text-white" href="index.php?page=profile&id=<?php echo $_SESSION['akun']['id_akun'] ?>">PROFILE</a>
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link text-white">|</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="db/logout.php">LOG OUT</a>
            </li>
          <?php else: ?>
           <li class="nav-item">
            <a class="nav-link text-white" href="../pengguna/login.php">SIGN IN</a>
          </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container" style="margin-top: 10px;background-color: #F0EAEA;">
 <?php 
 if (isset($_GET['page'])) {
   if ($_GET['page']=='product') {
    include 'produk.php';
  } elseif ($_GET['page']=='buyer') {
    include 'pembelian.php';
  } elseif ($_GET['page']=='customer') {
    include 'customer.php';
  } elseif ($_GET['page']=='detail') {
    include 'detail.php';
  } elseif ($_GET['page']=='addproduct') {
    include 'tambahproduk.php';
  } elseif ($_GET['page']=='deleteproduct') {
    include 'deleteproduk.php';
  } elseif ($_GET['page']=='updateproduct') {
    include 'updateproduk.php';
  } elseif ($_GET['page']=='deletecustomer') {
    include 'deletecustomer.php';
  } elseif ($_GET['page']=='status') {
    include 'statuspembelian.php';
  } elseif ($_GET['page']=='profile') {
    include 'profil.php';
  } elseif ($_GET['page']=='profilecustomer') {
    include 'profilecustomer.php';
  }
} else {
 include 'produk.php';
}
?>
</div>

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
  
<script>
        CKEDITOR.replace( 'deskripsi_produk' );
</script>
  
</body>
</html>