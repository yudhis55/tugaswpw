<html>
<head>
  <link rel="stylesheet" href="form.css">
  <link rel="icon" href="login.png" type="image/gif" sizes="16x16">
  <!-- Fontawesome CDN Link For Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo">
</head>
<body>
  <form action="proses_formulir.php" method="post">
    <h2>FORMULIR PEMESANAN</h2>
    <div class="form-group fullname">
      <label for="fullname">Nama Lengkap</label>
      <input type="text" name="fullname" id="fullname" placeholder="Masukkan Nama Lengkap Anda">
    </div>
    <div class="form-group email">
      <label for="phone">Nomor Telepon</label>
      <input type="text" name="phone" id="phone" placeholder="Masukkan Alamat Email Anda">
    </div>
    <div class="form-group password">
      <label for="roomtype">Pilihan Ruangan</label>
      <select id="roomtype" name="roomtype">
        <option value="Standart">Standart Room</option>
        <option value="Deluxe">Deluxe Room</option>
        <option value="Premiere">Premiere Room</option>
        <option value="Family">Family Room</option>
        <option value="Luxury">Luxury Room</option>
        <option value="President">President Room</option>
      </select>
    </div>
    <div class="group-date">
      <div class="form-group date">
        <label for="checkindate">Checkin Date</label>
        <input type="date" name="checkindate" id="checkindate" placeholder="Select your date">
      </div>
      <h2>-</h2>
      <div class="form-group date">
        <label for="checkoutdate">Checkout Date</label>
        <input type="date" name="checkoutdate" id="checkoutdate" placeholder="Select your date">
      </div>
    </div>
    <div class="form-group gender">
      <label for="gender">Gender</label>
      <select id="gender" name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    <div class="form-group submit-btn">
      <input name="submit" type="submit" value="SUBMIT">
      <input type="hidden" name="bookingdate" value="<?php echo date('Y-m-d'); ?>">
    </div>
  </form>
</body>
</html>
