<?php
// ============================================
// File: middleware/check_auth.php
// Description: Authentication middleware
// ============================================
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>