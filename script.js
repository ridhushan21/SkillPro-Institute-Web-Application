// SkillPro Institute - Dynamic Web Application
// JavaScript functionality for all interactive features

// Global variables
let currentUser = null;
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

// Sample data - In a real application, this would come from a database
const coursesData = [
    {
        id: 1,
        title: "Web Development Fundamentals",
        category: "ICT",
        description: "Learn modern web development with HTML, CSS, JavaScript, and React. Perfect for beginners looking to start a career in web development.",
        duration: "6 months",
        location: "Colombo",
        price: "Rs. 45,000",
        instructor: "Mr. John Silva",
        mode: "Online",
        startDate: "2024-02-15",
        maxStudents: 25,
        enrolled: 18
    },
    {
        id: 2,
        title: "Mobile App Development",
        category: "ICT",
        description: "Master mobile app development using React Native and Flutter. Build cross-platform applications for iOS and Android.",
        duration: "8 months",
        location: "Kandy",
        price: "Rs. 55,000",
        instructor: "Ms. Priya Fernando",
        mode: "On-site",
        startDate: "2024-03-01",
        maxStudents: 20,
        enrolled: 15
    },
    {
        id: 3,
        title: "Plumbing & Pipe Fitting",
        category: "Trade",
        description: "Comprehensive plumbing training covering installation, maintenance, and repair of plumbing systems.",
        duration: "4 months",
        location: "Matara",
        price: "Rs. 25,000",
        instructor: "Mr. Ravi Perera",
        mode: "On-site",
        startDate: "2024-02-20",
        maxStudents: 15,
        enrolled: 12
    },
    {
        id: 4,
        title: "Welding Technology",
        category: "Trade",
        description: "Professional welding training including MIG, TIG, and arc welding techniques for various materials.",
        duration: "5 months",
        location: "Colombo",
        price: "Rs. 35,000",
        instructor: "Mr. Kamal Rajapaksa",
        mode: "On-site",
        startDate: "2024-03-10",
        maxStudents: 12,
        enrolled: 8
    },
    {
        id: 5,
        title: "Hotel Management",
        category: "Tourism",
        description: "Complete hotel management training covering front office, housekeeping, food service, and customer relations.",
        duration: "10 months",
        location: "Kandy",
        price: "Rs. 40,000",
        instructor: "Ms. Anjali Wickramasinghe",
        mode: "On-site",
        startDate: "2024-02-25",
        maxStudents: 30,
        enrolled: 22
    },
    {
        id: 6,
        title: "Digital Marketing",
        category: "ICT",
        description: "Learn digital marketing strategies including SEO, social media marketing, content marketing, and analytics.",
        duration: "3 months",
        location: "Online",
        price: "Rs. 30,000",
        instructor: "Mr. David Kumar",
        mode: "Online",
        startDate: "2024-03-05",
        maxStudents: 40,
        enrolled: 35
    }
];

const instructorsData = [
    {
        id: 1,
        name: "Mr. John Silva",
        title: "Senior Web Developer",
        specialties: "React, Node.js, Full-stack Development",
        experience: "8+ years",
        avatar: "JS"
        
    },
    {
        id: 2,
        name: "Ms. Priya Fernando",
        title: "Mobile App Specialist",
        specialties: "React Native, Flutter, iOS Development",
        experience: "6+ years",
        avatar: "PF"
    },
    {
        id: 3,
        name: "Mr. Ravi Perera",
        title: "Master Plumber",
        specialties: "Commercial Plumbing, Pipe Systems",
        experience: "15+ years",
        avatar: "RP"
    },
    {
        id: 4,
        name: "Mr. Kamal Rajapaksa",
        title: "Welding Instructor",
        specialties: "MIG, TIG, Arc Welding",
        experience: "12+ years",
        avatar: "KR"
    },
    {
        id: 5,
        name: "Ms. Anjali Wickramasinghe",
        title: "Hospitality Manager",
        specialties: "Hotel Operations, Customer Service",
        experience: "10+ years",
        avatar: "AW"
    },
    {
        id: 6,
        name: "Mr. David Kumar",
        title: "Digital Marketing Expert",
        specialties: "SEO, Social Media, Analytics",
        experience: "7+ years",
        avatar: "DK"
    }
];

const eventsData = [
    {
        id: 1,
        title: "New Batch Registration Opens",
        date: "2024-02-01",
        type: "Registration",
        description: "Registration opens for March 2024 batches"
    },
    {
        id: 2,
        title: "Web Development Course Starts",
        date: "2024-02-15",
        type: "Course",
        description: "Web Development Fundamentals batch begins"
    },
    {
        id: 3,
        title: "Career Fair 2024",
        date: "2024-02-20",
        type: "Event",
        description: "Annual career fair with top employers"
    },
    {
        id: 4,
        title: "Mid-term Examinations",
        date: "2024-02-25",
        type: "Exam",
        description: "Mid-term exams for all ongoing courses"
    },
    {
        id: 5,
        title: "Hotel Management Workshop",
        date: "2024-03-01",
        type: "Workshop",
        description: "Special workshop on customer service excellence"
    }
];

// Initialize the application
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

function initializeApp() {
    // Load courses
    loadCourses();
    
    // Load instructors
    loadInstructors();
    
    // Load calendar
    loadCalendar();
    
    // Load events
    loadEvents();
    
    // Setup event listeners
    setupEventListeners();
    
    // Setup form handlers
    setupFormHandlers();
}

// Navigation functionality
function scrollToSection(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
    }
}

// Mobile menu toggle
function toggleMobileMenu() {
    const navMenu = document.querySelector('.nav-menu');
    const hamburger = document.querySelector('.hamburger');
    
    navMenu.classList.toggle('active');
    hamburger.classList.toggle('active');
}

// Setup event listeners
function setupEventListeners() {
    // Mobile menu
    const hamburger = document.querySelector('.hamburger');
    if (hamburger) {
        hamburger.addEventListener('click', toggleMobileMenu);
    }
    
    // Close mobile menu when clicking on links
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            const navMenu = document.querySelector('.nav-menu');
            const hamburger = document.querySelector('.hamburger');
            navMenu.classList.remove('active');
            hamburger.classList.remove('active');
        });
    });
    
    // Smooth scrolling for navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                scrollToSection(href.substring(1));
            }
        });
    });
}

// Course management
function loadCourses() {
    const coursesGrid = document.getElementById('coursesGrid');
    if (!coursesGrid) return;
    
    coursesGrid.innerHTML = '';
    
    coursesData.forEach(course => {
        const courseCard = createCourseCard(course);
        coursesGrid.appendChild(courseCard);
    });
}

function createCourseCard(course) {
    const card = document.createElement('div');
    card.className = 'course-card';
    card.innerHTML = `
        <div class="course-category">${course.category}</div>
        <h3 class="course-title">${course.title}</h3>
        <p class="course-description">${course.description}</p>
        <div class="course-details">
            <div class="course-duration">
                <i class="fas fa-clock"></i>
                ${course.duration}
            </div>
            <div class="course-location">
                <i class="fas fa-map-marker-alt"></i>
                ${course.location}
            </div>
        </div>
        <div class="course-price">${course.price}</div>
        <div class="course-actions">
            <button class="btn-enroll" onclick="enrollInCourse(${course.id})">
                Enroll Now
            </button>
            <button class="btn-info" onclick="showCourseDetails(${course.id})">
                More Info
            </button>
        </div>
    `;
    return card;
}

function filterCourses() {
    const searchTerm = document.getElementById('courseSearch').value.toLowerCase();
    const categoryFilter = document.getElementById('categoryFilter').value;
    const locationFilter = document.getElementById('locationFilter').value;
    
    const filteredCourses = coursesData.filter(course => {
        const matchesSearch = course.title.toLowerCase().includes(searchTerm) ||
                            course.description.toLowerCase().includes(searchTerm) ||
                            course.instructor.toLowerCase().includes(searchTerm);
        const matchesCategory = !categoryFilter || course.category === categoryFilter;
        const matchesLocation = !locationFilter || course.location === locationFilter;
        
        return matchesSearch && matchesCategory && matchesLocation;
    });
    
    const coursesGrid = document.getElementById('coursesGrid');
    coursesGrid.innerHTML = '';
    
    if (filteredCourses.length === 0) {
        coursesGrid.innerHTML = '<div class="no-results">No courses found matching your criteria.</div>';
        return;
    }
    
    filteredCourses.forEach(course => {
        const courseCard = createCourseCard(course);
        coursesGrid.appendChild(courseCard);
    });
}

function enrollInCourse(courseId) {
    if (!currentUser) {
        showMessage('Please login to enroll in courses.', 'error');
        showLoginModal();
        return;
    }
    
    const course = coursesData.find(c => c.id === courseId);
    if (!course) return;
    
    if (course.enrolled >= course.maxStudents) {
        showMessage('This course is full. Please try another course.', 'error');
        return;
    }
    
    // Simulate enrollment process
    showMessage(`Successfully enrolled in ${course.title}!`, 'success');
    course.enrolled++;
    
    // Update course display
    loadCourses();
}

function showCourseDetails(courseId) {
    const course = coursesData.find(c => c.id === courseId);
    if (!course) return;
    
    const modal = createModal(`
        <h2>${course.title}</h2>
        <div class="course-details-modal">
            <p><strong>Category:</strong> ${course.category}</p>
            <p><strong>Duration:</strong> ${course.duration}</p>
            <p><strong>Location:</strong> ${course.location}</p>
            <p><strong>Mode:</strong> ${course.mode}</p>
            <p><strong>Instructor:</strong> ${course.instructor}</p>
            <p><strong>Start Date:</strong> ${course.startDate}</p>
            <p><strong>Price:</strong> ${course.price}</p>
            <p><strong>Available Spots:</strong> ${course.maxStudents - course.enrolled}</p>
            <p><strong>Description:</strong></p>
            <p>${course.description}</p>
        </div>
        <div class="modal-actions">
            <button class="btn btn-primary" onclick="enrollInCourse(${course.id}); closeModal('courseDetailsModal')">
                Enroll Now
            </button>
            <button class="btn btn-secondary" onclick="closeModal('courseDetailsModal')">
                Close
            </button>
        </div>
    `, 'courseDetailsModal');
    
    document.body.appendChild(modal);
}

// Instructor management
function loadInstructors() {
    const instructorsGrid = document.getElementById('instructorsGrid');
    if (!instructorsGrid) return;
    
    instructorsGrid.innerHTML = '';
    
    instructorsData.forEach(instructor => {
        const instructorCard = createInstructorCard(instructor);
        instructorsGrid.appendChild(instructorCard);
    });
}

function createInstructorCard(instructor) {
    const card = document.createElement('div');
    card.className = 'instructor-card';
    card.innerHTML = `
        <div class="instructor-avatar">${instructor.avatar}</div>
        <h3 class="instructor-name">${instructor.name}</h3>
        <p class="instructor-title">${instructor.title}</p>
        <p class="instructor-specialties">${instructor.specialties}</p>
        <div class="instructor-experience">${instructor.experience}</div>
    `;
    return card;
}

// Calendar functionality
function loadCalendar() {
    const currentMonthElement = document.getElementById('currentMonth');
    const calendarGrid = document.getElementById('calendarGrid');
    
    if (!currentMonthElement || !calendarGrid) return;
    
    const monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];
    
    currentMonthElement.textContent = `${monthNames[currentMonth]} ${currentYear}`;
    
    // Generate calendar
    const firstDay = new Date(currentYear, currentMonth, 1);
    const lastDay = new Date(currentYear, currentMonth + 1, 0);
    const daysInMonth = lastDay.getDate();
    const startingDayOfWeek = firstDay.getDay();
    
    calendarGrid.innerHTML = '';
    
    // Add day headers
    const dayHeaders = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    dayHeaders.forEach(day => {
        const dayHeader = document.createElement('div');
        dayHeader.className = 'calendar-day-header';
        dayHeader.textContent = day;
        calendarGrid.appendChild(dayHeader);
    });
    
    // Add empty cells for days before the first day of the month
    for (let i = 0; i < startingDayOfWeek; i++) {
        const emptyDay = document.createElement('div');
        emptyDay.className = 'calendar-day other-month';
        calendarGrid.appendChild(emptyDay);
    }
    
    // Add days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dayElement = document.createElement('div');
        dayElement.className = 'calendar-day';
        dayElement.textContent = day;
        
        const currentDate = new Date(currentYear, currentMonth, day);
        const today = new Date();
        
        if (currentDate.toDateString() === today.toDateString()) {
            dayElement.classList.add('today');
        }
        
        // Check if there are events on this day
        const hasEvent = eventsData.some(event => {
            const eventDate = new Date(event.date);
            return eventDate.getDate() === day && 
                   eventDate.getMonth() === currentMonth && 
                   eventDate.getFullYear() === currentYear;
        });
        
        if (hasEvent) {
            dayElement.classList.add('has-event');
            dayElement.addEventListener('click', () => showDayEvents(day));
        }
        
        calendarGrid.appendChild(dayElement);
    }
}

function previousMonth() {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    loadCalendar();
}

function nextMonth() {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    loadCalendar();
}

function showDayEvents(day) {
    const dayEvents = eventsData.filter(event => {
        const eventDate = new Date(event.date);
        return eventDate.getDate() === day && 
               eventDate.getMonth() === currentMonth && 
               eventDate.getFullYear() === currentYear;
    });
    
    if (dayEvents.length === 0) return;
    
    let eventsHtml = `<h3>Events on ${day}/${currentMonth + 1}/${currentYear}</h3>`;
    dayEvents.forEach(event => {
        eventsHtml += `
            <div class="event-item">
                <div class="event-type">${event.type}</div>
                <div class="event-title">${event.title}</div>
                <div class="event-description">${event.description}</div>
            </div>
        `;
    });
    
    const modal = createModal(eventsHtml, 'dayEventsModal');
    document.body.appendChild(modal);
}

// Events management
function loadEvents() {
    const eventsList = document.getElementById('eventsList');
    if (!eventsList) return;
    
    eventsList.innerHTML = '';
    
    // Sort events by date
    const sortedEvents = [...eventsData].sort((a, b) => new Date(a.date) - new Date(b.date));
    
    sortedEvents.forEach(event => {
        const eventItem = document.createElement('div');
        eventItem.className = 'event-item';
        eventItem.innerHTML = `
            <div class="event-date">${formatDate(event.date)}</div>
            <div class="event-title">${event.title}</div>
            <div class="event-type">${event.type}</div>
        `;
        eventsList.appendChild(eventItem);
    });
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { 
        month: 'short', 
        day: 'numeric' 
    });
}

// Modal management
function showLoginModal() {
    const modal = document.getElementById('loginModal');
    if (modal) {
        modal.style.display = 'block';
    }
}

function showRegisterModal() {
    const modal = document.getElementById('registerModal');
    if (modal) {
        modal.style.display = 'block';
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
        if (modalId !== 'loginModal' && modalId !== 'registerModal') {
            modal.remove();
        }
    }
}

function createModal(content, modalId) {
    const modal = document.createElement('div');
    modal.id = modalId;
    modal.className = 'modal';
    modal.style.display = 'block';
    modal.innerHTML = `
        <div class="modal-content">
            <span class="close" onclick="closeModal('${modalId}')">&times;</span>
            ${content}
        </div>
    `;
    return modal;
}

// Form handlers
function setupFormHandlers() {
    // Login form
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', handleLogin);
    }
    
    // Registration form
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', handleRegistration);
    }
    
    // Inquiry form
    const inquiryForm = document.getElementById('inquiryForm');
    if (inquiryForm) {
        inquiryForm.addEventListener('submit', handleInquiry);
    }
}

function handleLogin(e) {
    e.preventDefault();
    
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    const role = document.getElementById('userRole').value;
    
    // Basic validation
    if (!email || !password || !role) {
        showMessage('Please fill in all fields.', 'error');
        return;
    }
    
    // Show loading state
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Logging in...';
    submitBtn.disabled = true;
    
    // Prepare form data
    const formData = new FormData();
    formData.append('loginEmail', email);
    formData.append('loginPassword', password);
    formData.append('userRole', role);
    
    // Send login request
    fetch('login_process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            currentUser = data.user;
            showMessage(data.message, 'success');
            closeModal('loginModal');
            updateUIForUser();
        } else {
            showMessage(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Login error:', error);
        showMessage('Login failed. Please try again.', 'error');
    })
    .finally(() => {
        // Reset button state
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
}

function handleRegistration(e) {
    e.preventDefault();
    
    const name = document.getElementById('regName').value;
    const email = document.getElementById('regEmail').value;
    const phone = document.getElementById('regPhone').value;
    const password = document.getElementById('regPassword').value;
    const confirmPassword = document.getElementById('regConfirmPassword').value;
    const role = document.getElementById('regRole').value;
    
    // Validation
    if (!name || !email || !phone || !password || !confirmPassword || !role) {
        showMessage('Please fill in all fields.', 'error');
        return;
    }
    
    if (password !== confirmPassword) {
        showMessage('Passwords do not match.', 'error');
        return;
    }
    
    if (password.length < 6) {
        showMessage('Password must be at least 6 characters long.', 'error');
        return;
    }
    
    // Show loading state
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Registering...';
    submitBtn.disabled = true;
    
    // Prepare form data
    const formData = new FormData();
    formData.append('regName', name);
    formData.append('regEmail', email);
    formData.append('regPhone', phone);
    formData.append('regPassword', password);
    formData.append('regConfirmPassword', confirmPassword);
    formData.append('regRole', role);
    
    // Send registration request
    fetch('register_process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            currentUser = data.user;
            showMessage(data.message, 'success');
            closeModal('registerModal');
            updateUIForUser();
        } else {
            if (data.errors && data.errors.length > 0) {
                showMessage(data.errors.join(', '), 'error');
            } else {
                showMessage(data.message, 'error');
            }
        }
    })
    .catch(error => {
        console.error('Registration error:', error);
        showMessage('Registration failed. Please try again.', 'error');
    })
    .finally(() => {
        // Reset button state
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
}

function handleInquiry(e) {
    e.preventDefault();
    
    const name = document.getElementById('inquiryName').value;
    const email = document.getElementById('inquiryEmail').value;
    const subject = document.getElementById('inquirySubject').value;
    const message = document.getElementById('inquiryMessage').value;
    
    // Validation
    if (!name || !email || !subject || !message) {
        showMessage('Please fill in all fields.', 'error');
        return;
    }
    
    // Simulate inquiry submission
    showMessage('Thank you for your inquiry! We will get back to you within 24 hours.', 'success');
    
    // Reset form
    document.getElementById('inquiryForm').reset();
}

function updateUIForUser() {
    if (!currentUser) return;
    
    // Update navigation based on user role
    const navMenu = document.querySelector('.nav-menu');
    const loginLink = navMenu.querySelector('a[onclick="showLoginModal()"]');
    const registerLink = navMenu.querySelector('a[onclick="showRegisterModal()"]');
    
    if (loginLink) {
        loginLink.textContent = `Welcome, ${currentUser.name}`;
        loginLink.onclick = null;
    }
    
    if (registerLink) {
        registerLink.textContent = 'Logout';
        registerLink.onclick = logout;
    }
    
    // Add role-specific features
    if (currentUser.role === 'admin') {
        addAdminFeatures();
    } else if (currentUser.role === 'instructor') {
        addInstructorFeatures();
    } else if (currentUser.role === 'student') {
        addStudentFeatures();
    }
}

function addAdminFeatures() {
    // Add admin-specific functionality
    console.log('Admin features loaded');
}

function addInstructorFeatures() {
    // Add instructor-specific functionality
    console.log('Instructor features loaded');
}

function addStudentFeatures() {
    // Add student-specific functionality
    console.log('Student features loaded');
}

function logout() {
    currentUser = null;
    location.reload();
}

// Utility functions
function showMessage(message, type) {
    // Remove existing messages
    const existingMessages = document.querySelectorAll('.message');
    existingMessages.forEach(msg => msg.remove());
    
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${type}`;
    messageDiv.textContent = message;
    
    // Insert at the top of the page
    const hero = document.querySelector('.hero');
    if (hero) {
        hero.insertAdjacentElement('afterend', messageDiv);
    }
    
    // Auto-remove after 5 seconds
    setTimeout(() => {
        messageDiv.remove();
    }, 5000);
}

// Close modals when clicking outside
window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
}

// Form validation helpers
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^[\+]?[0-9\s\-\(\)]{10,}$/;
    return re.test(phone);
}

// Search functionality
function searchCourses(query) {
    const searchTerm = query.toLowerCase();
    return coursesData.filter(course => 
        course.title.toLowerCase().includes(searchTerm) ||
        course.description.toLowerCase().includes(searchTerm) ||
        course.instructor.toLowerCase().includes(searchTerm) ||
        course.category.toLowerCase().includes(searchTerm)
    );
}

// Export functions for global access
window.scrollToSection = scrollToSection;
window.showLoginModal = showLoginModal;
window.showRegisterModal = showRegisterModal;
window.closeModal = closeModal;
window.filterCourses = filterCourses;
window.enrollInCourse = enrollInCourse;
window.showCourseDetails = showCourseDetails;
window.previousMonth = previousMonth;
window.nextMonth = nextMonth;
window.toggleMobileMenu = toggleMobileMenu;


