<?php 
// Include all the necessary class definitions
require_once 'classes/Article.php';
require_once 'classes/Database.php';
require_once 'classes/User.php';

// Create an instance of the Database class first
$databaseObj = new Database();

// Now, create instances of the other classes, passing the database connection to them
// This is called Dependency Injection
$userObj = new User($databaseObj); 
$articleObj = new Article($databaseObj);

// Start the session
$userObj->startSession();
?>