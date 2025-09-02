window.addEventListener("DOMContentLoaded", () => {
  // ===== HAMBURGER MENU =====
  const hamburger = document.getElementById("hamburger-menu");
  const navbarCenter = document.querySelector(".navbar-center");
  if (hamburger && navbarCenter) {
    hamburger.addEventListener("click", (e) => {
      e.preventDefault();
      navbarCenter.classList.toggle("active");
    });
    document.addEventListener("click", (e) => {
      if (!navbarCenter.contains(e.target) && !hamburger.contains(e.target)) {
        navbarCenter.classList.remove("active");
      }
    });
  }

  // ===== SEARCH =====
  const mobileSearchInput = document.getElementById("mobileSearchInput");
  const mobileSearchButton = document.getElementById("mobileSearchButton");
  const searchResults = document.getElementById("searchResults");
  const articleLinks = document.querySelectorAll(".menu-card-link");
  let articlesData = [];

  if (articleLinks.length > 0) {
    articlesData = Array.from(articleLinks).map((link) => ({
      element: link,
      title: link.querySelector("h3").textContent.toLowerCase(),
      excerpt: link.querySelector(".excerpt").textContent.toLowerCase(),
    }));
  }

  if (mobileSearchButton && mobileSearchInput) {
    mobileSearchButton.addEventListener("click", (e) => {
      e.preventDefault();
      const keyword = mobileSearchInput.value.trim().toLowerCase();
      let matchCount = 0;

      articlesData.forEach((item) => {
        item.element.style.display = "none";
        if (item.title.includes(keyword) || item.excerpt.includes(keyword)) {
          item.element.style.display = "block";
          matchCount++;
        }
      });

      if (searchResults) {
        searchResults.innerHTML =
          matchCount === 0
            ? `<p>Tidak ada hasil untuk "<strong>${keyword}</strong>"</p>`
            : "";
      }
    });
  }

  // ===== LOAD MORE =====
  const loadMoreBtn = document.getElementById("loadMoreBtn");
  if (loadMoreBtn) {
    const container = document.getElementById("articles-container");
    let articles = JSON.parse(loadMoreBtn.dataset.articles || "[]");
    let current = parseInt(loadMoreBtn.dataset.current || 0);
    const perPage = parseInt(loadMoreBtn.dataset.perpage || 5);

    loadMoreBtn.addEventListener("click", () => {
      const nextArticles = articles.slice(current, current + perPage);

      nextArticles.forEach((article) => {
        const card = document.createElement("div");
        card.className = "menu-card";
        card.innerHTML = `
          <a href="/${article.category.toLowerCase()}/${article.slug.toLowerCase()}" class="menu-card-link">
            <img src="/${article.img}" alt="${
          article.alt
        }" class="featured-img">
            <div class="card-content">
              <h3>${article.title}</h3>
              <p class="excerpt">${article.excerpt}</p>
            </div>
          </a>
        `;
        container.appendChild(card);
      });

      current += perPage;
      if (current >= articles.length) loadMoreBtn.style.display = "none";
    });
  }
});
