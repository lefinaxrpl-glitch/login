
<?php
require_once "koneksi.php";

$nama = "Administrator";
$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT);

$sql = "INSERT INTO users (nama, username, password)
        VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $nama, $username, $password);

if (mysqli_stmt_execute($stmt)) {
    echo "Akun berhasil dibuat!";
} else {
    echo "Gagal membuat akun: " . mysqli_error($conn);
}
?>
