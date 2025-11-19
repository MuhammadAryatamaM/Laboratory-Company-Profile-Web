<?php
$page_title = 'Login';
?>
<?php
session_start();
include "../config/koneksi.php"; 

if(isset($_SESSION['status']) && $_SESSION['status'] == "login"){
    header("location:index.php");
    exit();
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek Login Sederhana
    // Nanti ganti pakai database  
    if($username == 'admin' && $password == '123'){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:index.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title; ?> - CMS Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/admin_css.css">
  <style>
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      background: white;
      border-radius: 12px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
      padding: 50px;
      max-width: 420px;
      width: 100%;
    }

    .login-logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo-box {
      width: 70px;
      height: 70px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 28px;
      font-weight: bold;
      margin: 0 auto 20px;
    }

    .login-container h2 {
      text-align: center;
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .login-container p {
      text-align: center;
      color: #666;
      margin-bottom: 30px;
    }

    .form-control {
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      padding: 12px 15px;
      font-size: 14px;
      margin-bottom: 15px;
    }

    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .btn-login {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      padding: 12px;
      font-size: 16px;
      font-weight: 600;
      margin-top: 10px;
    }

    .btn-login:hover {
      background: linear-gradient(135deg, #5568d3 0%, #6a3f8f 100%);
      color: white;
    }

    .form-label {
      font-weight: 600;
      margin-bottom: 8px;
      color: #333;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="login-logo">
      <div class="logo-box">CMS</div>
      <h2>Admin Login</h2>
      <p>Enter your credentials to access the admin panel</p>
    </div>

    <form method="POST" action="">
      
      <?php if(isset($error)) { ?>
          <div class="alert alert-danger text-center mb-3" role="alert">
              <?php echo $error; ?>
          </div>
      <?php } ?>

      <div class="mb-3">
        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <button type="submit" name="login" class="btn btn-login btn-primary w-100">
        <i class="fas fa-sign-in-alt"></i> Login
      </button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
