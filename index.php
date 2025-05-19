<?php
session_start();

// Jika sudah login, redirect ke dashboard
if (isset($_SESSION['user'])) {
  header("Location: dashboard.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">

        <?php if (isset($_GET['error'])): ?>
          <div class="alert alert-danger rounded-3 shadow-sm">
            <?php
              if ($_GET['error'] == 'username') {
                echo "Username tidak ditemukan.";
              } elseif ($_GET['error'] == 'password') {
                echo "Password salah.";
              } else {
                echo "Login gagal.";
              }
            ?>
          </div>
        <?php endif; ?>

        <div class="card shadow-sm rounded-4">
          <div class="card-body">
            <h3 class="text-center mb-4">Login</h3>
            <form method="POST" action="login.php">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Optional: Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
