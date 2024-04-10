<?php

session_start();
include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit;
}

// Retrieve user ID from session
$user_id = $_SESSION['user_id'];

// base SQL query
$sql = "SELECT * FROM orders WHERE user_id='$user_id'";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // filter by tracking number
    if (!empty($_GET['trackingNumber'])) {
        $trackingNumber = mysqli_real_escape_string($conn, $_GET['trackingNumber']);
        $sql .= " AND trackingNumber LIKE '%$trackingNumber%'";
        
    }

    // filter by paid or not
    if (isset($_GET['status'])) {
        if ($_GET['status'] === '0' || $_GET['status'] === '1') {
            $status = mysqli_real_escape_string($conn, $_GET['status']);
            $sql .= " AND status='$status'";
        }
    }

    // filter by date
    if (!empty($_GET['date'])) {

        $date = mysqli_real_escape_string($conn, $_GET['date']);
        
        $formatted_date = date('Y-m-d', strtotime($date));
        
        $sql .= " AND DATE(payment_date) = '$formatted_date'";
    }

}

// Execute the SQL query
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
    echo "Error fetching orders: " . mysqli_error($conn);
    exit;
}

// Fetch the filtered orders
$user_orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>