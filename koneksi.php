<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "loginphp";

$koneksi = mysqli_connect($host, $user, $password, $db);

if (!$koneksi) {
    echo "Koneksi Gagal";
} else {
    echo "Koneksi Berhasil";
}
