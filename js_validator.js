// ##############################
function validate(callback) {
  const form = event.target;
  const validate_error = "rgba(240, 130, 240, 0.2)";
  document.querySelectorAll("[data-validate]", form).forEach(function (element) {
    element.classList.remove("validate_error");
    element.style.backgroundColor = "rgb(245, 245, 245, 0.94)";
  });
  document.querySelectorAll("[data-validate]", form).forEach(function (element) {
    switch (element.getAttribute("data-validate")) {
      case "str":
        if (element.value.length < parseInt(element.getAttribute("data-min")) || element.value.length > parseInt(element.getAttribute("data-max"))) {
          element.classList.add("validate_error");
          element.style.backgroundColor = validate_error;
        }
        break;
      case "int":
        if (!/^\d+$/.test(element.value) || parseInt(element.value) < parseInt(element.getAttribute("data-min")) || parseInt(element.value) > parseInt(element.getAttribute("data-max"))) {
          element.classList.add("validate_error");
          element.style.backgroundColor = validate_error;
        }
        break;
      case "email":
        let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(element.value.toLowerCase())) {
          element.classList.add("validate_error");
          element.style.backgroundColor = validate_error;
        }
        break;
      case "regex":
        var regex = new RegExp(element.getAttribute("data-regex"));
        // console.log(regex);
        // var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
        if (!regex.test(element.value)) {
          console.log(element.value);
          console.log("regex error");
          element.classList.add("validate_error");
          element.style.backgroundColor = validate_error;
        }
        break;
      case "match":
        if (element.value != document.querySelector(`[name='${element.getAttribute("data-match-name")}']`, form).value) {
          element.classList.add("validate_error");
          element.style.backgroundColor = validate_error;
        }
        break;
    }
  });
  if (!document.querySelector(".validate_error", form)) {
    callback();
    return;
  }
  document.querySelector(".validate_error", form).focus();
}

// ##############################
function clear_validate_error() {
  // event.target.classList.remove("validate_error")
  // event.target.value = ""
}

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
    //document.querySelector("#bt_signup").style.pointerEvents = "none";
    return;
  }
  document.querySelector("#email_error_message").style.display = "none";
  //document.querySelector("#bt_signup").style.pointerEvents = "auto";
}
