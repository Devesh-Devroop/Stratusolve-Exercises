<?php
include_once('session.php');
// session_start();
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','root');
define('DB_DATABASE','Twitter');

include_once('DatabaseConnection.php');
$db = new DatabaseConnection;

function redirect($message,$page){
    
    $_SESSION['message'] = "$message";
    header("Location: $page");
    exit();

}

function redirectLogin($message,$page){
    
    $_SESSION['messageLogin'] = "$message";
    header("Location: $page");
    exit();

}

function validateInput($dbcon,$input){
    return mysqli_real_escape_string($dbcon,$input);
}