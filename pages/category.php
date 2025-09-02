<?php
$perPage = 5;

// Filter artikel berdasarkan kategori (case-insensitive)
$filtered_articles = [];
if ($cat) {
    foreach ($articles as $a) {
        if (strtolower($a['category']) === strtolower($cat)) {
            $filtered_articles[] = $a;
        }
    }
}

// Urutkan terbaru dulu
$articles_sorted  = array_reverse($filtered_articles);
$display_articles = array_slice($articles_sorted, 0, $perPage);

// Sidebar tetap menampilkan artikel populer
$sidebar_items = array_slice(array_reverse($articles), 0, 5);

$title = $cat ? "Kategori: " . ucfirst($cat) : "Berita Terbaru";
?>

<div class="layout">
  <main class="main">
    <h2><?= $title ?></h2>

    <div id="articles-container" class="row">
      <?php foreach($display_articles as $article): ?>
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
                style="padding:8px 15px; background:#e91414; color:#fff; border:none; border-radius:5px; cursor:pointer;">
          🔽 View More
        </button>
      <?php endif; ?>

      <a href="<?= $base ?>" 
         style="padding:8px 15px; background:#000; color:#fff; border:none; border-radius:5px; cursor:pointer; margin-left:10px; text-decoration:none;">
        🔙 Kembali ke Home
      </a>
    </div>
  </main>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h3>Artikel Populer</h3>
    <ul>
      <?php foreach($sidebar_items as $item): ?>
        <li>
          <a href="/<?= strtolower($item['category']) ?>/<?= strtolower($item['slug']) ?>">
            <?= htmlspecialchars($item['title']) ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </aside>
</div>