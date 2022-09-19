<?php

require_once __DIR__.'/_x.php';

_validate_user_first_name();
_validate_user_last_name();
_validate_user_email();
_validate_user_password();
_validate_user_password_confirm();

$user = [
    'user_id' => uniqid(),
    'user_first_name' => $_POST['user_first_name'],
    'user_last_name' => $_POST['user_last_name'],
    'user_email' => $_POST['user_email']
];

// Success
session_start();
$_SESSION['user_first_name'] = $_POST['user_first_name'];
_respond($user);