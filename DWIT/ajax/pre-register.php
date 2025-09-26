<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../system/application_top.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['formSubmitted'])) {

    // CSRF validation
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        Page_finder::set_message("Invalid CSRF token", 'danger');
        die($obj->redirect('../noticePreregister.php'));
    }

    // Input sanitization
    $fullname = trim($_POST['fullname'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $interest = (int)($_POST['interest'] ?? 0);
    $sources = $_POST['source'] ?? [];

    // Validation
    if (empty($fullname) || empty($phone) || !in_array($interest, [1,2,3])) {
        Page_finder::set_message("Please fill in all required fields correctly.", 'danger');
        die($obj->redirect('../noticePreregister.php'));
    }

    // Phone number format validation
    if (!preg_match('/^\+?\d{7,15}$/', $phone)) {
        Page_finder::set_message("Invalid phone number format.", 'danger');
        die($obj->redirect('../noticePreregister.php'));
    }

    // Existing insert workflow using $obj->insert()
    $obj->tbl = "preregister";
    $obj->val = array(
        "full_name" => $fullname,
        "phone_no" => $phone,
        "stream" => $interest
    );
    $id = $obj->insert();

    $obj->tbl = "preregistersource";
    foreach ($sources as $value) {
        $obj->val = array(
            "register_id" => (int)$id,
            "source" => htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8')
        );
        $obj->insert();
    }

    Page_finder::set_message("You have successfully registered", 'success');
    die($obj->redirect('../noticePreregister.php'));

} else {
    Page_finder::set_message("Invalid request", 'danger');
    die($obj->redirect('../noticePreregister.php'));
}
