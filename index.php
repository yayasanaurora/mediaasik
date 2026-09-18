<?php
require_once "config/database.php";
$result = $conn->query("SELECT * FROM berita WHERE status='published' ORDER BY tanggal DESC LIMIT 6");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>DPP Cakra Bhakti Negeri</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="header">
  <div class="container nav">
    <a class="brand" href="index.php"><img src="assets/images/logo.png" onerror="this.style.display='none'"> XXX</a>
    <nav>
      <a href="index.php">Beranda</a>
      <a href="profil.php">Profil</a>
      <a href="portofolio.php">Portofolio</a>
      <a href="berita.php">Berita Terbaru</a>
    </nav>
  </div>
</header>
<section class="hero">
  <div class="container">
    <p class="eyebrow">TASIK MEDIA</p>
    <h1>TASIK MEDIA
    </h1>
    <p>Informasi, kegiatan, dan berita terbaru organisasi.</p>
  </div>
</section>
<main class="container section">
  <div class="section-head"><h2>Berita Terbaru</h2><a href="berita.php">Lihat semua →</a></div>
  <div class="grid">
  <?php while($row=$result->fetch_assoc()): ?>
    <article class="card">
      <?php if($row['gambar']): ?><img src="<?= htmlspecialchars($row['gambar']) ?>" alt=""><?php endif; ?>
      <div class="card-body">
        <small><?= date('d M Y', strtotime($row['tanggal'])) ?></small>
        <h3><?= htmlspecialchars($row['judul']) ?></h3>
        <p><?= htmlspecialchars(mb_substr(strip_tags($row['isi']),0,120)) ?>...</p>
        <a href="detail-berita.php?id=<?= (int)$row['id'] ?>">Baca selengkapnya</a>
      </div>
    </article>
  <?php endwhile; ?>
  </div>
</main>
<footer>© <?= date('Y') ?> TASIK MEDIA</footer>
</body></html>