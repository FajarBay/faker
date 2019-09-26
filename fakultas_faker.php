<?php
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create('en_IN');

$servername = "192.168.100.227";
$username = "simaster";
$password = "Password123*";
$database = "my_simaster";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
/* Ambil data dari tabel user_akademik */
$fakultas = array('FA','FB','FC','FD','FE','FF','FG','FH','FI','FJ','FK','FL','FM','FN','FO');
$i=1;
foreach($fakultas as $data){
    $sql = "INSERT INTO fakultas (id, nama_fakultas)
    VALUES (".$i.",'".$data."')";
    $i++;
    if (mysqli_query($conn, $sql)) {
        echo "+";
    } else {
        echo "x";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);