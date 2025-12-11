<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
         rel="stylesheet" 
         integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
         crossorigin="anonymous">

   <style>
      body {
         background: linear-gradient(to right, blue, pink);
         margin: 0;
         font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      }
      .card {
         width: 450px;
      }
      .content-text {
         color: #7e7b7bff;
         line-height: 1.6;
      }
   </style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <!-- Brand/Logo -->
      <a class="navbar-brand" href="#">REGISTER</a>
      
      <!-- Mobile menu toggle button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
              data-bs-target="#navbarNav" aria-controls="navbarNav" 
              aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navigation Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url('register') ?>">Register</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Flash Messages -->
  <div class="container mt-3">
    <?php $errors = session('errors') ?? []; ?>
    <?php if (session('success')): ?>
      <div class="alert alert-success"><?= esc(session('success')) ?></div>
    <?php endif; ?>

    <?php if (! empty($errors)): ?>
      <div class="alert alert-danger">
          <ul class="mb-0">
          <?php foreach ($errors as $error): ?>
              <li><?= esc($error) ?></li>
          <?php endforeach ?>
          </ul>
      </div>
    <?php endif; ?>
  </div>

  <!-- Register Form -->
  <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Sign Up</h3>
        <?= form_open('/register') ?> <!-- auto-adds CSRF -->
          <div class="mb-3">
             <label for="name">Username:</label>
             <input name="name" type="text" value="<?= old('name') ?>" required class="form-control" id="name">
          </div>
          <div class="mb-3">
             <label for="email">Email:</label>
             <input name="email" type="email" value="<?= old('email') ?>" required class="form-control" id="email">
          </div>
          <div class="mb-3">
             <label for="password">Password:</label>
             <input name="password" type="password" value="<?= old('password') ?>" required class="form-control" id="password">
          </div>
          <div class="mb-3">
             <label for="password_confirm">Confirm Password:</label>
             <input name="pass_confirm" type="password" value="<?= old('pass_confirm') ?>" required class="form-control" id="password_confirm">
          </div>
          <button type="submit" class="btn btn-success w-100">Register</button>
        <?= form_close() ?>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
