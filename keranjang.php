<?php 
if (isset($_SESSION['akun'])) {
  if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Empty cart ! please add the product first');window.location='index.php';</script>";
  }
}else{
  echo "<script>alert('Login first before use cart');window.location='index.php';</script>";
}
?>
<div class="container">
  <h2 class="text-white" style="text-align: center;margin-top: 10px;width: 100%;background-color: #212529;">CART</h2>
  <div style="overflow-x:auto;">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th width="1" style="text-align: center;">ID</th>
        <th width="150" style="text-align:center;">Product</th>
        <th width="150" style="text-align:center;">Price</th>
        <th width="1" style="text-align: center;">Total</th>
        <th width="1" style="text-align: center;">Size</th>
        <th width="1" style="text-align: center;">Color</th>
        <th width="130" style="text-align: center;">Sub Price</th>
        <th width="1" style="text-align:center;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $nomor=1;foreach ($_SESSION['keranjang'] as $id_produk => $keranjang){ ?>
        <?php 
        $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'"); 
        $pecah = mysqli_fetch_assoc($ambil);
        $jumlah = $keranjang['jumlah'];
        $color = $keranjang['color'];
        $size = $keranjang['size'];
        $subharga = $pecah['harga_produk']*$jumlah;
        ?>
        <tr>
          <td style="text-align: center;"><?php echo $nomor; ?></td>
          <td><?php echo $pecah['nama_produk']; ?></td>
          <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
          <td style="text-align: center;"><?php echo $jumlah; ?></td>
          <td style="text-align: center;"><?php echo $size ?></td>
          <td style="text-align: center;"><?php echo $color ?></td>
          <td style="text-align: center;">Rp. <?php echo number_format($subharga); ?></td>
          <td class="actions text-center "><a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></i></button></a></td>
        </tr>
        <?php $nomor++; } ?>
      </tbody>
    </table>
    </div>
    <a href="index.php?page=checkout" class="btn btn-primary" style="float: right; width: 150px;">Checkout</a>
  </div>


