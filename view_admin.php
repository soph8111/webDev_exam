<?php
$_title = "Admin";
require_once __DIR__.'/comp_header.php';
?>

<main>

    <h1> <?= $_title ?? 'Title missing'?> </h1>

    <h2>Welcome 
        <?php
        session_start();
        echo $_SESSION['user_first_name'];
        ?>
    </h2>

    <div id="all_flights_in_db"></div>

</main>

<script>
// SHOW ALL FLIGHTS IN DB ON LOAD
document.addEventListener("DOMContentLoaded", async function () {
    console.log("showAllFlightsInDb");

    let conn = await fetch("api-show-all-flights-in-db.php");
    const flights = await conn.json();
    let allFlights = [];

    const originalFlightBlueprint = `
    <div class="flightResult">
        <div class="flight_result_from_container">
            <p>#result_from_city#</p>
            <p>Departure: #departure_time#</p>
        </div>
        <div class="flight_result_to_container">
            <p>#result_to_city#</p>
            <p>Arrival: #arrival_time#</p>
        </div>
    </div>`;

    flights.forEach((flight) => {
        let divFlight = originalFlightBlueprint;

        divFlight = divFlight.replace("#result_from_city#", flight.from_city_name);
        divFlight = divFlight.replace("#departure_time#", flight.departure_time);
        divFlight = divFlight.replace("#result_to_city#", flight.to_city_name);
        divFlight = divFlight.replace("#arrival_time#", flight.arrival_time);

        allFlights += divFlight;
    });

    document.querySelector("#all_flights_in_db").insertAdjacentHTML("afterbegin", allFlights);
    
});
</script>

<?php
require_once __DIR__.'/comp_footer.php';
?>