<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> HOPENS </title>
    <link rel="stylesheet" href="login.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="container">
      <input type="checkbox" id="flip">
      <div class="cover">
        <div class="front">
          <img src="login.png" alt="">
          <div class="text">
            <span class="text-1">Every New Place is a <br> New Adventure</span>
            <span class="text-2">Let's get going to HOPENS</span><br>
          </div>
        </div>
        <div class="back">
          <div class="backImg">
            <img  src="daftar.jpg" alt="">
          </div>
            <div class="text">
              <span class="text-1">Ayo Daftar Sekarang<br> Satu Langkah Lagi</span>
              <span class="text-2">Mari Kita Berpetualang</span>
            </div>
        </div>
      </div>
      <div class="forms">
          <div class="form-content">
            <div class="login-form">
              <div class="title">Login</div>
              
              <!--FORM UNTUK KE HOME SAAT CLICK LOGIN-->

            <form action="proses_login.php" method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="email" placeholder="xxxxxxxxx@hopens.com" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="password anda" required>
                </div>
                <div class="button input-box">
                  <input type="submit" name="login" value="login">
                </div>
                <div class="text sign-up-text">Tidak Punya Akun? <label for="flip">Daftar</label></div>
              </div>
          </form>
        </div>
          <div class="signup-form">
            <div class="title">Daftar</div>

              <!--FORM UNTUK SETELAH DAFTAR AKAN KEMBALI KE LOGIN-->

          <form action="proses_login.php" method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" name="nama" placeholder="Nama anda " required>
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="email" placeholder="xxxxxxxx@hopens.com" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="password anda" required>
                </div>
                <div class="button input-box">
                  <input type="submit" name="daftar" value="daftar">
                </div>
                <div class="text sign-up-text"><label for="flip">Kembali untuk Login</label></div>
              </div>
        </form>
      </div>
      </div>
      </div>
    </div>
  </body>
</html>



