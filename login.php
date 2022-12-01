<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>IMGN.CO | Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
  <script>
    function lettersOnly(input) {
      var regex = /[^a-zA-Z0-9_ ]/gi;
      input.value = input.value.replace(regex, "");
    }
  </script>
  <script type="text/javascript">
    function show(shown, hidden) {
      document.getElementById(shown).style.display='block';
      document.getElementById(hidden).style.display='none';
      return false;
    }  </script>
  </head>
  <body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img src="img/login-img.png" alt="login" class="login-card-img">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <div class="brand-wrapper">
                  <p class="logo">IMGN.CO</p>
                </div>
                <p class="login-card-description">Sign into your account</p>

                <!--Sign In -->
                <form id="login" action="db/proses_login.php" method="post">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
                  </div>
                  <input name="" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                  <p id="login" class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset" onclick="return show('sign-up','login')">Register here</a></p>
                </form>

                <!-- Sign Up -->  
                <form id="sign-up" action="db/proses_register.php" method="post" style="display: none;">
                  <div class="form-group mb-4">
                    <label for="nama_lengkap" class="sr-only">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Full Name" onkeyup="lettersOnly(this)" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="no_telepon" class="sr-only">Nomor Telepon</label>
                    <input type="number" name="no_telepon" id="no_telepon" class="form-control" placeholder="Your Telephone Number" required>
                  </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email address"required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Your Password" onkeyup="lettersOnly(this)" required>
                  </div>
                  <input name="" id="sign-up" class="btn btn-block login-btn mb-4" type="submit" value="Sign Up">
                  <p id="sign-up" class="login-card-footer-text">Have an account ? <a href="#!" class="text-reset" onclick="return show('login','sign-up')">Login here</a></p>   
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
  </html>
