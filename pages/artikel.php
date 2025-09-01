<?php
if(!$article_detail){
    echo "<p>Artikel tidak ditemukan.</p>";
    return;
}
$sidebar_items = array_slice(array_reverse($articles), 0, 5);
?>
<div class="layout">
  <main class="how">
    <h2><?= $article_detail['title'] ?></h2>
    <p>
      <em><?= $article_detail['tanggal'] ?></em> | 
      <strong><?= $article_detail['author'] ?? 'Oleh' ?></strong>
    </p>

    <img src="<?= $base ?>/<?= $article_detail['img'] ?>" 
     alt="<?= $article_detail['alt'] ?>" 
     class="featured-img">
    <div class="content"><?= $article_detail['content'] ?></div>
    <div>
      <a href="<?= $base ?>/<?= $article_detail['category'] ?>" class="back-btn">🔙 Kembali ke Kategori <?= ucfirst($article_detail['category']) ?></a>
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
