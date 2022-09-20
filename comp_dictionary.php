<?php
$languageAllowed = ['en', 'dk'];
$lang = $_GET['lang'] ?? 'en';

if( ! in_array ($lang,$languageAllowed)){
    $lang = 'en';
};

$dictionary = [
    'en_welcome' => 'Welcome! Find a flexible flight for your next trip.',
    'dk_welcome' => 'Velkommen! Find en fleksibel flybillet til din næste rejse.',
    'en_from' => 'From',
    'dk_from' => 'Fra',
    'en_to' => 'To',
    'dk_to' => 'Til',
    'en_search' => 'Search',
    'dk_search' => 'Søg',
    'en_flights' => 'Flights',
    'dk_flights' => 'Fly',
    'en_stays' => 'Stays',
    'dk_stays' => 'Overnatning',
    'en_car_hire' => 'Car hire',
    'dk_car_hire' => 'Bil',
    'en_things_to_do' => 'Things to do',
    'dk_things_to_do' => 'Oplevelser',
    'en_holidays' => 'Holidays',
    'dk_holidays' => 'Pakkerejser',
    'en_explore' => 'Explore',
    'dk_explore' => 'Udforsk',
    'en_trips' => 'Trips',
    'dk_trips' => 'Ture'
];
?>