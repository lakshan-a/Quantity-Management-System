<?php
// ============================================
// File: index.php - Main Landing Page
// Description: Redirects to dashboard or login
// ============================================
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard/index.php");
    exit();
} else {
    header("Location: dashboard/index.php");
    exit();
}
?>