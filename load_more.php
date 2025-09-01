<?php
include "data/articles.php";

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;

$articles_sorted = array_reverse($articles);
$more_articles = array_slice($articles_sorted, $offset, $limit);

foreach ($more_articles as $article): ?>
  <div class="menu-card">
    <a href="/haji-ojers/<?= $article['category'] ?>/<?= $article['slug'] ?>" class="menu-card-link">
      <img src="<?= $article['img'] ?>" alt="<?= $article['alt'] ?>" class="featured-img">
      <div class="card-content">
        <h3><?= $article['title'] ?></h3>
        <p class="excerpt"><?= $article['excerpt'] ?></p>
      </div>
    </a>
  </div>
<?php endforeach; ?>
