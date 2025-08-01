const hamburger = document.getElementById("hamburger-menu");
const navbarCenter = document.querySelector(".navbar-center");
const mobileSearchInput = document.getElementById("mobileSearchInput");
const mobileSearchButton = document.getElementById("mobileSearchButton");
const searchResults = document.getElementById("searchResults");

// Toggle menu
hamburger.addEventListener("click", (e) => {
  e.preventDefault();
  navbarCenter.classList.toggle("active");
});

// Search logic
const articles = Array.from(document.querySelectorAll(".menu-card-link")).map(
  (link) => {
    return {
      element: link,
      title: link.querySelector("h3").textContent.toLowerCase(),
      excerpt: link.querySelector(".excerpt").textContent.toLowerCase(),
    };
  }
);

mobileSearchButton.addEventListener("click", (e) => {
  e.preventDefault();
  const keyword = mobileSearchInput.value.trim().toLowerCase();
  let matchCount = 0;

  articles.forEach((item) => {
    item.element.style.display = "none";
    if (item.title.includes(keyword) || item.excerpt.includes(keyword)) {
      item.element.style.display = "block";
      matchCount++;
    }
  });

  searchResults.innerHTML =
    matchCount === 0
      ? `<p>Tidak ada hasil untuk "<strong>${keyword}</strong>"</p>`
      : "";
});

// Tutup hamburger menu jika klik di luar area menu
document.addEventListener("click", (e) => {
  const isClickInsideMenu = navbarCenter.contains(e.target);
  const isClickOnHamburger = hamburger.contains(e.target);

  if (!isClickInsideMenu && !isClickOnHamburger) {
    navbarCenter.classList.remove("active");
  }
});
