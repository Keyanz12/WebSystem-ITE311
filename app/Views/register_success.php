<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Registered</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
        crossorigin="anonymous">
  
  <style>
     body {
        display: grid;
        height: 100vh;
        place-items: center;
        margin: 0;
     }
     .card {
        text-align: center;
     }
     a {
        text-decoration: none;
     }
  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 position-absolute top-0">
    <div class="container">
      <a class="navbar-brand" href="#">My Website</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
              data-bs-target="#navbarNav" aria-controls="navbarNav" 
              aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="<?= base_url('index') ?>">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('about') ?>">About</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('contact') ?>">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('register') ?>">Register</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('dashboard') ?>">Dashboard</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Success Card -->
  <div class="card shadow-lg" style="width: 22rem;">
    <div class="card-body">
      <h5 class="card-title">✅ Success!</h5>
      <h6 class="card-subtitle mb-2 text-body-secondary">Registered Successfully</h6>
      <p class="card-text">Your account was created. You can now log in.</p>
      <a href="<?= base_url('register') ?>">
        <button type="button" class="btn btn-outline-danger">Back</button>
      </a>
      <a href="<?= base_url('login') ?>">
        <button type="button" class="btn btn-success">Login</button>
      </a>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
