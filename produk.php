<!-- Catalog Page -->
<div id="catalog">
  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid text-white text-uppercase" style="height: 250px; background-image: url(img/jumbotron.jpeg);background-size: cover; margin-bottom: 20px;">
    <div class="container" style="text-align: left;padding-top: 70px; margin-left: 20px; font-family: Copperplate;">
      <h1 class="display-6">Looking For Indonesian<br>Local Brand ?</h1>
    </div>
  </div>
</div>


<!-- Garis -->
<hr style="border: 1px solid black; margin-left: 10px; margin-right: 10px;">

<!-- Product Slider -->
<section class="slider">
  <ul id="autoWidth" class="cs-hidden">
    <?php
    $query = "SELECT * FROM produk ORDER BY nama_produk ASC";
    $result = mysqli_query($koneksi,$query);
    if(mysqli_num_rows($result) >0){
      while($row = mysqli_fetch_array($result)){
        ?> 
        <!-- Produk--> 
        <li class="item-a">
          <!--BOX SLIDER-->
          <div class="box">
            <!--Img Box-->
            <div class="slide-img">
              <img src="img/<?php echo $row ['gambar_produk']; ?>">
              <!--overlayer---------->
              <div class="overlay">
                <!--buy-btn------>  
                <a href="index.php?page=buy&id=<?php echo $row['id_produk'] ?>" class="buy-btn" >More Detail</a> 
              </div>
            </div>
            <!--detail-box--------->
            <div class="detail-box">
              <!--type-------->
              <div class="type">
                <a><?php echo $row ['nama_produk']; ?></a>
                <span><?php echo $row ['tipe_produk']; ?></span>
              </div>
              <!--price-------->
              <a class="price">Rp <?php echo number_format($row ['harga_produk']); ?></a>
            </div>
          </div> 
        </li>
      <?php } } ?>  
    </ul>
  </section>
      <!-- End Of Product Page -->