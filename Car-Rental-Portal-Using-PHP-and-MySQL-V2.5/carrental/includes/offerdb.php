<?php
// db.php - Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carrental";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// offer.php - Server-side logic for offers

include('offerdb.php');

function getActiveOffers() {
    global $conn;
    $today = date("Y-m-d");
    $sql = "SELECT * FROM offers WHERE start_date <= '$today' AND end_date >= '$today'";
    $result = $conn->query($sql);

    $offers = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $offers[] = $row;
        }
    }

    return $offers;
}
?>
