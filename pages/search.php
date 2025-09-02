<?php
include "data/articles.php";
$base = "";

$keyword = $_GET['q'] ?? '';
$results = [];

if ($keyword) {
    foreach ($articles as $a) {
        if (stripos($a['title'], $keyword) !== false || stripos($a['excerpt'], $keyword) !== false) {
            $results[] = $a;
        }
    }
}
?>

<div class="layout">
  <main class="main">
    <h2>Hasil Pencarian: <?= htmlspecialchars($keyword) ?></h2>
    <?php if ($results): ?>
      <ul>
        <?php foreach ($results as $article): ?>
          <li>
            <a href="<?= $base ?>/<?= $article['category'] ?>/<?= $article['slug'] ?>">
              <?= $article['title'] ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p>Tidak ada artikel yang cocok.</p>
    <?php endif; ?>
  </main>
</div>
