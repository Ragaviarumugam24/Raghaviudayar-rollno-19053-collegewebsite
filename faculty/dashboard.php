<?php
// faculty/dashboard.php - Faculty Dashboard for SR College
require_once '../functions.php';
requireRole('faculty');
include '../includes/header.php';
?>

<div class="container">
    
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1>👨‍🏫 Faculty Dashboard</h1>
        <p>Welcome to SR College Faculty Portal</p>
    </div>

    <!-- Quick Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">5</div>
            <div class="stat-label">My Courses</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">187</div>
            <div class="stat-label">Total Students</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">12</div>
            <div class="stat-label">Pending Submissions</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">95%</div>
            <div class="stat-label">Attendance Rate</div>
        </div>
    </div>

    <!-- Main Navigation Card -->
    <div class="card mt-5">
        <h2 class="card-title">📚 Faculty Tools</h2>
        <p style="color: #6b7280; margin-bottom: 25px;">Access your teaching and administrative tools</p>

        <div class="grid-3">
            <a class="card-link" href="attendance_submit.php">
                ✅<br>
                <strong>Submit Attendance</strong><br>
                <small style="color: #6b7280;">Mark student attendance</small>
            </a>
            <a class="card-link" href="my_courses.php">
                📚<br>
                <strong>My Courses</strong><br>
                <small style="color: #6b7280;">View assigned courses</small>
            </a>
            <a class="card-link" href="grade_submissions.php">
                📝<br>
                <strong>Grade Assignments</strong><br>
                <small style="color: #6b7280;">Review & grade work</small>
            </a>
            <a class="card-link" href="my_students.php">
                🎓<br>
                <strong>My Students</strong><br>
                <small style="color: #6b7280;">View student list</small>
            </a>
            <a class="card-link" href="upload_materials.php">
                📄<br>
                <strong>Upload Materials</strong><br>
                <small style="color: #6b7280;">Share course content</small>
            </a>
            <a class="card-link" href="schedule.php">
                📅<br>
                <strong>My Schedule</strong><br>
                <small style="color: #6b7280;">View timetable</small>
            </a>
        </div>
    </div>

    <!-- Today's Schedule -->
    <div class="card mt-4">
        <h3 class="card-title">🕒 Today's Schedule</h3>
        <table>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Room</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>9:00 AM - 10:00 AM</td>
                    <td>Computer Science 101</td>
                    <td>Section A</td>
                    <td>Lab 204</td>
                    <td><a href="attendance_submit.php?class=cs101" class="btn btn-small btn-primary">Mark Attendance</a></td>
                </tr>
                <tr>
                    <td>10:30 AM - 11:30 AM</td>
                    <td>Data Structures</td>
                    <td>Section B</td>
                    <td>Room 305</td>
                    <td><a href="attendance_submit.php?class=ds202" class="btn btn-small btn-primary">Mark Attendance</a></td>
                </tr>
                <tr>
                    <td>1:00 PM - 2:00 PM</td>
                    <td>Database Management</td>
                    <td>Section A</td>
                    <td>Lab 201</td>
                    <td><a href="attendance_submit.php?class=db301" class="btn btn-small btn-primary">Mark Attendance</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Recent Announcements -->
    <div class="card mt-4">
        <h3 class="card-title">📢 Recent Announcements</h3>
        <div class="grid-2">
            <div class="dashboard-card">
                <h4>Faculty Meeting - May 25</h4>
                <p>Monthly faculty meeting scheduled for May 25th at 3:00 PM in Conference Hall.</p>
                <span class="badge-info">Important</span>
            </div>
            <div class="dashboard-card">
                <h4>Mid-Term Exam Schedule Released</h4>
                <p>The mid-term examination schedule has been published. Please check your courses.</p>
                <span class="badge-warning">Action Required</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions mt-4">
        <h3>⚡ Quick Actions</h3>
        <div class="action-buttons">
            <a href="attendance_submit.php" class="btn btn-primary">Submit Attendance</a>
            <a href="upload_materials.php" class="btn btn-primary">Upload Materials</a>
            <a href="grade_submissions.php" class="btn btn-secondary">Grade Assignments</a>
            <a href="profile.php" class="btn btn-secondary">My Profile</a>
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>