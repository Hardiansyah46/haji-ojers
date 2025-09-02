<?php
include "data/articles.php";

$perPage = 5;
$articles_sorted  = array_reverse($articles); // semua artikel terbaru dulu
$display_articles = array_slice($articles_sorted, 0, $perPage);
$sidebar_items    = array_slice($articles_sorted, 0, 5);

$title = "Berita Terbaru";
$base  = "";
?>

<div class="layout">
  <main class="main">
    <!-- Search Results -->
    <div id="searchResults"></div>

    <h2><?= htmlspecialchars($title) ?></h2>

    <!-- Container Artikel -->
    <div id="articles-container" class="row">
      <?php foreach ($display_articles as $article): ?>
        <div class="menu-card">
          <a href="/<?= strtolower($article['category']) ?>/<?= strtolower($article['slug']) ?>" class="menu-card-link">
            <img src="/<?= $article['img'] ?>" alt="<?= htmlspecialchars($article['alt']) ?>" class="featured-img">
            <div class="card-content">
              <h3><?= htmlspecialchars($article['title']) ?></h3>
              <p class="excerpt"><?= htmlspecialchars($article['excerpt']) ?></p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Tombol View More + Kembali -->
    <div style="text-align:center; margin-top:20px;">
      <?php if(count($articles_sorted) > $perPage): ?>
        <button id="loadMoreBtn"
          data-articles='<?= htmlspecialchars(json_encode($articles_sorted), ENT_QUOTES) ?>'
          data-current="<?= count($display_articles) ?>"
          data-perpage="<?= $perPage ?>"
          style="padding:8px 15px; background:#e91414; color:#fff; border:none; border-radius:5px; cursor:pointer;">
          🔽 View More
        </button>
      <?php endif; ?>

      <a href="<?= $base ?>" 
         style="padding:8px 15px; background:#555; color:#fff; border:none; border-radius:5px; cursor:pointer; margin-left:10px; text-decoration:none;">
        🔙 Kembali ke Home
      </a>
    </div>
  </main>
  </div>
  