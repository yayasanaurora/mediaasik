<?php
require_once "config/database.php";
$id=filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
$stmt=$conn->prepare("SELECT * FROM berita WHERE id=? AND status='published'");
$stmt->bind_param("i",$id); $stmt->execute(); $row=$stmt->get_result()->fetch_assoc();
if(!$row){http_response_code(404); die("Berita tidak ditemukan.");}
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?= htmlspecialchars($row['judul']) ?></title><link rel="stylesheet" href="assets/css/style.css"></head><body>
<header class="header"><div class="container nav"><a class="brand" href="index.php"> TASIK MEDIA</a><nav><a href="index.php">Beranda</a><a href="profil.php">Profil</a><a href="portofolio.php">Portofolio</a><a href="berita.php">Berita Terbaru</a></nav></div></header>
<main class="container article"><small><?= date('d M Y',strtotime($row['tanggal'])) ?> · <?= htmlspecialchars($row['penulis']) ?></small><h1><?= htmlspecialchars($row['judul']) ?></h1>
<?php if($row['gambar']): ?><img class="article-img" src="<?= htmlspecialchars($row['gambar']) ?>" alt=""><?php endif; ?>
<div class="article-content"><?= nl2br(htmlspecialchars($row['isi'])) ?></div></main><footer>© <?= date('Y') ?> TASIK MEDIA</footer></body></html>