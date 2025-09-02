<?php
include "data/articles.php";
$base = "";
?>

<div class="layout">
  <main class="main">
    <h2>Arsip Artikel</h2>
    <ul>
      <?php foreach (array_reverse($articles) as $article): ?>
        <li>
          <a href="<?= $base ?>/<?= $article['category'] ?>/<?= $article['slug'] ?>">
            <?= $article['title'] ?> - <?= $article['tanggal'] ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </main>
</div>
