<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 0); // Set to 1 if using HTTPS
ini_set('session.use_strict_mode', 1);
ini_set('session.cookie_samesite', 'Strict');
ini_set('session.gc_maxlifetime', 1200); // 20 minutes
ini_set('session.cookie_lifetime', 0);

session_start();

if (!isset($_SESSION['session_regenerated'])) {
    session_regenerate_id(true);
    $_SESSION['session_regenerated'] = true;
}

header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://www.googletagmanager.com https://ajax.googleapis.com https://use.fontawesome.com https://kit.fontawesome.com; style-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com https://fonts.googleapis.com https://use.fontawesome.com; img-src 'self' data: https:; font-src 'self' https://fonts.gstatic.com https://cdnjs.cloudflare.com https://use.fontawesome.com; connect-src 'self' https://www.googletagmanager.com");
// header('Strict-Transport-Security: max-age=31536000; includeSubDomains'); // Uncomment when HTTPS is available

error_reporting(0);

include("config.php");
require_once APP_ROOT . "/system/functions.php";
require_once APP_ROOT . "/system/display.php";
require_once APP_ROOT . "/classes/user.php";

define('MAXSIZE', 1024 * 1024 * 2);

date_default_timezone_set("Asia/kathmandu");

$obj = new Functions();
$user = new User();

?>
