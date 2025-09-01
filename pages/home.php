<?php
$base = "/haji-ojers";
$perPage = 5;

$articles_sorted = array_reverse($articles);
$display_articles = array_slice($articles_sorted, 0, $perPage);
$sidebar_items = array_slice($articles_sorted, 0, 5);

$title = "Berita Terbaru";
$backUrl = $base;
$showBack = false; 
?>

<div class="layout">
  <main class="main">
    <h2><?= $title ?></h2>
    <div id="articles-container" class="row">
      <?php foreach($display_articles as $article): ?>
        <div class="menu-card">
          <a href="<?= $base ?>/<?= $article['category'] ?>/<?= $article['slug'] ?>" class="menu-card-link">
            <img src="<?= $article['img'] ?>" alt="<?= $article['alt'] ?>" class="featured-img">
            <div class="card-content">
              <h3><?= $article['title'] ?></h3>
              <p class="excerpt"><?= $article['excerpt'] ?></p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Tombol View More + Kembali -->
    <div style="text-align:center; margin-top:20px;">
      <button id="loadMoreBtn" 
              style="padding:8px 15px; background:#e91414; color:#fff; border:none; border-radius:5px; cursor:pointer;">
        🔽 View More
      </button>

      <!-- Tombol Back di Home bisa opsional, misal ke halaman utama -->
      <a href="<?= $base ?>" 
         style="padding:8px 15px; background:#555; color:#fff; border:none; border-radius:5px; cursor:pointer; margin-left:10px; text-decoration:none;">
        🔙 Kembali ke Home
      </a>
    </div>
  </main>

  <aside class="sidebar">
    <h3>Artikel Populer</h3>
    <ul>
      <?php foreach($sidebar_items as $item): ?>
        <li><a href="<?= $base ?>/<?= $item['category'] ?>/<?= $item['slug'] ?>"><?= $item['title'] ?></a></li>
      <?php endforeach; ?>
    </ul>
  </aside>
</div>

<!-- JS untuk View More -->
<script>
// Inject data artikel dari PHP ke JS
const articles = <?= json_encode($articles_sorted) ?>;
let perPage = <?= $perPage ?>;
let current = <?= count($display_articles) ?>;

function renderArticles() {
  const container = document.getElementById('articles-container');
  const nextArticles = articles.slice(current, current + perPage);

  nextArticles.forEach(article => {
    const card = document.createElement('div');
    card.className = 'menu-card';
    card.innerHTML = `
      <a href="<?= $base ?>/${article.category}/${article.slug}" class="menu-card-link">
        <img src="${article.img}" alt="${article.alt}" class="featured-img">
        <div class="card-content">
          <h3>${article.title}</h3>
          <p class="excerpt">${article.excerpt}</p>
        </div>
      </a>
    `;
    container.appendChild(card);
  });

  current += perPage;

  if(current >= articles.length) {
    document.getElementById('loadMoreBtn').style.display = 'none';
  }
}

document.getElementById('loadMoreBtn').addEventListener('click', renderArticles);
</script>
