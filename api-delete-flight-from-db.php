<?php

ini_set('display_errors', 1);

// Validate the flight id
// Can only be a positive number (1, 2, 3, 4)

if ( ! isset($_POST['flight_id']) ) {
    http_response_code(400);
    echo json_encode(['Info:' => 'flight_id missing']);
    exit();
}

if ( ! ctype_digit($_POST['flight_id'])) {
    http_response_code(400);
    echo json_encode(['Info:' => 'flight_id must be a digit']);
    exit();
}

// To do: Delete the flight from the database
try{
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('DELETE FROM FLIGHTS WHERE id = :id');
    $q->bindValue(':id', $_POST['flight_id']);
    $q->execute();
    // Success
    echo json_encode(['Info:' => 'Flight deleted', 'flight_id' => $_POST['flight_id']]);
    exit();
}catch(Exception $ex){
    http_response_code(500); // Internal server error 500
    echo json_encode(['Info:' => 'System under maintainance']);
}