<?php

$email_already_in_system = 'a@a.com';

if ( $email_already_in_system == $_POST['user_email'] ) {
    echo json_encode(['Info' => 'Email is already used']);
    http_response_code(400);
    exit();
}