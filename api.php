<?php
require_once __DIR__ . '/config.php';

$pdo = get_pdo();

// Ensure we are using the database (after migrate)
global $DB_NAME;
$pdo->exec("USE `{$DB_NAME}`");

$method = $_SERVER['REQUEST_METHOD'];
$path = $_GET['path'] ?? '';

// Handle preflight for CORS
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    exit;
}

try {
    switch ($path) {
        case 'courses':
            handle_courses_list($pdo);
            break;
        case 'instructors':
            handle_instructors_list($pdo);
            break;
        case 'course':
            handle_course_detail($pdo);
            break;
        case 'inquiry':
            if ($method === 'POST') {
                handle_inquiry_create($pdo);
            } else {
                json_response(['error' => 'Method not allowed'], 405);
            }
            break;
        default:
            json_response(['error' => 'Not found'], 404);
    }
} catch (Throwable $e) {
    json_response(['error' => 'Server error', 'message' => $e->getMessage()], 500);
}

function handle_courses_list(PDO $pdo): void {
    $params = [];
    $where = [];
    
    if (!empty($_GET['category'])) {
        $where[] = 'category = :category';
        $params[':category'] = $_GET['category'];
    }
    if (!empty($_GET['location'])) {
        $where[] = 'location = :location';
        $params[':location'] = $_GET['location'];
    }
    if (!empty($_GET['q'])) {
        $where[] = '(title LIKE :q OR description LIKE :q)';
        $params[':q'] = '%' . $_GET['q'] . '%';
    }
    
    $sql = 'SELECT c.*, i.name AS instructor_name FROM courses c LEFT JOIN instructors i ON c.instructor_id = i.id';
    if ($where) {
        $sql .= ' WHERE ' . implode(' AND ', $where);
    }
    $sql .= ' ORDER BY c.start_date ASC';
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll();
    json_response($rows);
}

function handle_course_detail(PDO $pdo): void {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if ($id <= 0) {
        json_response(['error' => 'Invalid course id'], 400);
    }
    $stmt = $pdo->prepare('SELECT c.*, i.name AS instructor_name, i.email AS instructor_email FROM courses c LEFT JOIN instructors i ON c.instructor_id = i.id WHERE c.id = :id');
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    if (!$row) {
        json_response(['error' => 'Course not found'], 404);
    }
    json_response($row);
}

function handle_instructors_list(PDO $pdo): void {
    $rows = $pdo->query('SELECT id, name, title, specialties, experience_years FROM instructors WHERE status = "active" ORDER BY name')->fetchAll();
    json_response($rows);
}

function handle_inquiry_create(PDO $pdo): void {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!is_array($input)) {
        $input = $_POST; // fallback for form-encoded
    }
    $name = trim($input['name'] ?? '');
    $email = trim($input['email'] ?? '');
    $subject = trim($input['subject'] ?? '');
    $message = trim($input['message'] ?? '');
    
    if ($name === '' || $email === '' || $subject === '' || $message === '') {
        json_response(['error' => 'Missing required fields'], 422);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        json_response(['error' => 'Invalid email'], 422);
    }
    
    $stmt = $pdo->prepare('INSERT INTO inquiries (name,email,subject,message) VALUES (:name,:email,:subject,:message)');
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':subject' => $subject,
        ':message' => $message,
    ]);
    json_response(['success' => true, 'id' => (int)$pdo->lastInsertId()], 201);
}

?>



