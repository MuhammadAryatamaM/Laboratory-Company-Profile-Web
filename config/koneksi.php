<?php

$server = "localhost";
$username = "root";
$password = "";
$database = ""; //db belum

//menyimpan hasil panggilan
$koneksi = mysqli_connect($server, $username, $password, $database);

//cek error kayak password salah atau tidak
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>