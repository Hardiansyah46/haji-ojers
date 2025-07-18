// Toggle class active
const navbarNav = document.querySelector(".navbar-nav");

// Ketika hamburger menu diklik
document.querySelector("#hamburger-menu").onclick = (e) => {
  e.stopPropagation(); // cegah bubbling klik ke document
  navbarNav.classList.toggle("active");
};

// Klik di luar elemen navbar untuk menutup menu
document.addEventListener("click", function (e) {
  // Jika klik bukan di dalam .navbar-nav atau hamburger
  if (
    !navbarNav.contains(e.target) &&
    !document.querySelector("#hamburger-menu").contains(e.target)
  ) {
    navbarNav.classList.remove("active");
  }
});

{
  // Untuk search form
}
const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector("#search-box");
const searchButton = document.querySelector("#search-button");

searchButton.addEventListener("click", function (e) {
  e.preventDefault();
  searchForm.classList.toggle("active");
  if (searchForm.classList.contains("active")) {
    searchBox.focus();
  }
});
// </script>
