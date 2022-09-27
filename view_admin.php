<?php
$_title = "Admin";
require_once __DIR__.'/comp_header.php';

try {
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('SELECT * FROM flights');
    $q->execute();
    $flights = $q->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($flights);
    }
    catch(Exception $ex){
    echo 'Something went terribly wrong';
    exit();
    }

?>

<main id="admin">

    <h2>Welcome to the admin-page 
        <?php
        session_start();
        echo $_SESSION['user_first_name'];
        ?>
    </h2>

    <p class="admin_intro">Here you can either remove flights from the database og import images</p>

    <div id="admin_menu">
        <p id="delete_flight" onclick="showAdminFlights()">Delete flights</p>
        <p id="import_images" onclick="showAdminImages()">Import images</p>
    </div>

    <div id="upload_image_container">
        <form id="upload_image_form" enctype="multipart/form-data" onsubmit="validateImage(uploadImage); return false">
            <label id="select_image" for="file_to_upload" class="custom_file_to_upload">Select image: </label>
            <p class="image_error" >! Image not allowed</p>
            <input type="file" name="file_to_upload" id="file_to_upload">
            <input id="import_image_button" type="submit" value="Upload Image" name="submit">
        </form>
    </div>

    <div id="all_flights_in_db">

        <?php 
                foreach( $flights as $flight) {
            ?>

        <div id="delete_flight_container">
            <div class="flightResult">
            <img class="airline_img" src="/images/airlines/<?= $flight[airline]?>.png" alt="airline"></>
            <div class="flight_result_info">
                <div class="from_info">
                <p class="departure_time"><?= $flight[from_city_name]?></p>
                <p class="from_airport_short"><?= $flight[from_city_airport_short]?></p>
                <p class="from_airport_name"><?= $flight[from_city_airport_name]?></p>
                </div>
                <div class="travel_divider">
                <p class="divider"></p>
                <p class="travel_hours"><?= $flight[flight_time]?></p>
                </div>
                <div class="to_info">
                <p class="arrival_time"><?= $flight[arrival_time]?></p>
                <p class="to_airport_short"><?= $flight[to_city_airport_short]?></p>
                <p class="to_airport_name"><?= $flight[to_city_airport_name]?></p>
                </div>
            </div>
            <p class="flight_stops"><?= $flight[stops]?></p>
            <p class="ticket_price"><?= $flight[price]?>￡</p>
            </div>

            <form onsubmit="return false">
            <input 
                type="text" 
                style="display:none" 
                name="flight_id" 
                value="#flight_id#">
            <button onclick="deleteFlight()">🗑️</button>
            </form>

        </div>

        <?php
            }
        ?>

    </div>

</main>

<?php
require_once __DIR__.'/comp_footer.php';
?>