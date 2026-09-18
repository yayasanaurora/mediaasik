<?php
session_start();
require_once "../config/database.php";
if(isset($_SESSION['admin_id'])){header("Location: dashboard.php");exit;}
$error="";
if($_SERVER['REQUEST_METHOD']==='POST'){
 $username=trim($_POST['username']??''); $password=$_POST['password']??'';
 $stmt=$conn->prepare("SELECT * FROM users WHERE username=? LIMIT 1"); $stmt->bind_param("s",$username); $stmt->execute();
 $user=$stmt->get_result()->fetch_assoc();
 if($user && password_verify($password,$user['password'])){
   session_regenerate_id(true); $_SESSION['admin_id']=$user['id']; $_SESSION['admin_name']=$user['nama']; header("Location: dashboard.php"); exit;
 }
 $error="Username atau password salah.";
}
?><!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Login Admin</title><link rel="stylesheet" href="../assets/css/style.css"></head><body class="login-page"><form class="login-box" method="post"><h1>Login Admin</h1><?php if($error): ?><div class="alert"><?= htmlspecialchars($error) ?></div><?php endif; ?><label>Username<input name="username" required></label><label>Password<input type="password" name="password" required></label><button>Masuk</button><a href="../index.php">← Kembali ke website</a></form></body></html>