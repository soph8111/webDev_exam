function toggleMenu() {
  console.log("test");
  const menu = document.querySelector("nav");
  if (menu.classList.contains("active")) {
    menu.classList.remove("active");
  } else {
    menu.classList.add("active");
  }
}
