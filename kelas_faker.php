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
$sql = "SELECT id FROM user_akademik order by RAND() limit 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$kelas = array('A','B','C','D','E','T');
$i=1;
foreach($kelas as $data){
    $sql = "INSERT INTO kelas (id,kelas, updated_by)
    VALUES (".$i.",'".$data."', ".$row["id"].")";
    $i++;
    if (mysqli_query($conn, $sql)) {
        echo "+";
    } else {
        echo "x";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);