// Admin Dashboard JavaScript functionality

// Sample data for admin dashboard
const adminData = {
    students: [
        {
            id: 1,
            name: "John Doe",
            email: "john.doe@email.com",
            phone: "+94 77 123 4567",
            course: "Web Development Fundamentals",
            courseId: 1,
            enrollmentDate: "2024-01-15",
            status: "active"
        },
        {
            id: 2,
            name: "Jane Smith",
            email: "jane.smith@email.com",
            phone: "+94 77 234 5678",
            course: "Mobile App Development",
            courseId: 2,
            enrollmentDate: "2024-01-20",
            status: "active"
        },
        {
            id: 3,
            name: "Mike Johnson",
            email: "mike.johnson@email.com",
            phone: "+94 77 345 6789",
            course: "Plumbing & Pipe Fitting",
            courseId: 3,
            enrollmentDate: "2024-01-25",
            status: "completed"
        }
    ],
    inquiries: [
        {
            id: 1,
            name: "Sarah Wilson",
            email: "sarah.wilson@email.com",
            subject: "Course Information",
            message: "I would like to know more about the Web Development course. What are the prerequisites?",
            date: "2024-02-01",
            status: "pending"
        },
        {
            id: 2,
            name: "David Brown",
            email: "david.brown@email.com",
            subject: "Admission Process",
            message: "How do I apply for the Mobile App Development course?",
            date: "2024-02-02",
            status: "replied"
        },
        {
            id: 3,
            name: "Lisa Davis",
            email: "lisa.davis@email.com",
            subject: "Certification",
            message: "When will I receive my certificate after completing the course?",
            date: "2024-02-03",
            status: "pending"
        }
    ],
    recentEnrollments: [
        {
            studentName: "Alex Kumar",
            courseName: "Digital Marketing",
            date: "2024-02-05"
        },
        {
            studentName: "Priya Fernando",
            courseName: "Hotel Management",
            date: "2024-02-04"
        },
        {
            studentName: "Raj Patel",
            courseName: "Welding Technology",
            date: "2024-02-03"
        }
    ]
};

// Initialize admin dashboard
document.addEventListener('DOMContentLoaded', function() {
    initializeAdminDashboard();
});

function initializeAdminDashboard() {
    loadRecentEnrollments();
    loadUpcomingEvents();
    loadCoursesTable();
    loadStudentsTable();
    loadInstructorsGrid();
    loadInquiriesList();
    setupAdminEventListeners();
}

function setupAdminEventListeners() {
    // Add course form
    const addCourseForm = document.getElementById('addCourseForm');
    if (addCourseForm) {
        addCourseForm.addEventListener('submit', handleAddCourse);
    }
}

function loadRecentEnrollments() {
    const container = document.getElementById('recentEnrollments');
    if (!container) return;
    
    container.innerHTML = '';
    
    adminData.recentEnrollments.forEach(enrollment => {
        const enrollmentItem = document.createElement('div');
        enrollmentItem.className = 'activity-item';
        enrollmentItem.innerHTML = `
            <div class="activity-content">
                <h4>${enrollment.studentName}</h4>
                <p>Enrolled in ${enrollment.courseName}</p>
            </div>
            <div class="activity-date">${formatDate(enrollment.date)}</div>
        `;
        container.appendChild(enrollmentItem);
    });
}

function loadUpcomingEvents() {
    const container = document.getElementById('upcomingEvents');
    if (!container) return;
    
    // Sample upcoming events
    const upcomingEvents = [
        {
            title: "Mid-term Examinations",
            date: "2024-02-25",
            type: "Exam"
        },
        {
            title: "Career Fair 2024",
            date: "2024-02-20",
            type: "Event"
        },
        {
            title: "New Batch Registration",
            date: "2024-03-01",
            type: "Registration"
        }
    ];
    
    container.innerHTML = '';
    
    upcomingEvents.forEach(event => {
        const eventItem = document.createElement('div');
        eventItem.className = 'activity-item';
        eventItem.innerHTML = `
            <div class="activity-content">
                <h4>${event.title}</h4>
                <p class="event-type">${event.type}</p>
            </div>
            <div class="activity-date">${formatDate(event.date)}</div>
        `;
        container.appendChild(eventItem);
    });
}

function loadCoursesTable() {
    const tbody = document.getElementById('coursesTableBody');
    if (!tbody) return;
    
    // Use the courses data from the main script
    if (typeof coursesData !== 'undefined') {
        tbody.innerHTML = '';
        
        coursesData.forEach(course => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${course.title}</td>
                <td><span class="category-badge">${course.category}</span></td>
                <td>${course.instructor}</td>
                <td>${course.duration}</td>
                <td>${course.price}</td>
                <td>${course.enrolled}/${course.maxStudents}</td>
                <td><span class="status-badge ${course.enrolled >= course.maxStudents ? 'full' : 'available'}">${course.enrolled >= course.maxStudents ? 'Full' : 'Available'}</span></td>
                <td>
                    <button class="btn-icon" onclick="editCourse(${course.id})" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn-icon" onclick="deleteCourse(${course.id})" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            `;
            tbody.appendChild(row);
        });
    }
}

function loadStudentsTable() {
    const tbody = document.getElementById('studentsTableBody');
    if (!tbody) return;
    
    tbody.innerHTML = '';
    
    adminData.students.forEach(student => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${student.name}</td>
            <td>${student.email}</td>
            <td>${student.phone}</td>
            <td>${student.course}</td>
            <td>${formatDate(student.enrollmentDate)}</td>
            <td><span class="status-badge ${student.status}">${student.status.charAt(0).toUpperCase() + student.status.slice(1)}</span></td>
            <td>
                <button class="btn-icon" onclick="viewStudent(${student.id})" title="View Details">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="btn-icon" onclick="editStudent(${student.id})" title="Edit">
                    <i class="fas fa-edit"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

function loadInstructorsGrid() {
    const container = document.getElementById('adminInstructorsGrid');
    if (!container) return;
    
    // Use the instructors data from the main script
    if (typeof instructorsData !== 'undefined') {
        container.innerHTML = '';
        
        instructorsData.forEach(instructor => {
            const instructorCard = document.createElement('div');
            instructorCard.className = 'instructor-card admin-card';
            instructorCard.innerHTML = `
                <div class="instructor-avatar">${instructor.avatar}</div>
                <h3 class="instructor-name">${instructor.name}</h3>
                <p class="instructor-title">${instructor.title}</p>
                <p class="instructor-specialties">${instructor.specialties}</p>
                <div class="instructor-experience">${instructor.experience}</div>
                <div class="instructor-actions">
                    <button class="btn-icon" onclick="editInstructor(${instructor.id})" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn-icon" onclick="deleteInstructor(${instructor.id})" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            container.appendChild(instructorCard);
        });
    }
}

function loadInquiriesList() {
    const container = document.getElementById('inquiriesList');
    if (!container) return;
    
    container.innerHTML = '';
    
    adminData.inquiries.forEach(inquiry => {
        const inquiryItem = document.createElement('div');
        inquiryItem.className = 'inquiry-item';
        inquiryItem.innerHTML = `
            <div class="inquiry-header">
                <div class="inquiry-info">
                    <h4>${inquiry.name}</h4>
                    <p class="inquiry-email">${inquiry.email}</p>
                </div>
                <div class="inquiry-meta">
                    <span class="inquiry-date">${formatDate(inquiry.date)}</span>
                    <span class="status-badge ${inquiry.status}">${inquiry.status.charAt(0).toUpperCase() + inquiry.status.slice(1)}</span>
                </div>
            </div>
            <div class="inquiry-content">
                <h5>Subject: ${inquiry.subject}</h5>
                <p>${inquiry.message}</p>
            </div>
            <div class="inquiry-actions">
                <button class="btn btn-primary btn-sm" onclick="replyToInquiry(${inquiry.id})">
                    <i class="fas fa-reply"></i> Reply
                </button>
                <button class="btn btn-secondary btn-sm" onclick="markInquiryAsClosed(${inquiry.id})">
                    <i class="fas fa-check"></i> Mark as Closed
                </button>
            </div>
        `;
        container.appendChild(inquiryItem);
    });
}

// Modal functions
function showAddCourseModal() {
    const modal = document.getElementById('addCourseModal');
    if (modal) {
        modal.style.display = 'block';
    }
}

function showAddInstructorModal() {
    // Implementation for adding instructor modal
    alert('Add Instructor functionality would be implemented here');
}

// Form handlers
function handleAddCourse(e) {
    e.preventDefault();
    
    const courseData = {
        title: document.getElementById('courseTitle').value,
        category: document.getElementById('courseCategory').value,
        description: document.getElementById('courseDescription').value,
        duration: document.getElementById('courseDuration').value,
        price: document.getElementById('coursePrice').value,
        location: document.getElementById('courseLocation').value,
        mode: document.getElementById('courseMode').value,
        instructor: document.getElementById('courseInstructor').value,
        startDate: document.getElementById('courseStartDate').value,
        maxStudents: document.getElementById('courseMaxStudents').value
    };
    
    // Validate form
    if (!courseData.title || !courseData.category || !courseData.description) {
        showMessage('Please fill in all required fields.', 'error');
        return;
    }
    
    // Simulate adding course
    showMessage('Course added successfully!', 'success');
    closeModal('addCourseModal');
    
    // Reset form
    document.getElementById('addCourseForm').reset();
    
    // Reload courses table
    loadCoursesTable();
}

// Filter functions
function filterStudents() {
    const searchTerm = document.getElementById('studentSearch').value.toLowerCase();
    const courseFilter = document.getElementById('courseFilter').value;
    
    const rows = document.querySelectorAll('#studentsTableBody tr');
    
    rows.forEach(row => {
        const name = row.cells[0].textContent.toLowerCase();
        const email = row.cells[1].textContent.toLowerCase();
        const course = row.cells[3].textContent;
        
        const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm);
        const matchesCourse = !courseFilter || course.includes(courseFilter);
        
        if (matchesSearch && matchesCourse) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function filterInquiries() {
    const statusFilter = document.getElementById('inquiryStatusFilter').value;
    const inquiryItems = document.querySelectorAll('.inquiry-item');
    
    inquiryItems.forEach(item => {
        const status = item.querySelector('.status-badge').textContent.toLowerCase();
        
        if (!statusFilter || status === statusFilter) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}

// Action functions
function editCourse(courseId) {
    alert(`Edit course ${courseId} functionality would be implemented here`);
}

function deleteCourse(courseId) {
    if (confirm('Are you sure you want to delete this course?')) {
        showMessage('Course deleted successfully!', 'success');
        // In a real application, this would make an API call to delete the course
    }
}

function viewStudent(studentId) {
    const student = adminData.students.find(s => s.id === studentId);
    if (student) {
        alert(`Student Details:\nName: ${student.name}\nEmail: ${student.email}\nPhone: ${student.phone}\nCourse: ${student.course}\nEnrollment Date: ${student.enrollmentDate}\nStatus: ${student.status}`);
    }
}

function editStudent(studentId) {
    alert(`Edit student ${studentId} functionality would be implemented here`);
}

function editInstructor(instructorId) {
    alert(`Edit instructor ${instructorId} functionality would be implemented here`);
}

function deleteInstructor(instructorId) {
    if (confirm('Are you sure you want to delete this instructor?')) {
        showMessage('Instructor deleted successfully!', 'success');
    }
}

function replyToInquiry(inquiryId) {
    const inquiry = adminData.inquiries.find(i => i.id === inquiryId);
    if (inquiry) {
        const reply = prompt(`Reply to ${inquiry.name} (${inquiry.email}):`);
        if (reply) {
            inquiry.status = 'replied';
            showMessage('Reply sent successfully!', 'success');
            loadInquiriesList();
        }
    }
}

function markInquiryAsClosed(inquiryId) {
    const inquiry = adminData.inquiries.find(i => i.id === inquiryId);
    if (inquiry) {
        inquiry.status = 'closed';
        showMessage('Inquiry marked as closed!', 'success');
        loadInquiriesList();
    }
}

// Utility functions
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { 
        year: 'numeric', 
        month: 'short', 
        day: 'numeric' 
    });
}

function showMessage(message, type) {
    // Remove existing messages
    const existingMessages = document.querySelectorAll('.message');
    existingMessages.forEach(msg => msg.remove());
    
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${type}`;
    messageDiv.textContent = message;
    
    // Insert at the top of the admin container
    const adminContainer = document.querySelector('.admin-container');
    if (adminContainer) {
        adminContainer.insertAdjacentElement('afterbegin', messageDiv);
    }
    
    // Auto-remove after 5 seconds
    setTimeout(() => {
        messageDiv.remove();
    }, 5000);
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    }
}

function logout() {
    if (confirm('Are you sure you want to logout?')) {
        window.location.href = 'index.html';
    }
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


