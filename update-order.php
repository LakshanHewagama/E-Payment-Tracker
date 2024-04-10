<?php

session_start();

include 'db.php';

$user_id = $_SESSION['user_id'];

if(isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
} else {
    // Handle the case where order_id is not set
    echo "Order ID is not provided.";
    exit;
}

if(isset($_POST['update'])){
    $trackingNumber = $_POST['trackingNumber'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $totalAmount = $_POST['totalAmount'];

    // Construct and execute the SQL update query
    $sql = mysqli_query($conn, "UPDATE orders SET trackingNumber='$trackingNumber', date='$date', name='$name', 
        address='$address', totalAmount='$totalAmount' WHERE id=$order_id AND user_id=$user_id");

    if($sql){
        // echo "Updated";
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
    } else {
        echo "Failed";
    }
}
?>
