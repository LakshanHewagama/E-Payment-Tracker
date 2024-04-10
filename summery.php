<?php

include 'db.php';

// Check if session variable user_id is set
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Query to fetch user-specific data
$sql = "SELECT COUNT(*) AS total_orders, SUM(totalAmount) AS total_sales, 
        SUM(CASE WHEN status='1' THEN totalAmount ELSE 0 END) AS paid_balance,
        SUM(CASE WHEN status='0' THEN totalAmount ELSE 0 END) AS unpaid_balance
        FROM orders WHERE user_id = $user_id";

$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    // Extract summary data
    $total_orders = $row['total_orders'];
    $total_sales = $row['total_sales'];
    $paid_balance = $row['paid_balance'];
    $unpaid_balance = $row['unpaid_balance'];
} else {
    // Handle database query error
    echo "Error: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
