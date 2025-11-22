<?php
$host = 'aws-1-ap-southeast-2.pooler.supabase.com';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres.lizrjrpjysvnbsmppfjm';
$password = 'paradichlorobenzene';

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
  $pdo = new PDO($dsn);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Koneksi database gagal: " . $e->getMessage();
  exit();
}
$koneksi = $pdo;
