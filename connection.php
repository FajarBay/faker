<?php
$servername = '192.168.100.227';
$username = 'simaster';
$password = 'Password123*';
$database = 'my_simaster';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";