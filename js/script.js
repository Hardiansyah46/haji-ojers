const hamburger = document.getElementById("hamburger-menu");
const navbarCenter = document.querySelector(".navbar-center");
const searchButton = document.getElementById("search-button");
const searchOverlay = document.getElementById("searchOverlay");
const closeSearch = document.getElementById("close-search");

// Toggle sidebar menu (hamburger)
hamburger.addEventListener("click", (e) => {
  e.preventDefault();
  navbarCenter.classList.toggle("active");
  // Jika sidebar aktif, sembunyikan search overlay kalau kebuka
  if (searchOverlay.classList.contains("active")) {
    searchOverlay.classList.remove("active");
  }
});

// Toggle search overlay
searchButton?.addEventListener("click", (e) => {
  e.preventDefault();
  searchOverlay.classList.add("active");
  // Tutup sidebar menu jika kebuka
  if (navbarCenter.classList.contains("active")) {
    navbarCenter.classList.remove("active");
  }
});

// Tutup sidebar kalau klik di luar menu dan hamburger
document.addEventListener("click", (e) => {
  if (
    !navbarCenter.contains(e.target) &&
    !hamburger.contains(e.target) &&
    navbarCenter.classList.contains("active")
  ) {
    navbarCenter.classList.remove("active");
  }
});

// Tutup search overlay
closeSearch?.addEventListener("click", () => {
  searchOverlay.classList.remove("active");
});
