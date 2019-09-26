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
for($i=0;$i<59; $i++){
    //get user yg mau follow
    $FAKULTAS = get_one_fakultas($conn);
    // get user yang mau difollow
    $AKADEMIK = get_one_akademik($conn);
    // Jika tidak ada status following or tidak memfollow diri sendiri maka
        $sql = "INSERT INTO prodi (nama_prodi, fakultas_id, updated_by)
        VALUES ('".$faker->sentence(4)."','".$FAKULTAS."', '".$AKADEMIK."')";
        
        if (mysqli_query($conn, $sql)) {
            echo "+";
        } else {
             //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "x";
        }
}
// select data users
function get_one_fakultas($conn){
    $sql = 'SELECT id FROM fakultas order by RAND() limit 1';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['id'];
}

function get_one_akademik($conn){
    $sql = 'SELECT id FROM user_akademik order by RAND() limit 1';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['id'];
}