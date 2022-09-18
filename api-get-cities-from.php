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

// If from_cit_name is too long
if ( strlen($from_results) > 20 ) {
    http_response_code(400);
    echo json_encode(['info'=>'City name is too long']); // Return text as json
    exit();
};

echo $from_results;

exit();
