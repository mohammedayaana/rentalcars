<?php
// add_offer.php - Server-side logic for adding offers

include('offerdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $title = $data['title'];
    $description = $data['description'];
    $discount = $data['discount'];
    $startDate = $data['startDate'];
    $endDate = $data['endDate'];

    $sql = "INSERT INTO offers (title, description, discount_percentage, start_date, end_date)
            VALUES ('$title', '$description', $discount, '$startDate', '$endDate')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}

$conn->close();
?>
