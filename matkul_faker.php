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
$sql = "SELECT id FROM user_akademik";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
        // iterasi insert data
            for($i=0;$i<500; $i++){
                $sql = "INSERT INTO matkul (nama_matkul, sks, updated_by)
                VALUES ('".$faker->sentence(3)."', '".$faker->numberBetween($min = 1, $max = 6)."', '".$row['id']."')";
                
                if (mysqli_query($conn, $sql)) {
                    echo "+";
                } else {
                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    //echo "x";
                }
            }
    
} else {
    echo "0 results";
}
mysqli_close($conn);