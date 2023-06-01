<?php
// Memeriksa apakah formulir dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Memeriksa apakah semua field formulir diisi
  $errors = array();

  if (empty($_POST['fullname'])) {
    $errors[] = "Full Name field is required.";
  }
  if (empty($_POST['phone'])) {
    $errors[] = "phone field is required.";
  }
  if (empty($_POST['roomtype'])) {
    $errors[] = "Room Type field is required.";
  }
  if (empty($_POST['checkindate'])) {
    $errors[] = "Checkin Date field is required.";
  }
  if (empty($_POST['checkoutdate'])) {
    $errors[] = "Checkout Date field is required.";
  }
  if (empty($_POST['gender'])) {
    $errors[] = "Gender field is required.";
  }

  if (empty($errors)) {
    // Jika semua field diisi, lanjutkan dengan pemrosesan formulir
    $full_name = $_POST['fullname'];
    $phone = $_POST['phone'];
    $room_type = $_POST['roomtype'];
    $checkin_date = $_POST['checkindate'];
    $checkout_date = $_POST['checkoutdate'];
    $gender = $_POST['gender'];
    $booking_date = $_POST['bookingdate'];

    // Melakukan koneksi ke basis data
    $mysqli = new mysqli("localhost", "root", "", "proyek");

    // Menyiapkan pernyataan SQL untuk memasukkan data ke dalam tabel
    $query = "INSERT INTO bookings VALUES ('$full_name', '$phone', '$room_type', '$checkin_date', '$checkout_date', '$gender', '$booking_date')";
    
    // Menjalankan pernyataan SQL
    $result = $mysqli->query($query);

    // Menutup koneksi ke basis data
    $mysqli->close();

    // Redirect ke halaman terima kasih atau halaman lain yang Anda inginkan
    header("Location: landing.php");
    exit;
  } else {
    // Jika ada field yang kosong, tampilkan pesan error dan tetap di halaman formulir
    echo '<script>
            alert("' . implode('\n', $errors) . '");
            window.location.href = "formulir.php";
          </script>';
  }
}
?>
