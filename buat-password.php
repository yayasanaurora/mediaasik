<?php

$password = "Admin123!";

$hash = password_hash($password, PASSWORD_DEFAULT);

echo "<h3>Password berhasil dibuat</h3>";
echo "<p>Password: Admin123!</p>";
echo "<p>Hash:</p>";
echo "<textarea style='width:100%;height:100px;'>$hash</textarea>";