<?php
session_start();
include 'db.php';

if(isset($_GET['id']) && isset($_GET['status'])) {
    $order_id = $_GET['id'];
    $status = $_GET['status'];

    // Update the status of the order in the database
    $sql = "UPDATE orders SET status='$status' WHERE id='$order_id'";
    if(mysqli_query($conn, $sql)) {
        // Redirect back to the previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
        exit();
    } else {
        echo "Error updating order status: " . mysqli_error($conn);
    }
} else {
    // Redirect back to the dashboard if the required parameters are not provided
    header('Location: dashboard.php');
    exit();
}
?>
