<?php
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create('id_ID');

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
for($i=0;$i<9999; $i++){
    //get user yg mau follow
    $PRODI = get_one_prodi($conn);
    // get user yang mau difollow
    $AKADEMIK = get_one_akademik($conn);
    // Jika tidak ada status following or tidak memfollow diri sendiri maka
        $sql = "INSERT INTO mahasiswa (nama, prodi_id, sks, IPK, password, alamat, updated_by)
        VALUES ('".$faker->name."','".$PRODI."', '".$faker->numberBetween($min = 18, $max = 24)."'
        ,'".$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 4)."'
        , '".$faker->password."','".$faker->address."','".$AKADEMIK."')";
        
        if (mysqli_query($conn, $sql)) {
            echo "+";
        } else {
             //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "x";
        }
}
// select data users
function get_one_prodi($conn){
    $sql = 'SELECT id FROM prodi order by RAND() limit 1';
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