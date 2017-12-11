<?php

declare(strict_types=1);

// Start the session engines.
session_start();
// die(var_dump($_SESSION));

// Set the default timezone to Coordinated Universal Time.
date_default_timezone_set('UTC');

// Set the default character encoding to UTF-8.
mb_internal_encoding('UTF-8');

// Include the helper functions.
require __DIR__.'/functions.php';

// Fetch the global configuration array.
$config = require __DIR__.'/config.php';

// Setup the database connection.
$pdo = new PDO($config['database_path']);

// If user is already logged in she should not be able to reach the Login-Page
if (stripos($_SERVER['REQUEST_URI'], 'loginForm.php') && isset($_SESSION['user'])) {
  redirect('/');
};
