<?php
// ============================================
// File: auth/logout.php - Logout Handler
// Description: Destroys session and redirects
// ============================================
session_start();
session_destroy();
header("Location: login.php");
exit();
?>