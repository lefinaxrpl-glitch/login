
<?php
session_start();
require_once "koneksi.php";

$pesan = "";

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);

        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['username'] = $user['username'];

        header("Location: index.php");
        exit;
    } else {
        $pesan = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Data Siswa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f6f5ef;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #34483b;
        }

        .login-card {
            background: white;
            width: 100%;
            max-width: 420px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 35px #0000000d;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: #34483b;
            color: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #849087;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #e1e5df;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #718875;
            box-shadow: 0 0 0 3px #71887520;
        }

        .password-box {
            position: relative;
        }

        .password-box input {
            padding-right: 65px;
        }

        .lihat {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            color: #718875;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: #718875;
            color: white;
            border: none;
            border-radius: 9px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
        }

        .btn-login:hover {
            background: #526e59;
        }

        .pesan {
            background: #fce8e6;
            color: #b84e43;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .footer {
            text-align: center;
            color: #9a9f98;
            font-size: 12px;
            margin-top: 25px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo">S.</div>

    <h1>Selamat Datang!</h1>
    <p class="subtitle">Silakan login untuk mengakses Aplikasi Data Siswa.</p>

    <?php if ($pesan != "") { ?>
        <div class="pesan">
            <?= htmlspecialchars($pesan); ?>
        </div>
    <?php } ?>

    <form method="POST">

        <div class="form-group">
            <label>Username</label>
            <input
                type="text"
                name="username"
                placeholder="Masukkan username"
                required
                autofocus
            >
        </div>

        <div class="form-group">
            <label>Password</label>

            <div class="password-box">
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Masukkan password"
                    required
                >

                <button
                    type="button"
                    class="lihat"
                    id="togglePassword"
                    onclick="togglePassword()"
                >
                    Lihat
                </button>
            </div>
        </div>

        <button type="submit" name="login" class="btn-login">
            Login
        </button>

    </form>

    <div class="footer">
        © 2026 Aplikasi Data Siswa
    </div>

</div>

<script>
function togglePassword() {
    const password = document.getElementById("password");
    const tombol = document.getElementById("togglePassword");

    if (password.type === "password") {
        password.type = "text";
        tombol.textContent = "Sembunyi";
    } else {
        password.type = "password";
        tombol.textContent = "Lihat";
    }
}
</script>

</body>
</html>
