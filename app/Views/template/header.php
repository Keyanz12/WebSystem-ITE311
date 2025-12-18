<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS <?= esc(session()->get('user_role')) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-gradient-start: #6366f1;
            --primary-gradient-end: #8b5cf6;
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
            --text-muted: #94a3b8;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
        }

        /* FIXED LEFT SIDEBAR */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--sidebar-bg);
            padding: 0;
            color: #fff;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar-header {
            background: linear-gradient(135deg, var(--primary-gradient-start), var(--primary-gradient-end));
            padding: 2rem 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h4 {
            margin: 0;
            font-weight: 700;
            font-size: 1.25rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-nav {
            padding: 1.5rem 0;
        }

        .sidebar a {
            color: var(--text-muted);
            padding: 0.875rem 1.5rem;
            display: flex;
            align-items: center;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            position: relative;
        }

        .sidebar a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: linear-gradient(135deg, var(--primary-gradient-start), var(--primary-gradient-end));
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .sidebar a:hover {
            background: var(--sidebar-hover);
            color: #fff;
            padding-left: 2rem;
        }

        .sidebar a:hover::before {
            transform: scaleY(1);
        }

        .sidebar a.active {
            background: rgba(99, 102, 241, 0.15);
            color: #fff;
            border-left-color: var(--primary-gradient-start);
        }

        .sidebar-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 1rem 1.5rem;
        }

        .logout-link {
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1rem !important;
        }

        .logout-link a {
            color: #f87171;
        }

        .logout-link a:hover {
            background: rgba(248, 113, 113, 0.1);
            color: #fca5a5;
        }

        /* MAIN CONTENT PUSHED RIGHT */
        .content-area {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            min-height: 100vh;
        }

        /* MOBILE TOGGLE BUTTON */
        .mobile-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: linear-gradient(135deg, var(--primary-gradient-start), var(--primary-gradient-end));
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
            cursor: pointer;
            font-weight: 600;
        }

        /* MOBILE */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .content-area {
                margin-left: 0;
                padding-top: 5rem;
            }

            .mobile-toggle {
                display: block;
            }

            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .sidebar-overlay.show {
                display: block;
            }
        }
    </style>
</head>

<body>

<!-- Mobile Toggle Button -->
<button class="mobile-toggle" onclick="toggleSidebar()">☰ Menu</button>

<!-- Overlay for mobile -->
<div class="sidebar-overlay" onclick="toggleSidebar()"></div>

<?php if (session()->get('user_role') === 'admin'): ?>

<!-- FIXED LEFT SIDEBAR -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h4>Admin Panel</h4>
    </div>
    
    <nav class="sidebar-nav">
        <a href="<?= base_url('dashboard') ?>">📊 Dashboard</a>
        <a href="<?= base_url('users') ?>">👥 User Management</a>
        <a href="#">🎓 Students</a>
        <a href="#">📚 Courses</a>
        <a href="#">👨‍🏫 Instructors</a>
        <a href="#">✅ Approvals</a>
        
        <div class="sidebar-divider"></div>
        
        <div class="logout-link">
            <a href="<?= base_url('logout') ?>">🚪 Logout</a>
        </div>
    </nav>
</div>

<?php endif; ?>

<!--For Instructor-->
<?php if (session()->get('user_role') === 'instructor'): ?>

<!-- FIXED LEFT SIDEBAR -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h4>Instructor</h4>
    </div>
    
    <nav class="sidebar-nav">
        <a href="<?= base_url('#') ?>">📊 Dashboard</a>
        <a href="<?= base_url('#') ?>">📚 My Courses</a>
        <a href="<?= base_url('#') ?>">📝 Assignments</a>
        <a href="<?= base_url('#') ?>">📤 Student Submissions</a>
        <a href="<?= base_url('#') ?>">📊 Gradebook</a>
        <a href="<?= base_url('#') ?>">📢 Announcements</a>
        <a href="<?= base_url('#') ?>">💬 Messages</a>
        
        <div class="sidebar-divider"></div>
        
        <div class="logout-link">
            <a href="<?= base_url('logout') ?>">🚪 Logout</a>
        </div>
    </nav>
</div>

<?php endif; ?>

<?php if (session()->get('user_role') === 'student'): ?>
  <!-- FIXED LEFT SIDEBAR -->
  <div class="sidebar" id="sidebar">
      <div class="sidebar-header">
          <h4>Student Portal</h4>
      </div>
      
      <nav class="sidebar-nav">
          <a href="<?= base_url('student/dashboard') ?>">📊 Dashboard</a>
          <a href="<?= base_url('student/my-courses') ?>">📚 My Courses</a>
          <a href="<?= base_url('student/assignments') ?>">📝 Assignments</a>
          <a href="<?= base_url('student/progress') ?>">📈 My Progress</a>
          <a href="<?= base_url('student/announcements') ?>">📢 Announcements</a>
          <a href="<?= base_url('student/messages') ?>">💬 Messages</a>
          <a href="<?= base_url('student/profile') ?>">👤 Profile</a>
          
          <div class="sidebar-divider"></div>
          
          <div class="logout-link">
              <a href="<?= base_url('logout') ?>">🚪 Logout</a>
          </div>
      </nav>
  </div>
<?php endif; ?>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.querySelector('.sidebar-overlay');
        
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
    }

    // Close sidebar when clicking on a link (mobile)
    if (window.innerWidth <= 768) {
        document.querySelectorAll('.sidebar a').forEach(link => {
            link.addEventListener('click', () => {
                toggleSidebar();
            });
        });
    }
</script>

</body>
</html>