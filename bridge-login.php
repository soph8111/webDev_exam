<?php

$correct_user_email = 'a@a.com';
$correct_user_password = 'password';

// VALIDATE
// Check if the email is valid
if( ! filter_var( $_POST['login_email'], FILTER_VALIDATE_EMAIL ) ) {
    header('Location: login');
    exit();
}

// Check if the user's email matches the correct email
if( $_POST['login_email'] !== $correct_user_email ) {
    header('Location: login');
    exit();
}

// Check if the user's password matches the correct password
if( $_POST['login_password'] !== $correct_user_password ) {
    header('Location: login');
    exit();
}

// Succes 
session_start();
$_SESSION['user_first_name'] = 'Sophie';
header('Location: admin');
