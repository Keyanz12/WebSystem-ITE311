<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
          crossorigin="anonymous">
  </head>
  <body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <!-- Brand/Logo -->
        <a class="navbar-brand" href="#">My Website</a>
        
        <!-- Mobile menu toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('about') ?>">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= base_url('contact') ?>">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('register') ?>">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container mt-5">
      <h1>Contact</h1>
      <p>Contact: 09134642165547514</p>
      <p>Nyeeyeeyeee</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js" 
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" 
            crossorigin="anonymous"></script>
  </body>
</html>
