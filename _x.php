<?php
ini_set('display_errors', 1);

// ########## VALIDATE INPUT FIELDS ########## 

function _validate_to_city_name() {

    $to_city_name = $_GET['to_city_name'];

    if ( ! isset ($_GET['to_city_name'])) {
        http_response_code(400);
        echo json_encode(['info'=>'Missing to_city_name variable']);
        exit();
    }

    if ( strlen($to_city_name) < 1 ) { // Strlen = string length
        http_response_code(400);
        echo json_encode(['info'=>'to_city_name is too short']); // Return text as json
        exit();
    };

    if ( strlen($to_city_name) > 20 ) {
        http_response_code(400);
        echo json_encode(['info'=>'City name is too long']); // Return text as json
        exit();
    };

}

function _validate_from_city_name() {
    $from__city_name = $_GET['from_city_name'];

    // If from_city_name is not passed in a GET
    if ( ! isset ($_GET['from_city_name'])) {
        http_response_code(400);
        echo json_encode(['info'=>'Missing from_city_name variable']);
        exit();
    }

    // If from_city_name is too short
    if ( strlen($from__city_name) < 1 ) { // Strlen = string length
        http_response_code(400);
        echo json_encode(['info'=>'from_city_name is too short']); // Return text as json
        exit();
    };

    // If from_city_name is too long
    if ( strlen($from__city_name) > 20 ) {
        http_response_code(400);
        echo json_encode(['info'=>'City name is too long']); // Return text as json
        exit();
    };
}