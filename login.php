<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Cek ke database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "ACCESS DENIED: INVALID CREDENTIALS";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | DigitalBoost Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0a0a0c; color: white; font-family: 'Poppins', sans-serif; display: flex; align-items: center; height: 100vh; }
        .login-card { background: #151518; border: 1px solid rgba(255,255,255,0.05); border-radius: 20px; padding: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.4); width: 100%; max-width: 400px; margin: auto; }
        .accent { color: #8a2be2; font-family: 'Space Grotesk', sans-serif; }
        input { background: #0a0a0c !important; border: 1px solid #2d2d35 !important; color: white !important; border-radius: 10px !important; padding: 12px !important; }
        button { background: #8a2be2; border: none; border-radius: 10px; padding: 12px; font-weight: bold; width: 100%; transition: 0.3s; color: white; }
        button:hover { background: #6a1bbd; transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="text-center fw-bold mb-4">ADMIN <span class="accent">LOGIN</span></h3>
        <?php if(isset($error)): ?>
            <div class="alert alert-danger small text-center" style="background: rgba(255,0,0,0.1); border: none; color: #ff4d4d;"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-4">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" name="login">AUTHORIZE ACCESS</button>
        </form>
    </div>
</body>
</html>