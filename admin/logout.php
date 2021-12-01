<?php
// Include constants.php for homepage.
include('config.php');
// 1. Destroy the session
session_destroy(); //unsets$_SESSION['user'];
// 2. Redirect to login page
header('location:' . HOMEPAGE . 'admin/loginADMIN.php');
