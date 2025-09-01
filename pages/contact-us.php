<?php 
$title = "Kontak Kami - BercapNews"; 
?>
<main class="tow">
  <h1>Kontak Kami</h1>
  <p>Jika Anda memiliki pertanyaan, kritik, atau saran, silakan hubungi kami melalui:</p>

  <ul>
    <li>Email: <a href="mailto:admin@bercapnews.com">admin@bercapnews.org</a></li>
  </ul>

  <h2>Kirim Pesan Langsung</h2>
  <form action="#" method="post" style="margin-top:20px; max-width:500px;">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" required style="width:100%; padding:8px;"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required style="width:100%; padding:8px;"><br><br>

    <label for="pesan">Pesan:</label><br>
    <textarea id="pesan" name="pesan" rows="5" required style="width:100%; padding:8px;"></textarea><br><br>

    <button type="submit" style="padding:10px 15px; background:#e91414; color:#fff; border:none; border-radius:5px; cursor:pointer;">
      Kirim Pesan
    </button>
  </form>
</main>
