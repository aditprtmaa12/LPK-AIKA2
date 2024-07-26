<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "";
$database = "u5581581_ppdb_2021";
$url = "http://localhost/ppdb";

// koneksi database
$koneksi = mysqli_connect($server, $username, $password, $database);
// cek koneksi
if (!$koneksi) {
    die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
(isset($_GET['pg'])) ? $pg = $_GET['pg'] : $pg = '';
(isset($_GET['ac'])) ? $ac = $_GET['ac'] : $ac = '';

// SETTING WAKTU
date_default_timezone_set("Asia/Jakarta");
define('BASEPATH', dirname(__FILE__));
