<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillPro Institute - Vocational Training Excellence</title>
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
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <i class="fas fa-graduation-cap"></i>
                <span>SkillPro Institute</span>
            </div>
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="admin-dashboard.php" class="nav-link">Dashboard</a></li>
                <li><a href="#courses" class="nav-link">Courses</a></li>
                <li><a href="#instructors" class="nav-link">Instructors</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
                <li><a href="#calendar" class="nav-link">Calendar</a></li>
                <li><a href="#" class="nav-link" onclick="showLoginModal()">Login</a></li>
                <li><a href="#" class="nav-link" onclick="showRegisterModal()">Register</a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
  <div class="overlay">
    <div class="hero-content">
      <h1>Empowering Skills for Tomorrow's Workforce</h1>
      <p>
        Join SkillPro Institute and gain industry-relevant skills through our comprehensive vocational training
        programs
      </p>
      <div class="hero-buttons">
        <button class="btn btn-primary" onclick="scrollToSection('courses')">Explore Courses</button>
        <button class="btn btn-secondary" onclick="showRegisterModal()">Register Now</button>
      </div>
    </div>

    <div class="hero-stats">
      <div class="stat">
        <h3>5000+</h3>
        <p>Students Trained</p>
      </div>
      <div class="stat">
        <h3>50+</h3>
        <p>Courses Available</p>
      </div>
      <div class="stat">
        <h3>95%</h3>
        <p>Job Placement Rate</p>
      </div>
    </div>
  </div>
</section>


    <!-- Courses Section -->
    <section id="courses" class="courses-section">
        <div class="container">
            <h2 class="section-title">Our Training Programs</h2>
            <div class="search-filters">
                <input type="text" id="courseSearch" placeholder="Search courses..." onkeyup="filterCourses()">
                <select id="categoryFilter" onchange="filterCourses()">
                    <option value="">All Categories</option>
                    <option value="ICT">Information Technology</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Tourism">Tourism & Hospitality</option>
                    <option value="Trade">Trade Skills</option>
                </select>
                <select id="locationFilter" onchange="filterCourses()">
                    <option value="">All Locations</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Matara">Matara</option>
                </select>
            </div>
            <div class="courses-grid" id="coursesGrid">
                <!-- Courses will be dynamically loaded here -->
            </div>
        </div>
    </section>

    <!-- Instructors Section -->
    <section id="instructors" class="instructors-section">
        <div class="container">
            <h2 class="section-title">Meet Our Expert Instructors</h2>
            <div class="instructors-grid">

                <!-- Instructor 1 -->
                <div class="instructor-card">
                    <div class="avatar">
                        <img src="images/joh_silva.jpg" alt="Mr. John Silva">
                    </div>
                    <h3 class="name">Mr. John Silva</h3>
                    <p class="title">Senior Web Developer</p>
                    <p class="specialties">React, Node.js, Full-stack Development</p>
                    <p class="experience">Experience: 8+ years</p>
                </div>

                <!-- Instructor 2 -->
                <div class="instructor-card">
                    <div class="avatar">
                        <img src="images/priya_fernando.jpg" alt="Ms. Priya Fernando">
                    </div>
                    <h3 class="name">Ms. Priya Fernando</h3>
                    <p class="title">Mobile App Specialist</p>
                    <p class="specialties">React Native, Flutter, iOS Development</p>
                    <p class="experience">Experience: 6+ years</p>
                </div>

                <!-- Instructor 3 -->
                <div class="instructor-card">
                    <div class="avatar">
                        <img src="images/ravi_perera.jpg" alt="Mr. Ravi Perera">
                    </div>
                    <h3 class="name">Mr. Ravi Perera</h3>
                    <p class="title">Master Plumber</p>
                    <p class="specialties">Commercial Plumbing, Pipe Systems</p>
                    <p class="experience">Experience: 15+ years</p>
                </div>

                <!-- Instructor 4 -->
                <div class="instructor-card">
                    <div class="avatar">
                        <img src="images/kamal_rajapaksha.jpeg" alt="Mr. Kamal Rajapaksa">
                    </div>
                    <h3 class="name">Mr. Kamal Rajapaksa</h3>
                    <p class="title">Welding Instructor</p>
                    <p class="specialties">MIG, TIG, Arc Welding</p>
                    <p class="experience">Experience: 12+ years</p>
                </div>

                <!-- Instructor 5 -->
                <div class="instructor-card">
                    <div class="avatar">
                        <img src="images/anjali.webp" alt="Ms. Anjali Wickramasinghe">
                    </div>
                    <h3 class="name">Ms. Anjali Wickramasinghe</h3>
                    <p class="title">Hospitality Manager</p>
                    <p class="specialties">Hotel Operations, Customer Service</p>
                    <p class="experience">Experience: 10+ years</p>
                </div>

                <!-- Instructor 6 -->
                <div class="instructor-card">
                    <div class="avatar">
                        <img src="images/david kumar.jpeg" alt="Mr. David Kumar">
                    </div>
                    <h3 class="name">Mr. David Kumar</h3>
                    <p class="title">Digital Marketing Expert</p>
                    <p class="specialties">SEO, Social Media, Analytics</p>
                    <p class="experience">Experience: 7+ years</p>
                </div>

                <!-- Instructor 7 -->
                <div class="instructor-card">
                    <div class="avatar">
                        <img src="images/saduni_madhushani.jpeg" alt="Ms. Sanduni Madushani">
                    </div>
                    <h3 class="name">Ms. Sanduni Madushani</h3>
                    <p class="title">Graphic Design Instructor</p>
                    <p class="specialties">Photoshop, Illustrator, UI/UX Design</p>
                    <p class="experience">Experience: 9+ years</p>
                </div>

                <!-- Instructor 8 -->
                <div class="instructor-card">
                    <div class="avatar">
                        <img src="images/tharindu.jpeg" alt="Mr. Tharindu Hettiarachchi">
                    </div>
                    <h3 class="name">Mr. Tharindu Hettiarachchi</h3>
                    <p class="title">Cybersecurity Specialist</p>
                    <p class="specialties">Network Security, Ethical Hacking, Cloud Security</p>
                    <p class="experience">Experience: 11+ years</p>
                </div>

            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2>About SkillPro Institute</h2>
                    <p>SkillPro Institute is a leading vocational training institution registered under the Tertiary and
                        Vocational Education Commission (TVEC) of Sri Lanka. We are committed to providing high-quality,
                        industry-relevant training programs that prepare students for successful careers.</p>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-certificate"></i>
                            <h3>TVEC Certified</h3>
                            <p>All our programs are officially recognized and certified</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-users"></i>
                            <h3>Expert Instructors</h3>
                            <p>Learn from industry professionals with years of experience</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-laptop"></i>
                            <h3>Modern Facilities</h3>
                            <p>State-of-the-art equipment and learning resources</p>
                        </div>
                    </div>
                </div>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                        alt="Students learning" loading="lazy" decoding="async" fetchpriority="low">
                </div>
            </div>
        </div>
    </section>

    <!-- Event Calendar Section -->
    <section id="calendar" class="calendar-section">
        <div class="container">
            <h2 class="section-title">Event Calendar</h2>
            <div class="calendar-container">
                <div class="calendar-header">
                    <button onclick="previousMonth()"><i class="fas fa-chevron-left"></i></button>
                    <h3 id="currentMonth"></h3>
                    <button onclick="nextMonth()"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="calendar-grid" id="calendarGrid">
                    <!-- Calendar will be dynamically generated -->
                </div>
            </div>
            <div class="upcoming-events">
                <h3>Upcoming Events</h3>
                <div class="events-list" id="eventsList">
                    <!-- Events will be dynamically loaded -->
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2 class="section-title">Get In Touch</h2>
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h3>Our Branches</h3>
                            <p>Colombo: 123 Main Street, Colombo 01</p>
                            <p>Kandy: 456 Hill Street, Kandy</p>
                            <p>Matara: 789 Beach Road, Matara</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h3>Phone</h3>
                            <p>+94 11 234 5678</p>
                            <p>+94 77 123 4567</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3>Email</h3>
                            <p>info@skillpro.lk</p>
                            <p>admissions@skillpro.lk</p>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <h3>Send us an Inquiry</h3>
                    <form id="inquiryForm" method="POST" action="inquiry_process.php">
                        <div class="form-group">
                            <input type="text" id="inquiryName" name="inquiryName" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" id="inquiryEmail" name="inquiryEmail" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <select id="inquirySubject" name="inquirySubject" required>
                                <option value="">Select Subject</option>
                                <option value="course-info">Course Information</option>
                                <option value="admission">Admission Process</option>
                                <option value="certification">Certification</option>
                                <option value="job-opportunities">Job Opportunities</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea id="inquiryMessage" name="inquiryMessage" placeholder="Your Message" rows="5"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Inquiry</button>
                    </form>
                </div>

    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>SkillPro Institute</h3>
                    <p>Empowering skills for tomorrow's workforce through quality vocational education and training.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#courses">Courses</a></li>
                        <li><a href="#instructors">Instructors</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Programs</h3>
                    <ul>
                        <li><a href="#">ICT Courses</a></li>
                        <li><a href="#">Engineering</a></li>
                        <li><a href="#">Tourism & Hospitality</a></li>
                        <li><a href="#">Trade Skills</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <p><i class="fas fa-phone"></i> +94 11 234 5678</p>
                    <p><i class="fas fa-envelope"></i> info@skillpro.lk</p>
                    <p><i class="fas fa-map-marker-alt"></i> Colombo, Kandy, Matara</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 SkillPro Institute. All rights reserved. | TVEC Registered Institution</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('loginModal')">&times;</span>
            <h2>Login to Your Account</h2>
            <!-- send data to login_process.php -->
            <form id="loginForm" method="POST" action="login_process.php">
                <div class="form-group">
                    <label for="loginEmail">Email</label>
                    <input type="email" id="loginEmail" name="loginEmail" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" name="loginPassword" required>
                </div>
                <div class="form-group">
                    <label for="userRole">Role</label>
                    <select id="userRole" name="userRole" required>
                        <option value="">Select Role</option>
                        <option value="student">Student</option>
                        <option value="instructor">Instructor</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>


    <!--Registration Modal-->
<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('registerModal')">&times;</span>
        <h2>Create Your Account</h2>
        <form id="registerForm" method="POST" action="register_process.php">
            <div class="form-group">
                <label for="regName">Full Name</label>
                <input type="text" id="regName" name="regName" required>
            </div>
            <div class="form-group">
                <label for="regEmail">Email</label>
                <input type="email" id="regEmail" name="regEmail" required>
            </div>
            <div class="form-group">
                <label for="regPhone">Phone Number</label>
                <input type="tel" id="regPhone" name="regPhone" required>
            </div>
            <div class="form-group">
                <label for="regPassword">Password</label>
                <input type="password" id="regPassword" name="regPassword" required>
            </div>
            <div class="form-group">
                <label for="regConfirmPassword">Confirm Password</label>
                <input type="password" id="regConfirmPassword" name="regConfirmPassword" required>
            </div>
            <div class="form-group">
                <label for="regRole">Role</label>
                <select id="regRole" name="regRole" required>
                    <option value="">Select Role</option>
                    <option value="student">Student</option>
                    <option value="instructor">Instructor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>


    <script src="script.js" defer></script>
</body>

</html>