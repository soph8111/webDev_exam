<?php

$mobile = file_get_contents('mobile');
$media600 = file_get_contents('600');
$media900 = file_get_contents('900');
$customProperties = file_get_contents('custom_properties');

$final_css = $customProperties.$mobile.$media600.$media900;

file_put_contents('final', $final_css);