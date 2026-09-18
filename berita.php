<?php
require_once "config/database.php";
$result=$conn->query("SELECT * FROM berita WHERE status='published' ORDER BY tanggal DESC");
?>
<!DOCTYPE html><html lang="id"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Berita Terbaru - Tasik slebew</title><link rel="stylesheet" href="assets/css/style.css"></head>
<body>
<header class="header"><div class="container nav"><a class="brand" href="index.php">TASIK SLEBEW MEDIA</a><nav><a href="index.php">.</a><a href="profil.php">.</a><a href="portofolio.php">.</a><a href="berita.php">.</a></nav></div></header>
<main class="container section"><h1>Berita Terbaru</h1><div class="grid">
<?php while($row=$result->fetch_assoc()): ?><article class="card"><?php if($row['gambar']): ?><img src="<?= htmlspecialchars($row['gambar']) ?>" alt=""><?php endif; ?><div class="card-body"><small><?= date('d M Y',strtotime($row['tanggal'])) ?></small><h3><?= htmlspecialchars($row['judul']) ?></h3><p><?= htmlspecialchars(mb_substr(strip_tags($row['isi']),0,160)) ?>...</p><a href="detail-berita.php?id=<?= (int)$row['id'] ?>">Baca selengkapnya →</a></div></article><?php endwhile; ?>
</div></main><footer>© <?= date('Y') ?> TASIK MEDIA</footer></body></html>