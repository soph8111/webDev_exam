<?php
ini_set('display_errors', 1);

// API must vaidate
// API returns data (JSON), not text or HTML
// API can be success (200) or error (400) -> (correct data or a error message)
// Test the API with Postman or Thunderclient
// Never test the API with the browser
// PHP is not native to JSON, but there are options

require_once __DIR__.'/_x.php';

// VALIDATE
_validate_to_city_name();
_validate_from_city_name();

// ########## CONNECT TO DATABASE ########## 
// Tell php to try to run the following code. If it does not work, run catch
try {
    // Send them no results, if it can't find 'to_city'. Fallback
    $to_city_name = $_GET['to_city_name'] ?? 0;
    $from_city_name = $_GET['from_city_name'] ?? '';
    // Connect to a database. Create a new PDO-connection (a php function). Connect to momondo.db
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    // If there is an error, run the catch
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Search
    $q = $db->prepare('SELECT DISTINCT from_city_name, from_city_airport_name, to_country_name, from_city_img, from_city_airport_short, to_city_name, to_city_airport_name, to_city_img, to_city_airport_short FROM flights WHERE to_city_name LIKE :to_city_name AND from_city_name LIKE :from_city_name');
    $q->bindValue(':to_city_name', '%'.$to_city_name.'%');
    $q->bindValue(':from_city_name', '%'.$from_city_name.'%');
    // Run the query
    $q->execute();
    // Do something with it. Get all the data and put it in af variable.
    // We get an associtive array - we get json back
    $flights = $q->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($flights);
    }
    
    // Catch will always tell us what whent wrong in "try"
    catch(Exception $ex){
    // echo 'error';
    http_response_code(400);
    echo json_encode(['Info:' => 'System under maintainance']);
    }
