<?php
ini_set('display_errors', 1);

// API must vaidate
// API returns data (JSON), not text or HTML
// API can be success (200) or error (400) -> (correct data or a error message)
// Test the API with Postman or Thunderclient
// Never test the API with the browser
// PHP is not native to JSON, but there are options

// VALIDATE
$from_results = $_GET['from_city_name'];

// If from_city_name is not passed in a GET
if ( ! isset ($_GET['from_city_name'])) {
    http_response_code(400);
    echo json_encode(['info'=>'Missing from_city_name variable']);
    exit();
}

// If from_city_name is too short
if ( strlen($from_results) < 1 ) { // Strlen = string length
    http_response_code(400);
    echo json_encode(['info'=>'from_city_name is too short']); // Return text as json
    exit();
};

// If from_city_name is too long
if ( strlen($from_results) > 20 ) {
    http_response_code(400);
    echo json_encode(['info'=>'City name is too long']); // Return text as json
    exit();
};

// $to_results = $_GET['to_city_name'];

// // If to_city_name is not passed in a GET
// if ( ! isset ($_GET['to_city_name'])) {
//     http_response_code(400);
//     echo json_encode(['info'=>'Missing to_city_name variable']);
//     exit();
// }

// // If to_city_name is too short
// if ( strlen($to_results) < 1 ) { // Strlen = string length
//     http_response_code(400);
//     echo json_encode(['info'=>'to_city_name is too short']); // Return text as json
//     exit();
// };

// // If to_city_name is too long
// if ( strlen($to_results) > 20 ) {
//     http_response_code(400);
//     echo json_encode(['info'=>'City name is too long']); // Return text as json
//     exit();
// };

//echo $from_results;

// ########## CONNECT TO DATABASE ########## 
// Tell php to try to run the following code. If it does not work, run catch
try {
    // Send them no results, if it can't find 'from_city'. Fallback
    $from_city_name = $_GET['from_city_name'] ?? 0;
    $to_city_name = $_GET['to_city_name'] ?? '';
    // Connect to a database. Create a new PDO-connection (a php function). Connect to momondo.db
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    // If there is an error, run the catch
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Search
    $q = $db->prepare('SELECT * FROM flights WHERE from_city_name LIKE :from_city_name AND to_city_name LIKE :to_city_name');
    $q->bindValue(':from_city_name', '%'.$from_city_name.'%');
    $q->bindValue(':to_city_name', '%'.$to_city_name.'%');
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
    echo json_encode(['Info:' => 'Uuuuppss...']);
    }
