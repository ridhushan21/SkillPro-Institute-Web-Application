<?php
require_once __DIR__ . '/config.php';

// This script creates the database and required tables, and seeds sample data

global $DB_NAME;
$pdo = get_pdo();

// Create database if not exists
$pdo->exec("CREATE DATABASE IF NOT EXISTS `{$DB_NAME}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
$pdo->exec("USE `{$DB_NAME}`");

// Create tables
$pdo->exec(<<<SQL
CREATE TABLE IF NOT EXISTS instructors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE,
  phone VARCHAR(20),
  title VARCHAR(255),
  specialties TEXT,
  experience_years INT DEFAULT 0,
  status ENUM('active','inactive') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
SQL);

$pdo->exec(<<<SQL
CREATE TABLE IF NOT EXISTS courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  category ENUM('ICT','Engineering','Tourism','Trade') NOT NULL,
  description TEXT,
  duration VARCHAR(50),
  location ENUM('Colombo','Kandy','Matara','Online') NOT NULL,
  price DECIMAL(10,2) DEFAULT 0,
  instructor_id INT,
  mode ENUM('Online','On-site') NOT NULL,
  start_date DATE,
  max_students INT DEFAULT 25,
  enrolled_count INT DEFAULT 0,
  status ENUM('active','inactive','full') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (instructor_id) REFERENCES instructors(id)
);
SQL);

$pdo->exec(<<<SQL
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('student','instructor','admin') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
SQL);

$pdo->exec(<<<SQL
CREATE TABLE IF NOT EXISTS students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  phone VARCHAR(20),
  password_hash VARCHAR(255) NOT NULL,
  status ENUM('active','inactive','suspended') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
SQL);

$pdo->exec(<<<SQL
CREATE TABLE IF NOT EXISTS enrollments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  course_id INT NOT NULL,
  enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status ENUM('enrolled','completed','dropped') DEFAULT 'enrolled',
  completion_date TIMESTAMP NULL,
  certificate_issued TINYINT(1) DEFAULT 0,
  FOREIGN KEY (student_id) REFERENCES students(id),
  FOREIGN KEY (course_id) REFERENCES courses(id)
);
SQL);

$pdo->exec(<<<SQL
CREATE TABLE IF NOT EXISTS inquiries (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  subject ENUM('course-info','admission','certification','job-opportunities','other') NOT NULL,
  message TEXT NOT NULL,
  status ENUM('pending','replied','closed') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  replied_at TIMESTAMP NULL,
  admin_notes TEXT
);
SQL);

// Seed instructors if empty
$count = (int)$pdo->query("SELECT COUNT(*) FROM instructors")->fetchColumn();
if ($count === 0) {
    $pdo->exec(<<<SQL
    INSERT INTO instructors (name,email,phone,title,specialties,experience_years) VALUES
    ('Mr. John Silva','john.silva@skillpro.lk','+94 11 222 1111','Senior Web Developer','React, Node.js, Full-stack Development',8),
    ('Ms. Priya Fernando','priya.fernando@skillpro.lk','+94 81 333 2222','Mobile App Specialist','React Native, Flutter, iOS Development',6),
    ('Mr. Ravi Perera','ravi.perera@skillpro.lk','+94 41 444 3333','Master Plumber','Commercial Plumbing, Pipe Systems',15),
    ('Mr. Kamal Rajapaksa','kamal.rajapaksa@skillpro.lk','+94 11 555 4444','Welding Instructor','MIG, TIG, Arc Welding',12),
    ('Ms. Anjali Wickramasinghe','anjali.wickramasinghe@skillpro.lk','+94 81 666 5555','Hospitality Manager','Hotel Operations, Customer Service',10),
    ('Mr. David Kumar','david.kumar@skillpro.lk','+94 11 777 6666','Digital Marketing Expert','SEO, Social Media, Analytics',7);
    SQL);
}

// Seed courses if empty
$count = (int)$pdo->query("SELECT COUNT(*) FROM courses")->fetchColumn();
if ($count === 0) {
    $pdo->exec(<<<SQL
    INSERT INTO courses (title, category, description, duration, location, price, instructor_id, mode, start_date, max_students, enrolled_count) VALUES
    ('Web Development Fundamentals','ICT','Learn modern web development with HTML, CSS, JavaScript, and React.', '6 months','Colombo',45000,1,'Online','2025-10-01',25,18),
    ('Mobile App Development','ICT','Build cross-platform applications using React Native and Flutter.', '8 months','Kandy',55000,2,'On-site','2025-11-01',20,15),
    ('Plumbing & Pipe Fitting','Trade','Comprehensive plumbing training including installation and maintenance.', '4 months','Matara',25000,3,'On-site','2025-10-15',15,12),
    ('Welding Technology','Trade','Professional welding training including MIG, TIG, and arc.', '5 months','Colombo',35000,4,'On-site','2025-11-10',12,8),
    ('Hotel Management','Tourism','Training covering front office, housekeeping, and food service.', '10 months','Kandy',40000,5,'On-site','2025-10-20',30,22),
    ('Digital Marketing','ICT','Digital marketing strategies including SEO and social media.', '3 months','Online',30000,6,'Online','2025-11-05',40,35);
    SQL);
}

echo "Migration complete. Database '{$DB_NAME}' is ready.\n";

?>




