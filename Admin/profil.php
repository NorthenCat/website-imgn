<h2 class="text-white" style="text-align: center;width: 100%;background-color: #212529;">PROFILE</h2> 
<form method="POST" enctype="multipart/form-data">
  <?php 
  $ambil = mysqli_query($koneksi,"SELECT * FROM akun WHERE id_akun='$_GET[id]'"); 
  $pecah = mysqli_fetch_assoc($ambil);
  $tipe = $pecah['tipeuser'];
        //cek id akun
  $id_akun_profil= $pecah['id_akun'];
  $id_akun_login = $_SESSION['akun']['id_akun'];
  if ($id_akun_profil!==$id_akun_login) {
    echo "<script>window.location='index.php?page=profile&id=$id_akun_login';</script>";
  }
    //akhir dari pengecekan
  ?>
  <div class="form-group">
    <label>Fullname</label>
    <input type="text" placeholder="Yourname" class="form-control" name="nama_lengkap" value="<?php echo $pecah['nama_lengkap'] ?>" onkeyup="lettersOnly(this)">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" placeholder="Your email" class="form-control" name="email" value="<?php echo $pecah['email'] ?>">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" placeholder="Your password" class="form-control" name="password" value="<?php echo $pecah['password'] ?>" onkeyup="lettersOnly(this)">
  </div>
  <div class="form-group">
    <label>Telephone Number</label>
    <input type="number" placeholder="Your number" class="form-control" name="no_telepon" value="<?php echo $pecah['no_telepon'] ?>">
  </div>
  <div class="form-group">
    <label>User Type</label>
    <select name="tipeuser" class="form-control">
      <option value="Admin" <?php if ($tipe=='admin') echo 'selected="selected"'?>>Admin</option>
      <option value="Pengguna" <?php if ($tipe=='pengguna') echo 'selected="selected"'?>>Pengguna</option>
    </select>
  </div>
  <div class="col-lg text-center" style="padding-top: 10px; padding-bottom: 10px;">
    <button class="btn btn-warning form-control" type="submit" name="save">Update Profile</button>
  </div>
</form>
<?php 

if (isset($_POST['save'])) {
    mysqli_query($koneksi, "UPDATE akun SET nama_lengkap='$_POST[nama_lengkap]', email='$_POST[email]', password='$_POST[password]', no_telepon='$_POST[no_telepon]', tipeuser='$_POST[tipeuser]' WHERE id_akun='$_GET[id]'");
  echo "<script>alert('Profile Updated !);</script>";
  echo "<script>window.location='index.php?page=profile&id=$id_akun_login';</script>";
}

?>

