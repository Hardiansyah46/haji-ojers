<?php
// $article harus sudah ada saat include
?>
<div class="menu-card">
  <a href="<?= $base ?>/<?= $article['category'] ?>/<?= $article['slug'] ?>" class="menu-card-link">
    <img src="<?= $article['img'] ?>" alt="<?= $article['alt'] ?>" class="featured-img">
    <div class="card-content">
      <h3><?= $article['title'] ?></h3>
      <p class="excerpt"><?= $article['excerpt'] ?></p>
    </div>
  </a>
</div>
