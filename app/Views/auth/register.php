<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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
    
    .register-container {
      width: 100%;
      padding: 2rem 0;
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
    
    .form-control::placeholder {
      color: #9ca3af;
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
    
    .login-link {
      text-align: center;
      margin-top: 1.5rem;
      padding-top: 1.5rem;
      border-top: 1px solid #e5e7eb;
    }
    
    .login-link p {
      color: #6b7280;
      font-size: 0.95rem;
      margin: 0;
    }
    
    .login-link a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 700;
      transition: color 0.2s ease;
    }
    
    .login-link a:hover {
      color: var(--primary-dark);
      text-decoration: underline;
    }
    
    @media (max-width: 768px) {
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
  <div class="container register-container">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-md-7 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Create an account</h4>
          </div>
          <div class="card-body">
            <?php if(isset($validation)): ?>
              <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
              </div>
            <?php endif; ?>

            <form action="<?= base_url('register') ?>" method="post" novalidate>
              <div class="row g-2">
                <div class="mb-3">
                  <label for="firstname" class="form-label">Username</label>
                  <input id="firstname" name="firstname" type="text" class="form-control" placeholder="Username" required>
                </div>
                
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input id="email" name="email" type="email" class="form-control" placeholder="you@example.com" required>
                </div>

                <div class="row g-2">
                  <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="password_confirm" class="form-label">Confirm Password</label>
                    <input id="password_confirm" name="password_confirm" type="password" class="form-control" placeholder="Confirm password" required>
                  </div>
                </div>
                
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" id="terms" required>
                  <label class="form-check-label" for="terms">I agree to the terms and privacy</label>
                </div>

                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Register</button>
                </div>
              </div>
            </form>

            <div class="login-link">
              <p>
                Already have an account?
                <a href="<?= base_url('login') ?>">Login</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>