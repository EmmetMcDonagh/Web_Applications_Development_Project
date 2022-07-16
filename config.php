<?php
// Emmet McDonagh. Web Applications Project May 2022. Code to connect to MYSQL database.

//Settings to view error messages
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

//Start a session
session_start();

$hostname_conn = "localhost"; //location: on my own device
$database_conn = "g00222864"; //name of the database in mysql
$username_conn = "root"; //username: admin
$password_conn = ""; //pass: is empty or blank

// Connection to MySQL
$conn = mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn);
if(!$conn) {
   echo "Error connecting to MySQL."; // If there is no connection
   exit;
}
?>