<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <t  tle>Login Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      background-color: #f1f3f5;
    }
    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #0d6efd;
    }
    .input-group-text {
      background-color: #fff;
      border-left: none;
    }
    .input-group .form-control {
      border-right: none;
    }
    a {
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="col-md-5 col-lg-4">
    <div class="card p-4">
      <h3 class="text-center mb-3">Login</h3>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <form action="<?= base_url('login/authenticate') ?>" method="post">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <div class="input-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          </div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Masuk</button>
      </form>

      <div class="mt-3 text-center small">
        <a href="#">Lupa Password</a> &nbsp;|&nbsp; <a href="<?= base_url('register') ?>">Buat Akun</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>


