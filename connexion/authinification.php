<?php
function checkRole($requiredRole) {
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    
    if (!isset($_SESSION['role_utilisateur']) || $_SESSION['role_utilisateur'] !== $requiredRole) {
        header("Location: ../index.php?error=NONCONNECT");
        exit();
    }
}