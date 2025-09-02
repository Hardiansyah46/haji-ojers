<?php
// base path otomatis (tidak hardcode "/haji-ojers")
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
if ($base === '' || $base === '.') $base = '/';

include __DIR__ . "/data/articles.php";

// Ambil request path tanpa query string
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Hilangkan base path (misal kalau ada subfolder)
if ($base !== '/' && strpos($request, $base) === 0) {
    $request = substr($request, strlen($base));
}

$request = trim($request, '/');
$segments = $request ? explode('/', $request) : [];

// default
$page = 'home';
$cat  = null;
$slug = null;

// segment pertama = halaman atau kategori
if (isset($segments[0]) && $segments[0] !== '') {
    $page = $segments[0];
}

// segment kedua = slug artikel
if (isset($segments[1]) && $segments[1] !== '') {
    $slug = $segments[1];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bercap News</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/css/style.css">
  <script src="https://unpkg.com/feather-icons"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>

   <!-- Navbar --> 
  <nav class="navbar" x-data="{ open: false, search: false }">
    <div class="navbar-container">
      <a href="<?= $base ?>" class="navbar-logo">Bercap<span>News</span></a>

      <div :class="{'active': open}" class="navbar-center" id="mobileMenu">
        <a href="/">Home</a>
            <a href="/olahraga">Olahraga</a>
            <a href="/opini">Opini</a>
            <a href="/berita">Berita</a>


        <!-- Mobile Search -->
        <div class="mobile-search">
          <input type="search" id="mobileSearchInput" placeholder="Cari…" />
          <button id="mobileSearchButton">Cari</button>
        </div>
      </div>

      <div class="navbar-right navbar-extra">
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
    </div>
  </nav>

  <!-- Konten Utama -->
  <div class="layout">
    <main class="main">
      <?php
      // Routing
      switch ($page) {

          case 'about':
              include __DIR__ . "/pages/about.php";
              break;

          case 'search':
              include __DIR__ . "/pages/search.php";
              break;

          case 'produk':
              if ($slug && isset($_GET['kategori'])) {
                  include __DIR__ . "/pages/produk.php";
              } else {
                  include __DIR__ . "/pages/home.php";
              }
              break;

          case 'olahraga':
        case 'opini':
        case 'berita':
            $cat = $page;
        
            if ($slug) {
                $article_detail = null;
                foreach ($articles as $a) {
                    if (
                        strtolower($a['slug']) === strtolower($slug) &&
                        strtolower($a['category']) === strtolower($cat)
                    ) {
                        $article_detail = $a;
                        break;
                    }
                }
        
                if ($article_detail) {
                    include __DIR__ . "/pages/artikel.php";
                } else {
                    echo "<pre>DEBUG: Tidak ketemu artikel dengan category=$cat dan slug=$slug</pre>";
                }
            } else {
                include __DIR__ . "/pages/category.php";
            }
            break;


          case 'privacy-policy':
              include __DIR__ . "/pages/privacy-policy.php";
              break;

          case 'contact-us':
              include __DIR__ . "/pages/contact-us.php";
              break;

          case 'home':
          default:
              include __DIR__ . "/pages/home.php";
              break;
      }
      ?>
    </main>
  </div>

  <!-- Footer -->
  <footer>
    <div class="socials">
      <a href="https://www.instagram.com/bercapnews" class="instagram" target="_blank">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="https://www.twitter.com/" class="twitter" target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://www.facebook.com/Aji Hardiansyah" class="facebook" target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
    </div>

    <div class="footer-links">
      <a href="/privacy-policy">Kebijakan Privasi</a>
      <a href="/contact-us">Kontak Kami</a>
    </div>

    <div class="credit">
      <p>&copy; 2025 <span>BercapNews</span>. All rights reserved.</p>
    </div>
  </footer>

  <script>
    feather.replace();
  </script>
  <script src="/js/script.js" defer></script>
</body>
</html>
