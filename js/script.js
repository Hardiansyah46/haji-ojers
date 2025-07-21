// Panggil feather agar ikon muncul
feather.replace();

// Elemen DOM
const navbarNav = document.querySelector(".navbar-nav");
const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector("#search-box");
const searchButton = document.querySelector("#search-button");
const hamburgerMenu = document.querySelector("#hamburger-menu");
const shoppingCart = document.querySelector(".shopping-cart");
const shoppingCartButton = document.querySelector("#shopping-cart-button");

// Hamburger menu toggle
hamburgerMenu.addEventListener("click", (e) => {
  e.stopPropagation();
  navbarNav.classList.toggle("active");
});

// Search form toggle
searchButton.addEventListener("click", (e) => {
  e.preventDefault();
  e.stopPropagation();
  searchForm.classList.toggle("active");
  if (searchForm.classList.contains("active")) {
    searchBox.focus();
  }
});

// Shopping cart toggle
if (shoppingCart && shoppingCartButton) {
  shoppingCartButton.addEventListener("click", (e) => {
    e.preventDefault();
    e.stopPropagation();
    shoppingCart.classList.toggle("active");
  });
}

// Klik di luar elemen untuk menutup
document.addEventListener("click", function (e) {
  // Tutup navbar jika klik bukan pada hamburger atau navbar
  if (!navbarNav.contains(e.target) && !hamburgerMenu.contains(e.target)) {
    navbarNav.classList.remove("active");
  }

  // Tutup search form jika klik di luar
  if (!searchForm.contains(e.target) && !searchButton.contains(e.target)) {
    searchForm.classList.remove("active");
  }

  // Tutup shopping cart jika klik di luar
  if (
    shoppingCart &&
    !shoppingCart.contains(e.target) &&
    !shoppingCartButton.contains(e.target)
  ) {
    shoppingCart.classList.remove("active");
  }
});
