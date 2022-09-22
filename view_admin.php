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

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="file_to_upload" id="file_to_upload">
        <input type="submit" value="Upload Image" name="submit">
    </form>

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
    <div id="delete_flight_container">
        <div class="flightResult">
        <img class="airline_img" src="/images/airlines/#airline_img#" alt="airline"></>
        <div class="flight_result_info">
            <div class="from_info">
            <p class="departure_time">#departure_time#</p>
            <p class="from_airport_short">#from_airport_short#</p>
            <p class="from_airport_name">#from_airport_name#</p>
            </div>
            <div class="travel_divider">
            <p class="divider"></p>
            <p class="travel_hours">#travel_hours#</p>
            </div>
            <div class="to_info">
            <p class="arrival_time">#arrival_time#</p>
            <p class="to_airport_short">#to_airport_short#</p>
            <p class="to_airport_name">#to_airport_name#</p>
            </div>
        </div>
        <p class="flight_stops">#stops#</p>
        <p class="ticket_price">#price#</p>
        </div>
        <form onsubmit="return false">
        <input 
            type="text" 
            style="display:none" 
            name="flight_id" 
            value="#flight_id#">
        <button onclick="deleteFlight()">🗑️</button>
        </form>
    </div>`;

    flights.forEach((flight) => {
        let divFlight = originalFlightBlueprint;

        divFlight = divFlight.replace("#airline_img#", flight.airline + ".png");
        divFlight = divFlight.replace("#departure_time#", flight.departure_time);
        divFlight = divFlight.replace("#arrival_time#", flight.arrival_time);
        divFlight = divFlight.replace("#from_airport_short#", flight.from_city_airport_short);
        divFlight = divFlight.replace("#from_airport_name#", flight.from_city_airport_name);
        divFlight = divFlight.replace("#to_airport_short#", flight.to_city_airport_short);
        divFlight = divFlight.replace("#to_airport_name#", flight.to_city_airport_name);
        divFlight = divFlight.replace("#stops#", flight.stops);
        divFlight = divFlight.replace("#travel_hours#", flight.flight_time);
        divFlight = divFlight.replace("#price#", flight.price + "￡");
        divFlight = divFlight.replace("#flight_id#", flight.flight_id);

        allFlights += divFlight;
    });

    document.querySelector("#all_flights_in_db").insertAdjacentHTML("afterbegin", allFlights);
    
});

    async function deleteFlight() {
    const theForm = event.target.form;
    console.log(theForm)
        const conn = await fetch('api-delete-flight-from-db.php', {
            method: 'POST',
            body: new FormData(theForm)
        });
        const data = await conn.json();
        if ( ! conn.ok ) {
            console.log(data);
            return;
        }
        console.log(data);
        theForm.parentElement.remove();
        }

</script>

<?php
require_once __DIR__.'/comp_footer.php';
?>