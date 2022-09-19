<?php

$correct_user_email = 'a@a.com';
$correct_user_password = 'password';

// VALIDATE
// Check if the email is valid
if( ! filter_var( $_POST['user_email'], FILTER_VALIDATE_EMAIL ) ) {
    header('Location: /');
    exit();
}

// Check if the user's email matches the correct email
if( $_POST['user_email'] !== $correct_user_email ) {
    header('Location: /');
    exit();
}

// Check if the user's password matches the correct password
if( $_POST['user_password'] !== $correct_user_password ) {
    header('Location: /');
    exit();
}

// Succes 
session_start();
$_SESSION['user_first_name'] = 'Sophie';
header('Location: admin');
