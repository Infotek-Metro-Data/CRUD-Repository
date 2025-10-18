<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function require_login() {
    if (empty($_SESSION['id_login'])) {
        header("Location: login.php");
        exit;
    }
}

function require_admin() {
    require_login();
    if (($_SESSION['user_type'] ?? '') !== 'admin') {
        header("Location: index.php");
        exit;
    }
}
