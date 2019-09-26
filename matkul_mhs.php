<?php
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create('en_IN');

$servername = "10.33.73.158";
$username = "simaster";
$password = "Password123*";
$database = "my_simaster";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
for($i=0;$i<10; $i++){
    //get user yg mau follow
    $MATKULKLS = get_one_matkulkls($conn);
    // get user yang mau difollow
    $MAHASISWA = get_one_mahasiswa($conn);
    // Jika tidak ada status following or tidak memfollow diri sendiri maka
        $sql = "INSERT INTO matkul_mhs (niu, matkul_kelas_id)
        VALUES ('".$MAHASISWA."', '".$MATKULKLS."')";
        
        if (mysqli_query($conn, $sql)) {
            echo "+";
        } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            //echo "x";
        }
}
// select data users
function get_one_mahasiswa($conn){
    $sql = 'SELECT niu FROM mahasiswa order by RAND() limit 1';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['niu'];
}

function get_one_matkulkls($conn){
    $sql = 'SELECT id FROM matkul_kelas order by RAND() limit 1';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['id'];
}