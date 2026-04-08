<?php
// ============================================
// File: middleware/check_role.php
// Description: Role-based access control
// ============================================
function checkRole($requiredRole) {
    if(!isset($_SESSION['user_role'])) {
        header("Location: ../auth/login.php");
        exit();
    }
    if($_SESSION['user_role'] !== $requiredRole && $_SESSION['user_role'] !== 'admin') {
        header("HTTP/1.0 403 Forbidden");
        echo "<h1>Access Denied</h1><p>You don't have permission to access this page.</p>";
        exit();
    }
    return true;
}
?>