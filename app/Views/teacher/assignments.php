<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?= esc($title) ?></title>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
         rel="stylesheet" 
         integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
         crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

   <style>
      body {
         background-color: #f8f9fa;
         margin: 0;
         font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      }
      
      .sidebar {
         position: fixed;
         top: 0;
         left: 0;
         height: 100vh;
         width: 250px;
         background-color: #1e3a8a;
         padding-top: 20px;
         z-index: 1000;
      }
      
      .sidebar .nav-link {
         color: #ffffff;
         padding: 15px 20px;
         border-radius: 5px;
         margin: 5px 10px;
         transition: all 0.3s ease;
         text-decoration: none;
         display: flex;
         align-items: center;
      }
      
      .sidebar .nav-link:hover {
         background-color: #2563eb;
         color: #ffffff;
      }
      
      .sidebar .nav-link.active {
         background-color: #2563eb;
         color: #ffffff;
      }
      
      .sidebar .nav-link i {
         margin-right: 10px;
         font-size: 18px;
      }
      
      .main-content {
         margin-left: 250px;
         padding: 20px;
         min-height: 100vh;
      }
      
      .dashboard-header {
         display: flex;
         justify-content: space-between;
         align-items: center;
         margin-bottom: 30px;
         padding-bottom: 20px;
         border-bottom: 1px solid #dee2e6;
      }
      
      .welcome-text {
         font-size: 1.2rem;
         color: #495057;
         font-weight: 500;
      }
      
      .role-badge {
         background-color: #6c757d;
         color: white;
         padding: 5px 12px;
         border-radius: 20px;
         font-size: 0.9rem;
         font-weight: 500;
      }
   </style>
</head>
<body>
   <!-- Sidebar Navigation -->
   <div class="sidebar">
      <!-- Brand/Logo Section -->
      <div style="padding: 0 20px 20px 20px; border-bottom: 1px solid #ffffff; margin-bottom: 20px;">
         <h4 style="color: #ffffff; font-weight: bold; margin: 0;">
            <i class="bi bi-mortarboard-fill"></i> MyPortal
         </h4>
         <p style="color: #b8d4d9; font-size: 0.9rem; margin: 5px 0 0 0;">
            Learning Management System
         </p>
      </div>
      
      <div class="nav flex-column">
         <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
         </a>
         <a class="nav-link" href="<?= base_url('teacher/courses') ?>">
            <i class="bi bi-book"></i> My Courses
         </a>
         <a class="nav-link" href="<?= base_url('teacher/students') ?>">
            <i class="bi bi-people"></i> Students
         </a>
         <a class="nav-link" href="<?= base_url('teacher/gradebook') ?>">
            <i class="bi bi-clipboard-check"></i> Grade Book
         </a>
         <a class="nav-link active" href="<?= base_url('teacher/assignments') ?>">
            <i class="bi bi-file-earmark-text"></i> Assignments
         </a>
         
         <hr style="border-color: #ffffff; margin: 20px 0;">
         
         <a class="nav-link" href="<?= base_url('about') ?>">
            <i class="bi bi-info-circle"></i> About
         </a>
         <a class="nav-link" href="<?= base_url('contact') ?>">
            <i class="bi bi-envelope"></i> Contact
         </a>
         <a class="nav-link" href="<?= base_url('logout') ?>">
            <i class="bi bi-box-arrow-right"></i> Logout
         </a>
      </div>
   </div>

   <!-- Main Content -->
   <div class="main-content">
      <!-- Flash Messages -->
      <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('success') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
      <?php endif; ?>
      
      <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('error') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
      <?php endif; ?>

      <!-- Page Header -->
      <div class="dashboard-header">
         <h1>Assignments</h1>
         <div class="welcome-text">
            Welcome, <?= esc(session()->get('name')) ?> | 
            <span class="role-badge">Teacher</span>
         </div>
      </div>

      <!-- Assignments Content -->
      <div class="card">
         <div class="card-header bg-primary text-white">
            <h5><i class="bi bi-file-earmark-text"></i> Assignment Management</h5>
         </div>
         <div class="card-body">
            <p class="text-muted">Create and manage assignments for your courses.</p>
            
            <div class="row mt-4">
               <div class="col-md-12">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                     <h6>Assignment List</h6>
                     <button class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Create Assignment
                     </button>
                  </div>
                  
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Assignment Title</th>
                              <th>Course</th>
                              <th>Due Date</th>
                              <th>Submissions</th>
                              <th>Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td colspan="6" class="text-center text-muted">
                                 <i class="bi bi-inbox"></i> No assignments found. Assignment management functionality will be implemented here.
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
