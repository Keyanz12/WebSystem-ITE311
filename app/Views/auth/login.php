<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <style>
    :root {
      --primary-color: #6366f1;
      --primary-dark: #4f46e5;
      --gradient-start: #6366f1;
      --gradient-end: #8b5cf6;
    }
    
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .login-container {
      width: 100%;
      max-width: 440px;
      margin: 2rem auto;
      padding: 0 1rem;
    }
    
    .card {
      border: none;
      border-radius: 20px;
      overflow: hidden;
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }
    
    .card-header {
      background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
      padding: 2.5rem 2rem 2rem;
      text-align: center;
      border: none;
    }
    
    .card-header h4 {
      color: white;
      font-weight: 700;
      font-size: 1.75rem;
      margin: 0;
      letter-spacing: 0.5px;
    }
    
    .card-body {
      padding: 2.5rem 2rem;
    }
    
    .form-label {
      font-weight: 600;
      color: #374151;
      font-size: 0.875rem;
      margin-bottom: 0.5rem;
    }
    
    .form-control {
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      padding: 0.75rem 1rem;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }
    
    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }
    
    .form-check-input {
      width: 1.25rem;
      height: 1.25rem;
      border: 2px solid #d1d5db;
      border-radius: 0.375rem;
      cursor: pointer;
    }
    
    .form-check-input:checked {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }
    
    .form-check-label {
      cursor: pointer;
      color: #6b7280;
      font-size: 0.9rem;
      margin-left: 0.5rem;
    }
    
    .btn-primary {
      background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
      border: none;
      border-radius: 10px;
      padding: 0.875rem;
      font-weight: 600;
      font-size: 1rem;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
    }
    
    .btn-primary:active {
      transform: translateY(0);
    }
    
    .alert {
      border: none;
      border-radius: 10px;
      padding: 1rem;
      font-size: 0.9rem;
      margin-bottom: 1.5rem;
    }
    
    .alert-danger {
      background-color: #fef2f2;
      color: #991b1b;
      border-left: 4px solid #dc2626;
    }
    
    .register-link {
      text-align: center;
      margin-top: 1.5rem;
      padding-top: 1.5rem;
      border-top: 1px solid #e5e7eb;
    }
    
    .register-link p {
      color: #6b7280;
      font-size: 0.95rem;
      margin: 0;
    }
    
    .register-link a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 700;
      transition: color 0.2s ease;
    }
    
    .register-link a:hover {
      color: var(--primary-dark);
      text-decoration: underline;
    }
    
    @media (max-width: 576px) {
      .card-header {
        padding: 2rem 1.5rem 1.5rem;
      }
      
      .card-header h4 {
        font-size: 1.5rem;
      }
      
      .card-body {
        padding: 2rem 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="card">
      <div class="card-header">
        <h4>Welcome Back</h4>
      </div>
      <div class="card-body">
        <?php if(!empty(session()->getFlashdata('error'))): ?>
          <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('error_log'))): ?>
          <div class="alert alert-danger"><?= esc(session()->getFlashdata('error_log')) ?></div>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('validation_errors'))): ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('validation_errors') ?>
          </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post" novalidate>
          <?= csrf_field() ?>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <div class="mb-4 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>

          <div class="register-link">
            <p>
              Don't have an account?
              <a href="<?= base_url('register') ?>">Register</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>