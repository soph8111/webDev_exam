function toggleMenu() {
  const menu = document.querySelector("nav");
  if (menu.classList.contains("active")) {
    menu.classList.remove("active");
  } else {
    menu.classList.add("active");
  }
}

// ########## GET CITIES FROM ##########

function showFromResults() {
  const theFromInput = document.querySelector("#from_input");

  // VALIDATE??

  if (theFromInput.value.length > 0) {
    document.querySelector("#from_results").style.display = "block";
    getCitiesFrom();
  } else {
    document.querySelector("#from_results").style.display = "none";
  }
}

// Get cities from
async function getCitiesFrom() {
  // Clean the flights div, so we only show new results
  document.querySelector("#from_results").innerHTML = "";

  const searchFor = document.querySelector("#from_input").value;
  let conn = await fetch("api-get-cities-from.php?from_city_name=" + searchFor); // fetch = get data in the background of the page
  let flights = await conn.json();
  console.log(flights);

  let allFlights = [];
  const originalFlightBlueprint = `
    <div class="from_result_container" onclick="selectFromCity()">
        <img src="/images/cities/#from_image#" alt="From city">
        <div class="from_details">
          <div class="from_top">
            <p class="from_city">#from_city#</p>
            <p class="from_country">, #from_country#</p>
            <p class="from_airport_short">#from_airport_short#</>
          </div>
            <p class="from_airport">#from_airport#</p>
        </div>
    </div>`;

  flights.forEach((flight) => {
    let divFlight = originalFlightBlueprint;

    divFlight = divFlight.replace("#from_image#", flight.from_city_img);
    divFlight = divFlight.replace("#from_city#", flight.from_city_name);
    divFlight = divFlight.replace("#from_country#", flight.from_country_name);
    divFlight = divFlight.replace("#from_airport_short#", flight.from_city_airport_short);
    divFlight = divFlight.replace("#from_airport#", flight.from_city_airport_name);

    allFlights += divFlight;
  });

  document.querySelector("#from_results").insertAdjacentHTML("afterbegin", allFlights);
}

// function hideFromResults() {
//   document.querySelector("#from_results").style.display = "none";
//   document.querySelector("#from_input").value = "";
// }

function selectFromCity() {
  const cityName = event.target.querySelector(".from_city").innerText;
  document.querySelector("#from_input").value = cityName;
  document.querySelector("#from_results").style.display = "none";
  document.querySelector("#from_results").innerHTML = "";
}

// ########## GET CITIES TO ##########

function showToResults() {
  const theToInput = document.querySelector("#to_input");

  // VALIDATE??

  if (theToInput.value.length > 0) {
    document.querySelector("#to_results").style.display = "block";
    getCitiesTo();
  } else {
    document.querySelector("#to_results").style.display = "none";
  }
}

// Get cities to
async function getCitiesTo() {
  // Clean the flights div, so we only show new results
  document.querySelector("#to_results").innerHTML = "";

  const searchForFrom = document.querySelector("#from_input").value;
  const searchForTo = document.querySelector("#to_input").value;
  let conn = await fetch("api-get-cities-to.php?from_city_name=" + searchForFrom + "&to_city_name=" + searchForTo); // fetch = get data in the background of the page
  let flights = await conn.json();
  console.log(flights);

  let allFlights = [];
  const originalFlightBlueprint = `
  <div class="to_result_container" onclick="selectToCity()">
      <img src="/images/cities/#to_image#" alt="To city">
      <div class="to_details">
        <div class="to_top">
          <p class="to_city">#to_city#</p>
          <p class="to_country">, #to_country#</p>
          <p class="to_airport_short">#to_airport_short#</>
        </div>
        <p class="to_airport">#to_airport#</p>
      </div>
  </div>`;

  flights.forEach((flight) => {
    let divFlight = originalFlightBlueprint;

    divFlight = divFlight.replace("#to_image#", flight.to_city_img);
    divFlight = divFlight.replace("#to_city#", flight.to_city_name);
    divFlight = divFlight.replace("#to_country#", flight.to_country_name);
    divFlight = divFlight.replace("#to_airport_short#", flight.to_city_airport_short);
    divFlight = divFlight.replace("#to_airport#", flight.to_city_airport_name);

    allFlights += divFlight;
  });

  document.querySelector("#to_results").insertAdjacentHTML("afterbegin", allFlights);
}

// function hideToResults() {
//   document.querySelector("#to_results").style.display = "none";
//   document.querySelector("#to_input").value = "";
// }

function selectToCity() {
  const cityName = event.target.querySelector(".to_city").innerText;
  document.querySelector("#to_input").style.pointerEvents = "none";
  document.querySelector("#to_input").value = cityName;
  document.querySelector("#to_results").style.display = "none";
  document.querySelector("#to_results").innerHTML = "";
}

// ########## SHOW FLIGHTS ##########
async function showFlightResults() {
  console.log("clicked");
  const fromInput = document.querySelector("#from_input");
  const toInput = document.querySelector("#to_input");

  // VALIDATE
  if (fromInput.value == "") {
    // console.log("From input is empty");
    Swal.fire("You didn't select any airport", "You know where to travel from? Select an airport in the search form", "question");
  }

  if (toInput.value == "") {
    // console.log("To input is empty");
    Swal.fire("You didn't select any airport", "You know where to travel to? Select an airport in the search form", "question");
  }

  // SHOW RESULTS
  // Insert title of search
  document.querySelector("#title_of_flight_search").innerHTML = "From " + fromInput.value + " to " + toInput.value;

  // Clean the flights div, so we only show new results
  document.querySelector("#flight_search_results").innerHTML = "";

  let conn = await fetch("api-show-flight-results.php?from_city_name=" + fromInput.value + "&to_city_name=" + toInput.value);
  const flightsResults = await conn.json();
  console.log(flightsResults);

  let allFlights = [];
  const originalFlightBlueprint = `
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
    </div>`;

  flightsResults.forEach((flight) => {
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

    allFlights += divFlight;
  });

  document.querySelector("#flight_search_results").insertAdjacentHTML("afterbegin", allFlights);
}

// ########## TOGGLE LOGIN POPUP ##########
function toggleLoginPopup() {
  const popUp = document.querySelector("#login_popup");
  const overlay = document.querySelector(".login_overlay");
  if (popUp.classList.contains("active")) {
    popUp.classList.remove("active");
  } else {
    popUp.classList.add("active");
  }
  if (overlay.classList.contains("active")) {
    overlay.classList.remove("active");
  } else {
    overlay.classList.add("active");
  }
  document.querySelector("#login_container").style.display = "block";
  document.querySelector("#signup_container").style.display = "none";
}

function toggleSignupPopup() {
  const popUp = document.querySelector("#login_popup");
  const overlay = document.querySelector(".login_overlay");
  if (popUp.classList.contains("active")) {
    popUp.classList.remove("active");
  } else {
    popUp.classList.add("active");
  }
  if (overlay.classList.contains("active")) {
    overlay.classList.remove("active");
  } else {
    overlay.classList.add("active");
  }
  showSignup();
}

function showSignup() {
  document.querySelector("#login_container").style.display = "none";
  document.querySelector("#signup_container").style.display = "block";
}

// ########## SIGNUP ##########
async function signup() {
  console.log("All input fileds validated correct");
  const theForm = document.querySelector("#signup_form");
  console.log(theForm);
  const conn = await fetch("api-signup", {
    method: "POST",
    body: new FormData(theForm),
  });
  if (!conn.ok) {
    console.log("Uppss...");
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Something went wrong!",
    });
    return;
  }
  // Success
  const user = await conn.json(); // Convert text to json
  console.log(user.user_first_name);
  Swal.fire({
    icon: "success",
    title: "Welcome " + user.user_first_name,
    text: "You are now signed up",
    confirmButtonText: '<a href="admin">Take me to the admin-page</a>',
  });
}

async function isEmailAvailable() {
  const form = event.target.form;
  const conn = await fetch("api-is-email-available.php", {
    method: "POST",
    body: new FormData(form),
  });
  if (!conn.ok) {
    document.querySelector("#email_error_message").style.display = "block";
    document.querySelector("#bt_signup").style.pointerEvents = "none";
    return;
  }
  document.querySelector("#email_error_message").style.display = "none";
  document.querySelector("#bt_signup").style.pointerEvents = "auto";
}

// ADMIN PAGE - SHOW ALL FLIGHTS IN DB
