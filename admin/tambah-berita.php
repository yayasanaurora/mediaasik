<?php
require "auth.php"; require "../config/database.php"; $error="";
if($_SERVER['REQUEST_METHOD']==='POST'){
 $judul=trim($_POST['judul']); $isi=trim($_POST['isi']); $penulis=trim($_POST['penulis']); $status=$_POST['status']==='draft'?'draft':'published'; $gambar="";
 if(!empty($_FILES['gambar']['name'])){
   $allowed=['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp']; $type=mime_content_type($_FILES['gambar']['tmp_name']);
   if(!isset($allowed[$type])) $error="Format gambar harus JPG, PNG, atau WEBP.";
   else { $name=bin2hex(random_bytes(8)).'.'.$allowed[$type]; $path="../assets/images/berita/".$name; if(move_uploaded_file($_FILES['gambar']['tmp_name'],$path)) $gambar="assets/images/berita/".$name; else $error="Gagal upload gambar."; }
 }
 if(!$error){$stmt=$conn->prepare("INSERT INTO berita(judul,gambar,isi,penulis,status) VALUES(?,?,?,?,?)");$stmt->bind_param("sssss",$judul,$gambar,$isi,$penulis,$status);$stmt->execute();header("Location: berita.php");exit;}
}
?><!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Tambah Berita</title><link rel="stylesheet" href="../assets/css/style.css"></head><body><main class="container section"><a href="berita.php">← Kembali</a><h1>Tambah Berita</h1><?php if($error): ?><div class="alert"><?= htmlspecialchars($error) ?></div><?php endif; ?><form class="form" method="post" enctype="multipart/form-data"><label>Judul<input name="judul" required></label><label>Penulis<input name="penulis" value="<?= htmlspecialchars($_SESSION['admin_name']) ?>" required></label><label>Gambar<input type="file" name="gambar" accept="image/*"></label><label>Isi Berita<textarea name="isi" rows="12" required></textarea></label><label>Status<select name="status"><option value="published">Published</option><option value="draft">Draft</option></select></label><button>Simpan Berita</button></form></main></body></html>