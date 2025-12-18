<?= $this->include('template/header') ?>

<style>
    .content-area {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        min-height: 100vh;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2rem;
        position: relative;
        padding-left: 1rem;
    }

    .page-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 5px;
        height: 70%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-radius: 3px;
    }

    .search-card {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: none;
        margin-bottom: 2rem;
    }

    .search-card .input-group {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .search-card .form-control {
        border: 2px solid #e5e7eb;
        border-right: none;
        padding: 0.875rem 1.25rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .search-card .form-control:focus {
        border-color: #6366f1;
        box-shadow: none;
    }

    .search-card .btn-primary {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border: none;
        padding: 0.875rem 1.75rem;
        font-weight: 600;
        box-shadow: none;
    }

    .search-card .btn-primary:hover {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }

    .btn-success {
        background: linear-gradient(135deg, #10b981, #059669);
        border: none;
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    }

    .data-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: none;
        height: 100%;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background: #f8fafc;
        color: #475569;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        padding: 1rem;
    }

    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
        color: #334155;
        border-bottom: 1px solid #f1f5f9;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .table-hover tbody tr:hover {
        background: #f8fafc;
        transition: background 0.2s ease;
    }

    .badge {
        padding: 0.5rem 1rem;
        font-weight: 600;
        font-size: 0.75rem;
        border-radius: 50px;
        letter-spacing: 0.3px;
    }

    .badge.bg-success {
        background: linear-gradient(135deg, #10b981, #059669) !important;
    }

    .badge.bg-info {
        background: linear-gradient(135deg, #3b82f6, #2563eb) !important;
    }

    .badge.bg-danger {
        background: linear-gradient(135deg, #ef4444, #dc2626) !important;
    }

    .badge.bg-secondary {
        background: linear-gradient(135deg, #6b7280, #4b5563) !important;
    }

    .btn-warning {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        border: none;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(245, 158, 11, 0.3);
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
        color: white;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
    }

    .form-control,
    .form-select {
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #94a3b8;
    }

    .modal-content {
        border-radius: 20px;
        border: none;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .modal-header {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        border-radius: 20px 20px 0 0;
        border: none;
        padding: 1.5rem 2rem;
    }

    .modal-header .modal-title {
        font-weight: 700;
        font-size: 1.25rem;
    }

    .modal-header .btn-close {
        filter: brightness(0) invert(1);
    }

    .modal-body {
        padding: 2rem;
    }

    .modal-footer {
        border-top: 1px solid #e5e7eb;
        padding: 1.5rem 2rem;
    }

    .btn-secondary {
        background: #6b7280;
        border: none;
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
    }

    .btn-secondary:hover {
        background: #4b5563;
    }

    .you-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #6366f1;
        background: rgba(99, 102, 241, 0.1);
        padding: 0.5rem 1rem;
        border-radius: 8px;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 1.5rem;
        }

        .data-card {
            padding: 1.25rem;
        }

        .table thead th,
        .table tbody td {
            padding: 0.75rem 0.5rem;
            font-size: 0.875rem;
        }
    }
</style>

<body>

<div class="content-area">

<div class="container-fluid py-4">
    <h3 class="page-title">User Management</h3>
    
    <!-- Search Bar -->
    <div class="search-card">
        <form method="get" action="<?= base_url('users') ?>">
            <div class="input-group">
                <input type="text" name="search" value="<?= esc($search) ?>" class="form-control" placeholder="Search users by name or email...">
                <button class="btn btn-primary">🔍 Search</button>
            </div>
        </form>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
            ➕ Add User
        </button>
    </div>
    
    <div class="row g-4">

        <!-- USERS TABLE -->
        <div class="col-lg-8">
            <div class="data-card">
                <h5 class="card-title">All Users</h5>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($users): ?>
                            <?php foreach ($users as $u): ?>
                                <tr>
                                    <td><?= $u['id'] ?></td>
                                    <td><?= esc($u['name']) ?></td>
                                    <td><?= esc($u['email']) ?></td>
                                    <td>
                                        <span class="badge bg-info text-dark"><?= esc($u['role']) ?></span>
                                    </td>
                                    <td>
                                        <?php if ($u['status'] === 'granted'): ?>
                                            <span class="badge bg-success">Granted</span>

                                        <?php elseif ($u['status'] === 'restricted'): ?>
                                            <span class="badge bg-danger">Restricted</span>

                                        <?php else: ?>
                                            <span class="badge bg-secondary">Unknown</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(session()->get('user_id') === $u['id']):?>
                                            <span class="you-label">You</span>
                                        <?php else: ?>
                                            <a href="<?= base_url('users/edit/' . $u['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="empty-state">
                                    <div>
                                        <div style="font-size: 3rem; margin-bottom: 1rem;">👥</div>
                                        <div style="font-weight: 600; font-size: 1.125rem;">No users found</div>
                                        <div style="font-size: 0.875rem; margin-top: 0.5rem;">Try adjusting your search or add a new user</div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- EDIT FORM -->
        <div class="col-lg-4">
            <div class="data-card">

                <?php if ($editUser): ?>
                    <h5 class="card-title">Edit User</h5>

                    <form method="post" action="<?= base_url('users/update') ?>">
                        <input type="hidden" name="id" value="<?= $editUser['id'] ?>">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                value="<?= esc($editUser['name']) ?>" 
                                class="form-control"
                                pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+" 
                                title="Only letters and spaces are allowed" 
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-control">
                                <option value="admin" <?= $editUser['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="instructor" <?= $editUser['role'] == 'instructor' ? 'selected' : '' ?>>Instructor</option>
                                <option value="student" <?= $editUser['role'] == 'student' ? 'selected' : '' ?>>Student</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="granted" <?= $editUser['status'] == 'granted' ? 'selected' : '' ?>>Granted</option>
                                <option value="restricted" <?= $editUser['status'] == 'restricted' ? 'selected' : '' ?>>Restricted</option>
                            </select>
                        </div>

                        <button class="btn btn-success w-100">Update User</button>
                    </form>

                <?php else: ?>
                    <div class="empty-state">
                        <div style="font-size: 3rem; margin-bottom: 1rem;">✏️</div>
                        <div style="font-weight: 600; font-size: 1.125rem;">Select a user to edit</div>
                        <div style="font-size: 0.875rem; margin-top: 0.5rem;">Click the edit button on any user to modify their details</div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    </div>

</div>

</div> <!-- END content-area -->

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="<?= base_url('users/create') ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input 
                type="text" 
                name="name" 
                class="form-control" 
                pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+" 
                title="Only letters and spaces are allowed" 
                required
            >
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                class="form-control" 
                required
                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                title="Enter a valid email without special symbols (except . _ % + - @)"
            >

          </div>

          <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="instructor">Instructor</option>
                <option value="student">Student</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="granted">Granted</option>
                <option value="restricted">Restricted</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Add User</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>