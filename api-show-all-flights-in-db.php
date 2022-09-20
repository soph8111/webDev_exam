<?php
ini_set('display_errors', 1);

require_once __DIR__.'/_x.php';

// VALIDATE
// _validate_to_city_name();
// _validate_from_city_name();

// ########## CONNECT TO DATABASE ########## 
try {
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('SELECT * FROM flights');
    $q->execute();
    $flights = $q->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($flights);
    }
    catch(Exception $ex){
    http_response_code(400);
    echo json_encode(['Info:' => 'Uuuuppss...']);
    }