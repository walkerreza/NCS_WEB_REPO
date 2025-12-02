<?php
/**
 * Database Configuration
 * Handles PostgreSQL connection using environment variables
 */

// Load environment variables from .env file
function loadEnv($path) {
    if (!file_exists($path)) {
        return false;
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        // Parse key=value pairs
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value, " \t\n\r\0\x0B\"'");
            
            if (!empty($key)) {
                putenv("$key=$value");
                $_ENV[$key] = $value;
            }
        }
    }
    return true;
}

// Load .env file
loadEnv(__DIR__ . '/../.env');

// Database connection class
class Database {
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        $host = getenv('DB_HOST') ?: 'localhost';
        $port = getenv('DB_PORT') ?: '5432';
        $dbname = getenv('DB_NAME') ?: 'ncs_lab';
        $user = getenv('DB_USER') ?: 'postgres';
        $password = getenv('DB_PASSWORD') ?: '';
        
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
        
        try {
            $this->connection = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            if (getenv('APP_DEBUG') === 'true') {
                die("Koneksi database gagal: " . $e->getMessage());
            } else {
                die("Terjadi kesalahan pada sistem. Silakan hubungi administrator.");
            }
        }
    }
    
    // Singleton pattern for database connection
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    // Get PDO connection
    public function getConnection() {
        return $this->connection;
    }
    
    // Execute query with prepared statement
    public function query($sql, $params = []) {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
    
    // Fetch all results
    public function fetchAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }
    
    // Fetch single result
    public function fetch($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }
    
    // Get last insert ID
    public function lastInsertId($name = null) {
        return $this->connection->lastInsertId($name);
    }
    
    // Prevent cloning
    private function __clone() {}
    
    // Prevent unserialization
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }
}

// Helper function to get database instance
function db() {
    return Database::getInstance();
}

