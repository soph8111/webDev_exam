function toggleMenu() {
  const menu = document.querySelector("nav");
  const body = document.querySelector("body");
  const header = document.querySelector("header");
  if (menu.classList.contains("active")) {
    menu.classList.remove("active");
    body.classList.remove("active");
    header.classList.remove("active");
  } else {
    menu.classList.add("active");
    body.classList.add("active");
    header.classList.add("active");
  }
}

// ########## GET CITIES FROM ##########

function showFromResults() {
  const theFromInput = event.target.value;

  // VALIDATE??

  if (theFromInput.length > 0) {
    document.querySelector(".from_results").style.display = "block";
    getCitiesFrom();
  } else {
    document.querySelector(".from_results").style.display = "none";
  }
}

// Get cities from
async function getCitiesFrom() {
  // Clean the flights div, so we only show new results
  document.querySelector(".from_results").innerHTML = "";

  const searchFor = event.target.value;
  let conn = await fetch("/api-get-cities-from?from_city_name=" + searchFor); // fetch = get data in the background of the page
  let flights = await conn.json();

  //console.log(flights);
  // If more than one with the same name, only show one result

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

  document.querySelector(".from_results").insertAdjacentHTML("afterbegin", allFlights);
}

// function hideFromResults() {
//   document.querySelector("#from_results").style.display = "none";
//   document.querySelector("#from_input").value = "";
// }

function selectFromCity() {
  const cityName = event.target.querySelector(".from_city").innerText;
  document.querySelector(".from_input").value = cityName;
  document.querySelector(".from_results").style.display = "none";
  document.querySelector(".from_results").innerHTML = "";
}

// ########## GET CITIES TO ##########

function showToResults() {
  const theToInput = event.target.value;

  // VALIDATE??

  if (theToInput.length > 0) {
    document.querySelector(".to_results").style.display = "block";
    getCitiesTo();
  } else {
    document.querySelector(".to_results").style.display = "none";
  }
}

// Get cities to
async function getCitiesTo() {
  // Clean the flights div, so we only show new results
  document.querySelector(".to_results").innerHTML = "";

  const searchForFrom = document.querySelector(".from_input").value;
  const searchForTo = document.querySelector(".to_input").value;
  let conn = await fetch("/api-get-cities-to?from_city_name=" + searchForFrom + "&to_city_name=" + searchForTo); // fetch = get data in the background of the page
  let flights = await conn.json();
  // console.log(flights);

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

  document.querySelector(".to_results").insertAdjacentHTML("afterbegin", allFlights);
}

// function hideToResults() {
//   document.querySelector("#to_results").style.display = "none";
//   document.querySelector("#to_input").value = "";
// }

function selectToCity() {
  const cityName = event.target.querySelector(".to_city").innerText;
  document.querySelector(".to_input").value = cityName;
  document.querySelector(".to_results").style.display = "none";
  document.querySelector(".to_results").innerHTML = "";
}

// ########## SHOW FLIGHTS ##########
function showFlightResults() {
  // console.log("clicked");
  const fromInput = document.querySelector(".from_input").value;
  const toInput = document.querySelector(".to_input").value;

  // VALIDATE
  if (fromInput == "") {
    // console.log("From input is empty");
    Swal.fire("You didn't select any airport", "You know where to travel from? Select an airport in the search form", "question");
  }

  if (toInput == "") {
    // console.log("To input is empty");
    Swal.fire("You didn't select any airport", "You know where to travel to? Select an airport in the search form", "question");
  }

  // SHOW RESULTS
  // location.href = "view_show_flight_results.php?from_city_name=" + fromInput + "&to_city_name=" + toInput;
  location.href = "/search/" + fromInput + "/" + toInput;

  document.querySelector(".from_input").value = fromInput;
  document.querySelector(".to_input").value = toInput;
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
    confirmButtonText: '<a href="admin" class="sweet_alert_btn">Take me to the admin-page</a>',
  });
}

async function isEmailAvailable() {
  const form = event.target.form;
  const conn = await fetch("api-is-email-available", {
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

async function validateUserLogin() {
  const theForm = document.querySelector("#login_form");
  console.log(theForm);
  const conn = await fetch("api-is-user-in-the-system", {
    method: "POST",
    body: new FormData(theForm),
  });
  if (!conn.ok) {
    console.log("error");
    return;
  }
  //document.querySelector("#btn_login").style.pointerEvents = "all";
  console.log("User login");
}

// ########## ADMIN PAGE ##########

function showAdminFlights() {
  document.querySelector("#all_flights_in_db").style.display = "grid";
  document.querySelector("#upload_image_container").style.display = "none";
}

function showAdminImages() {
  document.querySelector("#all_flights_in_db").style.display = "none";
  document.querySelector("#upload_image_container").style.display = "block";
}

// function changeImage(imageName) {
//   console.log("test");
// }

async function deleteFlight() {
  const theForm = event.target.form;
  console.log(theForm);
  const conn = await fetch("api-delete-flight-from-db", {
    method: "POST",
    body: new FormData(theForm),
  });
  const data = await conn.json();
  if (!conn.ok) {
    console.log(data);
    return;
  }
  console.log(data);
  theForm.parentElement.remove();
}

async function uploadImage() {
  const theForm = document.querySelector("#upload_image_form");
  console.log(theForm);
  const conn = await fetch("api-upload-image", {
    method: "POST",
    body: new FormData(theForm),
  });
  if (!conn.ok) {
    console.log("error");
    return;
  }
  console.log("image uploaded");
  Swal.fire({
    icon: "success",
    title: "Image uploaded",
    text: "Your image is now uploaded",
  });
}
