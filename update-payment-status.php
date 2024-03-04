<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id']) && isset($_POST['paid'])) {
    $order_id = $_POST['order_id'];
    $paid = $_POST['paid'];

    // Get the current date and time
    $payment_date = date('Y-m-d H:i:s');

    // Prepare and execute SQL statement to update the paid status and payment date in the database
    // $sql = "UPDATE orders SET paid='$paid', payment_date='$payment_date' WHERE id='$order_id'";
    $sql = "UPDATE orders SET paid='$paid' WHERE id='$order_id'";

    if (mysqli_query($conn, $sql)) {
        // Order updated successfully
        header('Location: dashboard.php'); // Redirect to the dashboard page
        exit();
    } else {
        // Error updating order
        echo "Error updating order: " . mysqli_error($conn);
    }
} else {
    // Redirect back if order ID or paid status is not provided
    header('Location: dashboard.php');
    exit();
}
?>

