<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=myblog2;charset=utf8", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
//   echo "Veritabanı Bağlantı hatası daha sonra tekrar deneyin: " . $e->getMessage();
echo '<script type="text/javascript">';
echo ' alert("Veritabanı bağlantı hatası")';  
echo '</script>';
}
