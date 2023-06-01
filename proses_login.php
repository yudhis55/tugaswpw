<?php
session_start();
// Konfigurasi koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$db   = 'proyek'; // Ganti dengan nama database Anda
$user = 'root'; // Ganti dengan nama pengguna database Anda
$pass = ''; // Ganti dengan kata sandi database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Fungsi untuk memasukkan akun baru ke dalam database
function daftarAkun($nama, $email, $password)
{
    global $conn;

    // Mengenkripsi kata sandi sebelum disimpan ke database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Menyiapkan pernyataan SQL untuk memasukkan data pengguna baru
    $stmt = $conn->prepare("INSERT INTO akun (Nama, Email, Password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $hashedPassword);

    // Menjalankan pernyataan SQL
    if ($stmt->execute()) {
        return true; // Akun berhasil didaftarkan
    } else {
        return false; // Gagal memasukkan akun ke dalam database
    }
}

// Fungsi untuk memeriksa kecocokan login pengguna
function cekLogin($email, $password)
{
    global $conn;

    // Mengambil informasi pengguna berdasarkan alamat email
    $stmt = $conn->prepare("SELECT Password FROM akun WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['Password'];

        // Memeriksa kecocokan kata sandi
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            return true; // Login berhasil
        } else {
            return false; // Kata sandi tidak cocok
        }
    } else {
        return false; // Pengguna tidak ditemukan
    }
}

// Fungsi untuk memeriksa apakah akun memiliki akses admin
function cekHakAksesAdmin($email)
{
    // Daftar alamat email yang memiliki akses admin
    $adminEmails = array("ridwan@hopens.com", "yudhis@hopens.com", "abid@hopens.com");

    if (in_array($email, $adminEmails)) {
        return true; // Akun memiliki akses admin
    } else {
        return false; // Akun tidak memiliki akses admin
    }
}

$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';



// Check apakah pengguna telah melakukan submit login form
if (isset($_POST['login'])) {
    if (!empty($email) && !empty($password)) {
        if (cekLogin($email, $password)) {
            if (cekHakAksesAdmin($email)) {
                header("Location: admin.php");
                exit;
            } else {
                header("Location: landing.php");
                exit;
            }
        } else {
            echo '<script>
                    alert("Email atau password salah!");
                    window.location.href = "login.php";
                  </script>';
            exit;
        }
    }
}

// Proses pendaftaran akun
if (isset($_POST['daftar'])) {
    if (!empty($nama) && !empty($email) && !empty($password)) {
        if (daftarAkun($nama, $email, $password)) {
            echo '<script>
                    alert("Akun Sudah dibuat silahkan login");
                    window.location.href = "login.php";
                  </script>';
            exit;
        } else {
            echo '<script>
                    alert("Gagal mendaftarkan akun. Silakan coba lagi");
                    window.location.href = "login.php";
                  </script>';
            exit;
        }
    }
}

$conn->close();
?>
