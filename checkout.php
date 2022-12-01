<?php 
if (!isset($_SESSION['akun'])) {
  echo "<script>alert('Login first before use this function');window.location='index.php';</script>";
}
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Empty Checkout ! please add the product first');window.location='index.php';</script>";
}
?>
<div class="container">
  <h2 class="text-white" style="text-align: center;margin-top: 10px;width: 100%;background-color: #212529;">CHECKOUT</h2>
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
      </tr>
    </thead>
    <tbody>
      <?php $nomor=1; $totalbelanja=0; foreach ($_SESSION['keranjang'] as $id_produk => $keranjang){ ?>
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
        </tr>
        <?php $nomor++; $totalbelanja+=$subharga; } ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="6">Total Price</th>
          <th>Rp. <?php echo number_format($totalbelanja); ?></th>
        </tr>
      </tfoot>
    </table>

    <form method="POST">
      <div class="row">
        <div class="col md-4">
          <div class="form-group">
            <input type="text" class="form-control" readonly value="<?php echo $_SESSION['akun']['nama_lengkap'] ?>">
          </div>
        </div>
        <div class="col md-4">
          <div class="form-group">
            <input type="text" class="form-control" readonly value="<?php echo $_SESSION['akun']['no_telepon'] ?>">
          </div>
        </div>
        <div class="col md-4">
          <select class="form-control" name="id_ongkir" required>
            <option value="">Choose Postage</option>
            <?php $ambil = mysqli_query($koneksi,"SELECT * FROM ongkir");
            while ($perongkir = mysqli_fetch_assoc($ambil)) {
             ?>
             <option value="<?php echo $perongkir['id_ongkir'] ?>"><?php echo $perongkir['nama_kota'] ?> -- Rp. <?php echo number_format($perongkir['tarif']) ?></option>
           <?php } ?>
         </select>
       </div>
     </div>
     <div class="form-group" style="padding-top:5px;">
      <h4>Shipping Address</h4>
      <textarea class="form-control" name="alamat_pengiriman" placeholder="Enter the full shipping address and zip code"required></textarea>
    </div>
    <button class="btn btn-primary" name="checkout" style="float: right; margin-top:5px;">Checkout</button>
  </form>

  <?php 
  if (isset($_POST['checkout'])) {
    $id_pelanggan = $_SESSION['akun']['id_akun'];
    $id_ongkir = $_POST['id_ongkir'];
    $tanggal_pembelian = date("y-m-d");
    $ambil_alamat = $_POST['alamat_pengiriman'];
    $alamat = htmlspecialchars($ambil_alamat);

    $ambil = mysqli_query($koneksi,"SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
    $array = mysqli_fetch_assoc($ambil);
    $nama_kota = $array['nama_kota'];
    $tarif = $array['tarif'];

    $total_pembelian = $totalbelanja + $tarif;
    mysqli_query($koneksi,"INSERT INTO pembelian (id_akun,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat')");
    $id_pembelian_produk = $koneksi->insert_id;
    foreach($_SESSION['keranjang'] as $id_produk => $keranjang){
      $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
      $perproduk=$ambil->fetch_assoc();
      $jumlah = $keranjang['jumlah'];
      $color = $keranjang['color'];
      $size = $keranjang['size'];
      $nama=$perproduk['nama_produk'];
      $harga=$perproduk['harga_produk'];
      $subharga = $perproduk['harga_produk']*$jumlah;
      mysqli_query($koneksi,"INSERT INTO pembelian_produk (id_pembelian,id_produk,nama_produk,harga_produk,warna_produk,ukuran_produk,jumlah,subharga) VALUES ('$id_pembelian_produk','$id_produk','$nama','$harga','$color','$size','$jumlah','$subharga')");
    }
    unset($_SESSION['keranjang']);

    echo "<script>alert('Successful Purchase');window.location='index.php?page=note&id=$id_pembelian_produk';</script>";
  }
  ?>
</div>