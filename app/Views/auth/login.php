<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
         rel="stylesheet" 
         integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
         crossorigin="anonymous">

   <style>
      body {
         background: linear-gradient(to right, pink, blue);
         margin: 0;
         font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      }
      .card {
         width: 400px;
      }
      .content-text {
         color: #bd7070ff;
         line-height: 1.6;
      }
   </style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <!-- Brand/Logo -->
      <a class="navbar-brand" href="#">LOGIN PAGE</a>
      
      <!-- Mobile menu toggle button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
              data-bs-target="#navbarNav" aria-controls="navbarNav" 
              aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navigation Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="<?= base_url('register') ?>">Register</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url('login') ?>">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Login Form -->
  <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Login</h3>

        <!-- Error Flashdata -->
        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="<?= base_url('login/auth') ?>" method="post">
            <?= csrf_field() ?>
          <div class="mb-3">
             <label for="email">Email:</label>
             <input type="email" name="email" class="form-control" id="email" required>
          </div>
          <div class="mb-3">
             <label for="password">Password:</label>
             <input type="password" name="password" class="form-control" id="password" required>
          </div>
          <button  type="submit" class="btn btn-primary w-100">Login</button>
        </form>
     </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
