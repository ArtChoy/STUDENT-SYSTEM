<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'student_management';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die(json_encode(['error' => 'Connection failed: ' . $e->getMessage()]));
}

function validateInput($data) {
    $errors = [];
    
    if (empty($data['first_name'])) $errors[] = 'First name is required';
    if (empty($data['last_name'])) $errors[] = 'Last name is required';
    if (empty($data['email'])) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }
    if (empty($data['role'])) $errors[] = 'Role is required';
    if (empty($data['department'])) $errors[] = 'Department is required';
    if (empty($data['password'])) $errors[] = 'Password is required';
    
    return $errors;
}

$action = $_GET['action'] ?? '';

switch($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $errors = validateInput($data);
            
            if (empty($errors)) {
                try {
                    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, role, department, password_hash) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->execute([
                        $data['first_name'],
                        $data['last_name'],
                        $data['email'],
                        $data['role'],
                        $data['department'],
                        password_hash($data['password'], PASSWORD_DEFAULT)
                    ]);
                    echo json_encode(['success' => true, 'message' => 'User created successfully']);
                } catch(PDOException $e) {
                    if ($e->getCode() == 23000) { // Duplicate entry
                        echo json_encode(['error' => 'Email already exists']);
                    } else {
                        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
                    }
                }
            } else {
                echo json_encode(['error' => $errors]);
            }
        }
        break;
        
    case 'read':
        try {
            $stmt = $pdo->query("SELECT id, first_name, last_name, email, role, department, created_at, updated_at FROM users");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(['success' => true, 'data' => $users]);
        } catch(PDOException $e) {
            echo json_encode(['error' => 'Failed to fetch users: ' . $e->getMessage()]);
        }
        break;
        
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $id = $data['id'] ?? null;
            
            if ($id) {
                $errors = validateInput($data);
                
                if (empty($errors)) {
                    try {
                        $stmt = $pdo->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, role = ?, department = ? WHERE id = ?");
                        $stmt->execute([
                            $data['first_name'],
                            $data['last_name'],
                            $data['email'],
                            $data['role'],
                            $data['department'],
                            $id
                        ]);
                        echo json_encode(['success' => true, 'message' => 'User updated successfully']);
                    } catch(PDOException $e) {
                        echo json_encode(['error' => 'Failed to update user: ' . $e->getMessage()]);
                    }
                } else {
                    echo json_encode(['error' => $errors]);
                }
            } else {
                echo json_encode(['error' => 'User ID is required']);
            }
        }
        break;
        
    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $id = $data['id'] ?? null;
            
            if ($id) {
                try {
                    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
                    $stmt->execute([$id]);
                    echo json_encode(['success' => true, 'message' => 'User deleted successfully']);
                } catch(PDOException $e) {
                    echo json_encode(['error' => 'Failed to delete user: ' . $e->getMessage()]);
                }
            } else {
                echo json_encode(['error' => 'User ID is required']);
            }
        }
        break;
        
    default:
        echo json_encode(['error' => 'Invalid action']);
}