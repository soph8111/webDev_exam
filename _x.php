<?php
ini_set('display_errors', 1);

define('_USER_FIRST_NAME_MIN_LEN', 2);
define('_USER_FIRST_NAME_MAX_LEN', 20);
define('_USER_LAST_NAME_MIN_LEN', 2);
define('_USER_LAST_NAME_MAX_LEN', 20);

define('_REGEX_EMAIL', '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/');

define('_REGEX_PASSWORD_MIN_CHAR', 8);
define('_REGEX_PASSWORD_MIN_LETTER', 1);
define('_REGEX_PASSWORD_MIN_NUM', 1);
define('_REGEX_PASSWORD', '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/');

// ########## VALIDATE SEARCH FLIGHT INPUT FIELDS ########## 

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
        echo json_encode(['info'=>'form_city_name is too long']); // Return text as json
        exit();
    };
}

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
        echo json_encode(['info'=>'to_city_name is too long']); // Return text as json
        exit();
    };

}

// ########## VALIDATE LOGIN AND SIGNUP INPUT FILEDS ########## 
function _validate_user_first_name(){
    $error_message = 'user_first_name min ' . _USER_FIRST_NAME_MIN_LEN . ' max ' . _USER_FIRST_NAME_MAX_LEN. ' characters';
    if ( ! isset($_POST['user_first_name'])) { _respond($error_message, 400); }
    $_POST['user_first_name'] = trim($_POST['user_first_name']); 
    if ( strlen($_POST['user_first_name']) < _USER_FIRST_NAME_MIN_LEN ) { _respond($error_message, 400); }
    if ( strlen($_POST['user_first_name']) > _USER_FIRST_NAME_MAX_LEN ) { _respond($error_message, 400); }
    return $_POST['user_first_name'];
}

function _validate_user_last_name(){
    $error_message = 'user_last_name min ' . _USER_LAST_NAME_MIN_LEN . ' max ' . _USER_LAST_NAME_MAX_LEN. ' characters';
    if ( ! isset($_POST['user_last_name'])) { _respond($error_message, 400); }
    $_POST['user_last_name'] = trim($_POST['user_last_name']); 
    if ( strlen($_POST['user_last_name']) < _USER_LAST_NAME_MIN_LEN ) { _respond($error_message, 400); }
    if ( strlen($_POST['user_last_name']) > _USER_LAST_NAME_MAX_LEN ) { _respond($error_message, 400); }
    return $_POST['user_last_name'];
}

function _validate_user_email() {
    $error_message = 'user_email missing or invalid';
    if ( ! isset($_POST['user_email'])) { _respond($error_message, 400); }
    $_POST['user_email'] = trim($_POST['user_email']);
    if ( ! preg_match(_REGEX_EMAIL, $_POST['user_email'])) { _respond($error_message, 400); };
    return $_POST['user_email'];
}

function _validate_user_password() {
    $error_message = 'user_password missing or invalid';
    if ( ! isset($_POST['user_password'])) { _respond($error_message, 400); }
    if ( ! preg_match(_REGEX_PASSWORD, $_POST['user_password'])) { _respond($error_message, 400); };
    return $_POST['user_password'];
}

function _validate_user_password_confirm() {
    $error_message = 'user_password_confirm missing or does not match user_password';
    if ( ! isset($_POST['user_password_confirm'])) { _respond($error_message, 400); }
    if ( $_POST['user_password'] != $_POST['user_password_confirm']) { _respond($error_message, 400); }
    return $_POST['user_password_confirm'];
}

// ########## UPLOAD IMAGE ##########
function _validate_item_image(){
    if($_FILES['file_to_upload']['error'] === UPLOAD_ERR_INI_SIZE) {
        _respond('file_to_upload too large', 400);
      }
      $item_image_temp_name = $_FILES["file_to_upload"]["tmp_name"]; // C:\xampp\tmp\php791.tmp || C:\xampp\tmp\php5245.tmp
      $target_dir = "images/user_upload";
      $target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]); // images/user_upload/test.png
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // just reads the extension of the file
      $image_mime = mime_content_type($_FILES["file_to_upload"]["tmp_name"]); // reads the mime inside the file
      $accepted_image_formats = ['image/png', 'image/jpeg'];
      if( ! in_array($image_mime, $accepted_image_formats) ){
        http_response_code(400);
        echo 'image not allowed';
        exit();
      }
      $random_image_name = bin2hex(random_bytes(16));
      switch($image_mime){
        case 'image/png':
          $random_image_name .= '.png';
        break;
        case 'image/jpeg':
          $random_image_name .= '.jpeg';
        break;
      }
    
      if(move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], "$target_dir/$random_image_name")){
        echo 'ok';
        exit();
      }    
  }

// ##############################
// function that control the message
function _respond( $message = '', $http_response_code = 200 ){ // Set the message to be empty and the http_response_code to 200 per default (if the developer forget to sendt it)
    header('Content-Type: application/json'); // Makes the message look like a json object
    http_response_code($http_response_code);
    $response = is_array($message) ? $message : ['Info:' => $message] ; // If the message is an array, leave it like that. Else (if it's text) make it into an asso array
    echo json_encode($response);
    exit();
}

