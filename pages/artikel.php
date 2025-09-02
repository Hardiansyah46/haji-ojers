<?php
if (!$article_detail) {
    echo "<p>Artikel tidak ditemukan.</p>";
    return;
}

$sidebar_items = array_slice(array_reverse($articles), 0, 5);
?>

<div class="layout">
  <main class="how">
    <!-- Judul -->
    <h2><?= htmlspecialchars($article_detail['title']) ?></h2>

    <!-- Info artikel -->
    <p>
      <em><?= htmlspecialchars($article_detail['tanggal']) ?></em> | 
      <strong><?= htmlspecialchars($article_detail['author'] ?? 'Oleh') ?></strong>
    </p>

    <!-- Featured Image -->
        <img src="/<?= $article_detail['img'] ?>" 
     alt="<?= htmlspecialchars($article_detail['alt']) ?>" 
     class="featured-img">



    <!-- Konten -->
    <div class="content">
      <?= $article_detail['content'] ?>
    </div>

    <!-- Tombol kembali -->
    <div>
      <a href="/<?= strtolower($article_detail['category']) ?>" class="back-btn">
    🔙 Kembali ke Kategori <?= ucfirst($article_detail['category']) ?>
     </a>

    </div>
  </main>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h3>Artikel Populer</h3>
    <ul>
      <?php foreach ($sidebar_items as $item): ?>
        <li>
          <a href="/<?= strtolower($item['category']) ?>/<?= strtolower($item['slug']) ?>">
            <?= htmlspecialchars($item['title']) ?>
          </a>

        </li>
      <?php endforeach; ?>
    </ul>
  </aside>
</div>
