<?php
require_once __DIR__ . '/config.php';

// Test database connection and table structure
try {
    $pdo = get_pdo();
    global $DB_NAME;
    $pdo->exec("USE `{$DB_NAME}`");
    
    echo "<h2>Database Connection Test</h2>";
    echo "<p style='color: green;'>✅ Database connection successful!</p>";
    
    // Check if users table exists
    $stmt = $pdo->query("SHOW TABLES LIKE 'users'");
    if ($stmt->rowCount() > 0) {
        echo "<p style='color: green;'>✅ Users table exists</p>";
        
        // Show table structure
        echo "<h3>Users Table Structure:</h3>";
        $stmt = $pdo->query("DESCRIBE users");
        echo "<table border='1' style='border-collapse: collapse; margin: 10px 0;'>";
        echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Field']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Type']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Null']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Key']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Default'] ?? 'NULL') . "</td>";
            echo "<td>" . htmlspecialchars($row['Extra']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // Count existing users
        $stmt = $pdo->query("SELECT COUNT(*) as count FROM users");
        $count = $stmt->fetch()['count'];
        echo "<p>Total users in database: <strong>$count</strong></p>";
        
    } else {
        echo "<p style='color: red;'>❌ Users table does not exist. Please run migrate.php first.</p>";
    }
    
    // Test registration endpoint
    echo "<h3>Testing Registration Endpoint:</h3>";
    echo "<p>You can test the registration by visiting the main page and using the registration form.</p>";
    
    // Test login endpoint
    echo "<h3>Testing Login Endpoint:</h3>";
    echo "<p>You can test the login by visiting the main page and using the login form.</p>";
    
} catch (Exception $e) {
    echo "<h2>Database Connection Test</h2>";
    echo "<p style='color: red;'>❌ Database connection failed: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p>Please check your database configuration in config.php</p>";
}
?>

<style>
body { font-family: Arial, sans-serif; margin: 20px; }
table { margin: 10px 0; }
th, td { padding: 8px; text-align: left; }
th { background-color: #f2f2f2; }
</style>
