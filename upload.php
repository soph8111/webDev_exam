<?php

require_once __DIR__.'/_x.php';
ini_set('display_errors', 1);

_validate_item_image();

$target_dir = 'images/user_upload';
$target_file = $target_dir . basename($_FILES['file_to_upload']['name']); // images/test.png
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // png | jpg | zip
$random_image_name = bin2hex(random_bytes(5)); // Create a random id on 10 characters (ex. e0845e3d22)
$random_image_name = $random_image_name.'.'.$imageFileType; // Takes the random_image_name and puts .png | .jpg | .zip on
$tmp_name = $_FILES['file_to_upload']['tmp_name']; // /Applications/MAMP/tmp/php/phpyZL5Va - where the image is locaded on my computer
move_uploaded_file($_FILES['file_to_upload']['tmp_name'], "$target_dir/$random_image_name"); // Takes two aguments - where the image is locaded now, and where it sould be put