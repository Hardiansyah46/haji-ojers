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
