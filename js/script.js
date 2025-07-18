// Panggil feather agar ikon muncul
feather.replace();

const navbarNav = document.querySelector(".navbar-nav");
const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector("#search-box");
const searchButton = document.querySelector("#search-button");

document.querySelector("#hamburger-menu").onclick = function (e) {
  e.preventDefault();
  e.stopPropagation();
  navbarNav.classList.toggle("active");
};

searchButton.addEventListener("click", function (e) {
  e.preventDefault();
  searchForm.classList.toggle("active");
  if (searchForm.classList.contains("active")) {
    searchBox.focus();
  }
});

document.addEventListener("click", function (e) {
  if (
    !navbarNav.contains(e.target) &&
    !document.querySelector("#hamburger-menu").contains(e.target)
  ) {
    navbarNav.classList.remove("active");
  }
  if (!searchForm.contains(e.target) && !searchButton.contains(e.target)) {
    searchForm.classList.remove("active");
  }
});
