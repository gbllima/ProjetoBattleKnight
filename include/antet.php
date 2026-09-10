<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . '/mysql_compat.php';
require_once __DIR__ . '/../language/ru.php';
require_once __DIR__ . '/../language/pt_br_override.php';

$title = "BattleKnight The Empire";
$announcement = $lang['announc'] ?? '';
$m = 49;
$n = 49;

// Database configuration. Environment variables can override local defaults.
$db_host = getenv('DB_HOST') ?: "127.0.0.1:3307";
$db_user = getenv('DB_USER') ?: "root";
$db_pass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : "";
$db_name = getenv('DB_NAME') ?: "battleknight";

$ip = '62.205.195.53';
$gmip = '62.205.195.53';
$mcost = 1.5;
?>