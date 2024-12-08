<?php
// Database configuration
define('DB_HOST', 'localhost'); // Database host
define('DB_USER', 'root'); // Database user
define('DB_PASS', ''); // Database password
define('DB_NAME', 'tasks_db'); // Database name

try {
    // Connect to the MySQL server
    $pdo = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
    echo "Database '" . DB_NAME . "' created successfully or already exists.\n";

    // Select the new database
    $pdo->exec("USE " . DB_NAME);

    // SQL to create the `users` table
    $userTableSQL = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";
    $pdo->exec($userTableSQL);
    echo "Table 'users' created successfully or already exists.\n";

    // SQL to create the `tasks` table
    $tableSQL = "
    CREATE TABLE IF NOT EXISTS tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        task_name VARCHAR(255) NOT NULL,
        is_completed BOOLEAN DEFAULT FALSE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );
    ";

    // Execute the SQL
    $pdo->exec($tableSQL);
    echo "Table 'tasks' created successfully or already exists.\n";

    // SQL to create the `password_resets` table
    $passwordResetTableSQL  = "
    CREATE TABLE IF NOT EXISTS password_resets(
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) NOT NULL,
        token VARCHAR(255) NOT NULL,
        expires_at DATETIME NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (email) REFERENCES users(email) ON DELETE CASCADE
    )";

    $pdo->exec($passwordResetTableSQL);
    echo "Table 'password_resets' created successfully or already exists.\n";

    echo "Database setup completed! You can now run the application.\n";
} catch (PDOException $e) {
    // Display an error message if something goes wrong
    die("Error setting up the database: " . $e->getMessage());
}
