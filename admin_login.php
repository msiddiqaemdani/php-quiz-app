<?php
// admin_login.php
session_start();
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin_dashboard.php");
    exit;
}
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    // Hard-coded credentials for demonstration
    if ($username === "admin" && $password === "admin123") {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $message = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background: #E0E5EC;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-container {
      width: 100%;
      max-width: 400px;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
    }
    .login-container h3 {
      text-align: center;
      margin-bottom: 20px;
      color: #4F5B93;
    }
    .btn-custom {
      min-width: 100px;
    }
  </style>
</head>
<body>
<div class="login-container">
  <h3>Admin Login</h3>
  <?php if($message != ""): ?>
    <div class="alert alert-danger"><?php echo $message; ?></div>
  <?php endif; ?>
  <form method="post" action="">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" value="admin" name="username" id="username" required autofocus>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" value="admin123" name="password" id="password" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-custom">Login</button>
  </form>
</div>
</body>
</html>
