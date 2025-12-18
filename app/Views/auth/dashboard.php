<?= $this->include('template/header') ?>

<style>
    .content-area {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        min-height: 100vh;
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 1.75rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: none;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #6366f1, #8b5cf6);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(99, 102, 241, 0.2);
    }

    .stat-label {
        font-size: 0.875rem;
        color: #64748b;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.75rem;
    }

    .stat-value {
        font-size: 2.25rem;
        font-weight: 700;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
        position: relative;
        padding-left: 1rem;
    }

    .section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 70%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-radius: 2px;
    }

    .activity-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: none;
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

    .table tbody tr {
        transition: background 0.2s ease;
    }

    .table-hover tbody tr:hover {
        background: #f8fafc;
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

    .badge.bg-warning {
        background: linear-gradient(135deg, #f59e0b, #d97706) !important;
    }

    .badge.bg-secondary {
        background: linear-gradient(135deg, #6b7280, #4b5563) !important;
    }

    .btn-primary {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1.25rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(99, 102, 241, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
    }

    .btn-sm {
        padding: 0.375rem 1rem;
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .stat-value {
            font-size: 1.75rem;
        }

        .activity-card {
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

<?php if (session()->get('user_role') === 'admin'): ?>

    <div class="container-fluid py-4">

        <!-- Statistic Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="stat-label">Total Students</div>
                    <div class="stat-value"><?= esc($students ?? 250) ?></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="stat-label">Total Courses</div>
                    <div class="stat-value"><?= esc($courses ?? 18) ?></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="stat-label">Instructors</div>
                    <div class="stat-value"><?= esc($instructors ?? 12) ?></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="stat-label">Pending Approvals</div>
                    <div class="stat-value"><?= esc($pending ?? 5) ?></div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <h5 class="section-title">Recent Activities</h5>
        <div class="activity-card">
            <table class="table table-borderless align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Activity</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>New course added: <strong>Python Basics</strong></td>
                        <td>Instructor A</td>
                        <td>Nov 13, 2025</td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Student registered: <strong>John Doe</strong></td>
                        <td>System</td>
                        <td>Nov 12, 2025</td>
                        <td><span class="badge bg-info">New</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Assignment submitted: <strong>UI/UX Project</strong></td>
                        <td>Jane Smith</td>
                        <td>Nov 12, 2025</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

<?php endif; ?>

<?php if (session()->get('user_role') === 'instructor'): ?>
    <div class="container-fluid py-4">

    <!-- Statistic Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="stat-card text-center">
                <div class="stat-label">My Courses</div>
                <div class="stat-value"><?= esc($myCourses ?? 6) ?></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card text-center">
                <div class="stat-label">Active Students</div>
                <div class="stat-value"><?= esc($activeStudents ?? 140) ?></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card text-center">
                <div class="stat-label">Assignments to Grade</div>
                <div class="stat-value"><?= esc($pendingGrades ?? 24) ?></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card text-center">
                <div class="stat-label">Announcements Posted</div>
                <div class="stat-value"><?= esc($announcements ?? 3) ?></div>
            </div>
        </div>
    </div>

    <!-- Recent Submissions -->
    <h5 class="section-title">Recent Student Submissions</h5>
    <div class="activity-card mb-5">
        <table class="table table-borderless align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student</th>
                    <th>Assignment</th>
                    <th>Course</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Ana Cruz</td>
                    <td>Project 1</td>
                    <td>Web Development</td>
                    <td>Nov 14, 2025</td>
                    <td><span class="badge bg-warning text-dark">To Grade</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Marco Reyes</td>
                    <td>Quiz 2</td>
                    <td>Python Basics</td>
                    <td>Nov 14, 2025</td>
                    <td><span class="badge bg-warning text-dark">To Grade</span></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Sarah Gomez</td>
                    <td>Module 3 Task</td>
                    <td>UX Design</td>
                    <td>Nov 13, 2025</td>
                    <td><span class="badge bg-success">Graded</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- My Courses -->
    <h5 class="section-title">My Courses</h5>
    <div class="activity-card">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Students</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Python Basics</td>
                    <td>48</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Web Development</td>
                    <td>56</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>UI/UX Design</td>
                    <td>36</td>
                    <td><span class="badge bg-secondary">Paused</span></td>
                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    </div>

<?php endif; ?>

<?php if (session()->get('user_role') === 'student'): ?>
    <div class="container-fluid py-4">

    <!-- Statistic Cards -->
    <div class="row g-4 mb-5">
        
        <div class="col-md-3">
            <div class="stat-card text-center">
                <div class="stat-label">Enrolled Courses</div>
                <div class="stat-value"><?= esc($enrolledCourses ?? 5) ?></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card text-center">
                <div class="stat-label">Completed Lessons</div>
                <div class="stat-value"><?= esc($completedLessons ?? 32) ?></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card text-center">
                <div class="stat-label">Pending Assignments</div>
                <div class="stat-value"><?= esc($pendingAssignments ?? 4) ?></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card text-center">
                <div class="stat-label">My Average Grade</div>
                <div class="stat-value"><?= esc($averageGrade ?? "88%") ?></div>
            </div>
        </div>

    </div>

    <!-- Recent Activity -->
    <h5 class="section-title">Recent Activity</h5>
    <div class="activity-card mb-5">
        <table class="table table-borderless align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Activity</th>
                    <th>Course</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Completed Lesson 5</td>
                    <td>Python Basics</td>
                    <td>Nov 14, 2025</td>
                    <td><span class="badge bg-success">Completed</span></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Submitted Assignment 2</td>
                    <td>Web Development</td>
                    <td>Nov 14, 2025</td>
                    <td><span class="badge bg-info">Submitted</span></td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>New Announcement</td>
                    <td>UX Design</td>
                    <td>Nov 13, 2025</td>
                    <td><span class="badge bg-secondary">Unread</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- My Courses -->
    <h5 class="section-title">My Courses</h5>
    <div class="activity-card">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Progress</th>
                    <th>Status</th>
                    <th>Open</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Python Basics</td>
                    <td>78%</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td><a href="#" class="btn btn-sm btn-primary">Enter</a></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Web Development</td>
                    <td>45%</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td><a href="#" class="btn btn-sm btn-primary">Enter</a></td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>UI/UX Design</td>
                    <td>20%</td>
                    <td><span class="badge bg-warning text-dark">Ongoing</span></td>
                    <td><a href="#" class="btn btn-sm btn-primary">Enter</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    </div>

<?php endif; ?>

</div>

</body>
</html>