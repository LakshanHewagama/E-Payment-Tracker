<?php

session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];

// create order and update order

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $trackingNumber = $_POST['trackingNumber'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $totalAmount = $_POST['totalAmount'];

    // Prepare and execute SQL statement to insert order data into the database
    $sql = "INSERT INTO orders (user_id, trackingNumber, date, name, address, totalAmount) VALUES ('$user_id', '$trackingNumber', '$date', '$name', '$address', '$totalAmount')";

    if (mysqli_query($conn, $sql)) {
        // Order added successfully
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        // Error adding order
        // echo "<script>alert('Error adding order: " . mysqli_error($conn) . "');</script>";
    }
}


?>