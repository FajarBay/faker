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
for($i=0;$i<100; $i++){
    //get user yg mau follow
    $KELAS = get_one_kelas($conn);
    // get user yang mau difollow
    $MATKUL = get_one_matkul($conn);
    // Jika tidak ada status following or tidak memfollow diri sendiri maka
        $sql = "INSERT INTO matkul_kelas (matkul_id, kelas_id)
        VALUES ('".$MATKUL."', '".$KELAS."')";
        
        if (mysqli_query($conn, $sql)) {
            echo "+";
        } else {
            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "x";
        }
}
// select data users
function get_one_kelas($conn){
    $sql = 'SELECT id FROM kelas order by RAND() limit 1';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['id'];
}

function get_one_matkul($conn){
    $sql = 'SELECT id FROM matkul order by RAND() limit 1';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['id'];
}