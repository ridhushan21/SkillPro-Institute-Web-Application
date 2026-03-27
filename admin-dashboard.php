<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SkillPro Institute</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Admin Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <i class="fas fa-graduation-cap"></i>
                <span>SkillPro Admin</span>
            </div>
            <ul class="nav-menu">
                <li><a href="index.php" class="nav-link">Public Site</a></li>
                <li><a href="#dashboard" class="nav-link">Dashboard</a></li>
                <li><a href="#courses" class="nav-link">Courses</a></li>
                <li><a href="#students" class="nav-link">Students</a></li>
                <li><a href="#instructors" class="nav-link">Instructors</a></li>
                <li><a href="#inquiries" class="nav-link">Inquiries</a></li>
                <li><a href="#" class="nav-link" onclick="logout()">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="admin-container">
        <section id="dashboard" class="dashboard-section">
            <div class="container">
                <h1 class="page-title">Admin Dashboard</h1>
                
                <!-- Statistics Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-content">
                            <h3>Total Students</h3>
                            <p class="stat-number">1,247</p>
                            <span class="stat-change positive">+12% this month</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stat-content">
                            <h3>Active Courses</h3>
                            <p class="stat-number">24</p>
                            <span class="stat-change positive">+3 new courses</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="stat-content">
                            <h3>Instructors</h3>
                            <p class="stat-number">18</p>
                            <span class="stat-change neutral">No change</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="stat-content">
                            <h3>Pending Inquiries</h3>
                            <p class="stat-number">7</p>
                            <span class="stat-change negative">+2 new today</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="dashboard-grid">
                    <div class="dashboard-card">
                        <h3>Recent Enrollments</h3>
                        <div class="activity-list" id="recentEnrollments">
                            <!-- Recent enrollments will be loaded here -->
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <h3>Upcoming Events</h3>
                        <div class="activity-list" id="upcomingEvents">
                            <!-- Upcoming events will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Courses Management -->
        <section id="courses" class="admin-section">
            <div class="container">
                <div class="section-header">
                    <h2>Course Management</h2>
                    <button class="btn btn-primary" onclick="showAddCourseModal()">
                        <i class="fas fa-plus"></i> Add New Course
                    </button>
                </div>
                
                <div class="courses-table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Category</th>
                                <th>Instructor</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Enrolled</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="coursesTableBody">
                            <!-- Courses will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Students Management -->
        <section id="students" class="admin-section">
            <div class="container">
                <div class="section-header">
                    <h2>Student Management</h2>
                    <div class="search-controls">
                        <input type="text" id="studentSearch" placeholder="Search students..." onkeyup="filterStudents()">
                        <select id="courseFilter" onchange="filterStudents()">
                            <option value="">All Courses</option>
                            <option value="1">Web Development</option>
                            <option value="2">Mobile App Development</option>
                            <option value="3">Plumbing & Pipe Fitting</option>
                        </select>
                    </div>
                </div>
                
                <div class="students-table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>Enrollment Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="studentsTableBody">
                            <!-- Students will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Instructors Management -->
        <section id="instructors" class="admin-section">
            <div class="container">
                <div class="section-header">
                    <h2>Instructor Management</h2>
                    <button class="btn btn-primary" onclick="showAddInstructorModal()">
                        <i class="fas fa-plus"></i> Add New Instructor
                    </button>
                </div>
                
                <div class="instructors-grid" id="adminInstructorsGrid">
                    <!-- Instructors will be loaded here -->
                </div>
            </div>
        </section>

        <!-- Inquiries Management -->
        <section id="inquiries" class="admin-section">
            <div class="container">
                <div class="section-header">
                    <h2>Inquiry Management</h2>
                    <div class="inquiry-filters">
                        <select id="inquiryStatusFilter" onchange="filterInquiries()">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="replied">Replied</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                </div>
                
                <div class="inquiries-list" id="inquiriesList">
                    <!-- Inquiries will be loaded here -->
                </div>
            </div>
        </section>
    </div>

    <!-- Add Course Modal -->
    <div id="addCourseModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addCourseModal')">&times;</span>
            <h2>Add New Course</h2>
            <form id="addCourseForm">
                <div class="form-group">
                    <label for="courseTitle">Course Title</label>
                    <input type="text" id="courseTitle" required>
                </div>
                <div class="form-group">
                    <label for="courseCategory">Category</label>
                    <select id="courseCategory" required>
                        <option value="">Select Category</option>
                        <option value="ICT">Information Technology</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Tourism">Tourism & Hospitality</option>
                        <option value="Trade">Trade Skills</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="courseDescription">Description</label>
                    <textarea id="courseDescription" rows="4" required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="courseDuration">Duration</label>
                        <input type="text" id="courseDuration" placeholder="e.g., 6 months" required>
                    </div>
                    <div class="form-group">
                        <label for="coursePrice">Price (Rs.)</label>
                        <input type="number" id="coursePrice" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="courseLocation">Location</label>
                        <select id="courseLocation" required>
                            <option value="">Select Location</option>
                            <option value="Colombo">Colombo</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Matara">Matara</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="courseMode">Mode</label>
                        <select id="courseMode" required>
                            <option value="">Select Mode</option>
                            <option value="Online">Online</option>
                            <option value="On-site">On-site</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="courseInstructor">Instructor</label>
                    <select id="courseInstructor" required>
                        <option value="">Select Instructor</option>
                        <!-- Instructors will be loaded dynamically -->
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="courseStartDate">Start Date</label>
                        <input type="date" id="courseStartDate" required>
                    </div>
                    <div class="form-group">
                        <label for="courseMaxStudents">Max Students</label>
                        <input type="number" id="courseMaxStudents" required>
                    </div>
                </div>
                <div class="modal-actions">
                    <button type="submit" class="btn btn-primary">Add Course</button>
                    <button type="button" class="btn btn-secondary" onclick="closeModal('addCourseModal')">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script src="admin-script.js" defer></script>
</body>
</html>

