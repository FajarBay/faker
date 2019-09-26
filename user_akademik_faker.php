<?php
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create('id_ID');

$servername = "10.33.84.85";
$username = "simaster";
$password = "Password123*";
$database = "my_simaster";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
for($i=0; $i<100000; $i++){
    $sql = "INSERT INTO user_akademik(username, password,nama)
    VALUES ('".$faker->username."', '".$faker->password."', '".$faker->name."')";
    
    if (mysqli_query($conn, $sql)) {
        echo "+";
    } else {
        echo "x";
        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);