<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Dashboard</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
         rel="stylesheet" 
         integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
         crossorigin="anonymous">

   <style>
      body {
         background: linear-gradient(to right, white 30%, black 70%);
         margin: 0;
         font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      }
      .page-title {
         font-size: 2.5rem;
         font-weight: 300;
         margin-bottom: 1.5rem;
         color: #508bc5ff;
      }
      .content-text {
         color: #666;
         line-height: 1.6;
      }
   </style>
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
    
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url('dashboard') ?>">Dashboard</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="page-title">Welcome, <?= session()->get('name') ?>!</h2>
        <p class="content-text">
            You are logged in as <b><?= session()->get('role') ?></b>.
        </p>
        <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
