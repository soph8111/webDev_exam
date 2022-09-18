function toggleMenu() {
  console.log("test");
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
        <img src="#from_image#" alt="From city">
        <div class="from_details">
            <p class="from_city">#from_city#</p>
            <p class="from_airport">#from_airport#</p>
        </div>
    </div>`;

  flights.forEach((flight) => {
    let divFlight = originalFlightBlueprint;

    divFlight = divFlight.replace("#from_city#", flight.from_city_name);
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
  document.querySelector("#from_input").style.pointerEvents = "none";
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
          <img src="#to_image#" alt="To city">
          <div class="to_details">
              <p class="to_city">#to_city#</p>
              <p class="to_airport">#to_airport#</p>
          </div>
      </div>`;

  flights.forEach((flight) => {
    let divFlight = originalFlightBlueprint;

    divFlight = divFlight.replace("#to_city#", flight.to_city_name);
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
