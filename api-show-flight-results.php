<?php
// NOT IN USE
ini_set('display_errors', 1);

require_once __DIR__.'/_x.php';

// VALIDATE
_validate_from_city_name();
_validate_to_city_name();

// ########## CONNECT TO DATABASE ########## 
try {
    $to_city_name = $_GET['to_city_name'] ?? 0;
    $from_city_name = $_GET['from_city_name'] ?? 0;
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('SELECT * FROM flights WHERE from_city_name LIKE :from_city_name AND to_city_name LIKE :to_city_name');
    $q->bindValue(':from_city_name', '%'.$from_city_name.'%');
    $q->bindValue(':to_city_name', '%'.$to_city_name.'%');
    $q->execute();
    $flights = $q->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($flights);
    }
    catch(Exception $ex){
    http_response_code(400);
    echo json_encode(['Info:' => 'System under maintainance']);
    }