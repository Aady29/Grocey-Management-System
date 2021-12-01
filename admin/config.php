<?php
session_start();

define('HOMEPAGE', 'http://localhost/PANDEY/');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'grocery');


$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error($conn));
$db_select = mysqli_select_db($conn, 'grocery') or die(mysqli_error($conn));
