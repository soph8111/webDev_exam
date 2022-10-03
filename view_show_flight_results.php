<?php
$_title = "Flight Search";

try {
    $from_city_name = $_GET['from_city_name'];
    $to_city_name = $_GET['to_city_name'];
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('SELECT * FROM flights WHERE from_city_name LIKE :from_city_name AND to_city_name LIKE :to_city_name');
    $q->bindValue(':from_city_name', '%'.$from_city_name.'%');
    $q->bindValue(':to_city_name', '%'.$to_city_name.'%');
    $q->execute();
    $flights = $q->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($flights);
    }
    catch(Exception $ex){
        echo 'System under maintainance';
        exit();
    }
    
require_once __DIR__.'/_x.php';
require_once __DIR__.'/comp_dictionary.php';
require_once __DIR__.'/comp_header.php';
?>

<main id="search">

    <h1>Flight search</h1>

    <div class="flight_search">
        <form>
            <div class="search_container">
                <div class="from_container">
                    <input class="from_input" 
                    name="from_city_name" 
                    type="text" placeholder="<?=$dictionary[$lang.'_from']?>?" 
                    autocomplete="off"
                    value="<?=$from_city_name?>"
                    oninput="showFromResults()"
                    >
                    <div class="from_results"></div>
                </div>
                <div class="to_container">
                    <input class="to_input" 
                    name="to_city_name" 
                    type="text" 
                    placeholder="<?=$dictionary[$lang.'_to']?>?" 
                    autocomplete="off"
                    value="<?=$to_city_name?>"
                    oninput="showToResults()"
                    >
                    <div class="to_results"></div>
                </div>
            </div>
            <button class="search_btn" onclick="showFlightResults(); return false"><?=$dictionary[$lang.'_search']?></button>
        </form>
    </div>

    <div id="fligt_search">
        <div id="flight_search_results">
            <h2><?= "From {$from_city_name} to {$to_city_name}"?></h2>
            <?php 
            foreach( $flights as $flight) {
            ?>
            <div class="flightResult">
                <img class="airline_img" src="/images/airlines/<?= $flight[airline]?>.png" alt="airline"></>
                <div class="flight_result_info">
                    <div class="from_info">
                    <p class="departure_time"><?= $flight[departure_time]?></p>
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
            <?php
            }
            ?>
        </div>
    </div>

</main>

<?php
require_once __DIR__.'/comp_footer.php';
?>