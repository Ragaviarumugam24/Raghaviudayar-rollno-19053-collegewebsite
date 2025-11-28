<?php
// student/dashboard.php - Student Dashboard for SR College
require_once '../functions.php';
requireRole('student');
include '../includes/header.php';
?>

<div class="container">
    
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1>🎓 Student Dashboard</h1>
        <p>Welcome to SR College Student Portal</p>
    </div>

    <!-- Quick Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">6</div>
            <div class="stat-label">Enrolled Courses</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">92%</div>
            <div class="stat-label">Overall Attendance</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">8.5</div>
            <div class="stat-label">Current GPA</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">3</div>
            <div class="stat-label">Pending Assignments</div>
        </div>
    </div>

    <!-- Main Navigation Card -->
    <div class="card mt-5">
        <h2 class="card-title">📚 Student Services</h2>
        <p style="color: #6b7280; margin-bottom: 25px;">Access your academic information and services</p>

        <div class="grid-3">
            <a class="card-link" href="profile.php">
                👤<br>
                <strong>My Profile</strong><br>
                <small style="color: #6b7280;">View & edit profile</small>
            </a>
            <a class="card-link" href="my_courses.php">
                📚<br>
                <strong>My Courses</strong><br>
                <small style="color: #6b7280;">View enrolled courses</small>
            </a>
            <a class="card-link" href="attendance.php">
                📅<br>
                <strong>Attendance</strong><br>
                <small style="color: #6b7280;">Check attendance record</small>
            </a>
            <a class="card-link" href="grades.php">
                🏆<br>
                <strong>Grades</strong><br>
                <small style="color: #6b7280;">View your grades</small>
            </a>
            <a class="card-link" href="assignments.php">
                📝<br>
                <strong>Assignments</strong><br>
                <small style="color: #6b7280;">View & submit work</small>
            </a>
            <a class="card-link" href="schedule.php">
                🕒<br>
                <strong>Class Schedule</strong><br>
                <small style="color: #6b7280;">View timetable</small>
            </a>
        </div>
    </div>

    <!-- Today's Classes -->
    <div class="card mt-4">
        <h3 class="card-title">📚 Today's Classes</h3>
        <table>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Course</th>
                    <th>Instructor</th>
                    <th>Room</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>9:00 AM - 10:00 AM</td>
                    <td>Computer Science 101</td>
                    <td>Dr. Rajesh Kumar</td>
                    <td>Lab 204</td>
                    <td><span class="badge-success">Attended</span></td>
                </tr>
                <tr>
                    <td>10:30 AM - 11:30 AM</td>
                    <td>Mathematics II</td>
                    <td>Prof. Priya Singh</td>
                    <td>Room 305</td>
                    <td><span class="badge-warning">Upcoming</span></td>
                </tr>
                <tr>
                    <td>1:00 PM - 2:00 PM</td>
                    <td>Database Management</td>
                    <td>Dr. Amit Sharma</td>
                    <td>Lab 201</td>
                    <td><span class="badge-warning">Upcoming</span></td>
                </tr>
                <tr>
                    <td>3:00 PM - 4:00 PM</td>
                    <td>Web Development</td>
                    <td>Prof. Meena Patel</td>
                    <td>Lab 203</td>
                    <td><span class="badge-warning">Upcoming</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pending Assignments -->
    <div class="card mt-4">
        <h3 class="card-title">📝 Pending Assignments</h3>
        <div class="grid-2">
            <div class="dashboard-card">
                <h4>Computer Science 101</h4>
                <p><strong>Assignment:</strong> Data Structures Implementation</p>
                <p><strong>Due Date:</strong> May 25, 2024</p>
                <span class="badge-danger">Due Soon</span>
                <a href="submit_assignment.php?id=1" class="btn btn-primary btn-small mt-2">Submit Now</a>
            </div>
            <div class="dashboard-card">
                <h4>Database Management</h4>
                <p><strong>Assignment:</strong> SQL Query Exercise</p>
                <p><strong>Due Date:</strong> May 28, 2024</p>
                <span class="badge-warning">Pending</span>
                <a href="submit_assignment.php?id=2" class="btn btn-primary btn-small mt-2">Submit Now</a>
            </div>
            <div class="dashboard-card">
                <h4>Web Development</h4>
                <p><strong>Assignment:</strong> Responsive Website Project</p>
                <p><strong>Due Date:</strong> June 2, 2024</p>
                <span class="badge-info">In Progress</span>
                <a href="submit_assignment.php?id=3" class="btn btn-primary btn-small mt-2">Continue</a>
            </div>
        </div>
    </div>

    <!-- Recent Announcements -->
    <div class="card mt-4">
        <h3 class="card-title">📢 Recent Announcements</h3>
        <div class="grid-2">
            <div class="dashboard-card">
                <h4>Mid-Term Exinations - Schedule Released</h4>
                <p>The mid-term examination schedule has been published. Please check the academic calendar.</p>
                <span class="badge-info">Important</span>
            </div>
            <div class="dashboard-card">
                <h4>Library Hours Extended</h4>
                <p>Library will now remain open until 10:00 PM during exam week.</p>
                <span class="badge-success">Announcement</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions mt-4">
        <h3>⚡ Quick Actions</h3>
        <div class="action-buttons">
            <a href="assignments.php" class="btn btn-primary">View Assignments</a>
            <a href="grades.php" class="btn btn-primary">Check Grades</a>
            <a href="attendance.php" class="btn btn-secondary">View Attendance</a>
            <a href="library.php" class="btn btn-secondary">Library Resources</a>
            <a href="profile.php" class="btn btn-secondary">My Profile</a>
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>