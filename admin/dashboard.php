<?php
// admin/dashboard.php - Admin Dashboard for SR College
require_once '../functions.php';
requireRole('admin');
include '../includes/header.php';
?>

<div class="container">
    
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1>🏛️ Admin Dashboard</h1>
        <p>Welcome to SR College Administration Portal</p>
    </div>

    <!-- Quick Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">1,245</div>
            <div class="stat-label">Total Students</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">87</div>
            <div class="stat-label">Faculty Members</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">156</div>
            <div class="stat-label">Pending Applications</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">23</div>
            <div class="stat-label">Active Courses</div>
        </div>
    </div>

    <!-- Main Management Card -->
    <div class="card mt-5">
        <h2 class="card-title">🛠️ Management Options</h2>
        <p style="color: #6b7280; margin-bottom: 25px;">Access and manage all aspects of SR College system</p>

        <div class="grid-3">
            <a class="card-link" href="manage_students.php">
                🎓<br>
                <strong>Manage Students</strong><br>
                <small style="color: #6b7280;">View, add, edit student records</small>
            </a>
            <a class="card-link" href="manage_faculty.php">
                👨‍🏫<br>
                <strong>Manage Faculty</strong><br>
                <small style="color: #6b7280;">Handle faculty information</small>
            </a>
            <a class="card-link" href="manage_news.php">
                📰<br>
                <strong>Manage News</strong><br>
                <small style="color: #6b7280;">Post announcements & updates</small>
            </a>
            <a class="card-link" href="manage_courses.php">
                📚<br>
                <strong>Manage Courses</strong><br>
                <small style="color: #6b7280;">Add/edit course offerings</small>
            </a>
            <a class="card-link" href="manage_departments.php">
                🏢<br>
                <strong>Manage Departments</strong><br>
                <small style="color: #6b7280;">Department administration</small>
            </a>
            <a class="card-link" href="manage_admissions.php">
                📄<br>
                <strong>Admissions</strong><br>
                <small style="color: #6b7280;">Review applications</small>
            </a>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card mt-4">
        <h3 class="card-title">📅 Recent Activity</h3>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Activity</th>
                    <th>User</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2024-05-20</td>
                    <td>New student enrollment</td>
                    <td>Admin User</td>
                    <td><span class="badge-success">Completed</span></td>
                </tr>
                <tr>
                    <td>2024-05-20</td>
                    <td>Faculty member updated</td>
                    <td>Admin User</td>
                    <td><span class="badge-success">Completed</span></td>
                </tr>
                <tr>
                    <td>2024-05-19</td>
                    <td>News article published</td>
                    <td>Admin User</td>
                    <td><span class="badge-success">Completed</span></td>
                </tr>
                <tr>
                    <td>2024-05-19</td>
                    <td>Admission application received</td>
                    <td>System</td>
                    <td><span class="badge-warning">Pending Review</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions mt-4">
        <h3>⚡ Quick Actions</h3>
        <div class="action-buttons">
            <a href="add_student.php" class="btn btn-primary">+ Add New Student</a>
            <a href="add_faculty.php" class="btn btn-primary">+ Add New Faculty</a>
            <a href="create_news.php" class="btn btn-primary">+ Create News Post</a>
            <a href="reports.php" class="btn btn-secondary">View Reports</a>
            <a href="settings.php" class="btn btn-secondary">System Settings</a>
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>