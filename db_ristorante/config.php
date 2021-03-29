<?php

session_start();
// start connection
$conn = new mysqli("localhost", "root", "", "db_ristorante");
// check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// define global constants
define('BASE_URL', 'http://localhost/projects/db_ristorante'); // the home url of the website
define('INCLUDE_PATH' , realpath(dirname(__FILE__) . '/includes')); // path to the includes folder
define('ROOT_PATH', realpath(dirname(__FILE__))); // path to the root folder
?>