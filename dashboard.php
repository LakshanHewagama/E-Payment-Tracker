<?php
include 'filter.php';
include 'summery.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles-dash.css">

    <!-- A4 print styles  -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .table-container, .table-container * {
                visibility: visible;
            }
            .table-container {
                position: absolute;
                left: 0;
                top: 0;
            }
            /* Adjust table size for A4 paper */
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }            
            th:nth-child(7), td:nth-child(7),
            th:nth-child(8), td:nth-child(8),
            th:nth-child(9), td:nth-child(9)
            {
                display: none;
            }       
        }

    </style> 
    <title>E-Payment Tracker</title>
</head>

<body>
    <div class="wrapper">
        <!-- Navigation Bar -->

        <div class="nav">
            <div class="logo">
                <p>E - Payment Tracker</p>
            </div>
            <div></div>
            <div></div>

            <div class="right-links">               
                    <!-- <a href="#">Change Profile</a> -->
                    <a href="about-us.php" class="text" >About Us</a>
                </div>

                <div class="right-links">               
                    <!-- <a href="#">Change Profile</a> -->
                    <a href="contact-us.php" class="text"  >Contact Us</a>
                </div>

                <div class="right-links">               
                    <!-- <a href="#">Change Profile</a> -->
                    <a href="logout.php"><button class="btn">Log Out</button></a>
                </div>
            </div>
            
        </div>
        


        <!-- Summery Scetion  -->

        <div class="summery">      
            <div class="box-1">
                <h3>Total Orders </h3>
                <h1><?php echo $total_orders; ?></h1>
            </div>
            <div class="box-2">
                <h3>Total Sales</h3>
                <h1>Rs <?php echo $total_sales; ?></h1>
            </div>
            <div class="box-3">
                <h3>Paid Balance</h3>
                <h1>Rs <?php echo $paid_balance; ?></h1>
            </div>
            <div class="box-4">
                <h3>Unpaid Balance</h3>
                <h1>Rs <?php echo $unpaid_balance; ?></h1>
            </div>
        </div>

        <!-- Left container side -->
        <div class="content">
            <div class="container-left">              
                <!-- Filter Form -->
                <form action="dashboard.php" method="GET">
                    <div class="filter-container">                  
                        <div >
                            <label>Tracking Number:</label>
                            <input type="text" name="trackingNumber" class="input-filter">
                        </div>
                        <div>
                            <label>Paid Status:</label>
                            <select name="status" class="input-filter">
                                <option value="">All</option>
                                <option value="0">Not Paid</option>
                                <option value="1">Paid</option>
                            </select>
                        </div>
                        <div>
                            <label>Paid Date : </label>
                            <input type="date" name="date" class="input-filter">
                        </div>
                        <div>
                            <button type="submit" class="btn-2">Filter Order</button>
                        </div>                             
                    </div>
                </form>

                <!-- Table section  -->
                <div class="table-container">       
                        <table>
                            <tr>
                                <th>Date</th>
                                <th>Tracking Number</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Total Amout</th>
                                <th>Status</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>

                            <?php foreach ($user_orders as $order): ?>
                                <tr>
                                    <!-- <td><?php echo $order['id']; ?></td> -->
                                    <td><?php echo $order['date']; ?></td>
                                    <td><?php echo $order['trackingNumber']; ?></td>
                                    <td><?php echo $order['name']; ?></td>
                                    <td><?php echo $order['address']; ?></td>
                                    <td><?php echo $order['totalAmount']; ?></td>
                                    <td>
                                        <?php 
                                            if($order['status'] == 0) {
                                                echo '<a href="payment-status.php?id=' . $order['id'] .'&status=1"><button class="btn-not-paid">Not Paid</button></a>';
                                            } else {
                                                echo '<a href="payment-status.php?id=' . $order['id'] .'&status=0"><button class="btn-paid">Paid</button></a>';
                                            }
                                        ?>   
                                    </td>
                                    <td>                                 
                                        <button class="update-button" onclick="updateOrder()">Update</button>
                                    </td>                 
                                    <td>
                                        <form action="delete-order.php" method="POST">
                                            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?> 
                        </table>  
                        <div class="btn-print">
                            <button onclick="printTable()" class="btn-1">Print Summery</button>
                        </div>                   
                </div>   
            </div>

            <!-- Right Container side  -->
            <div class="container-right" >
                <!-- form section  -->
                <div id="add-order-container" class="form-container">
                    <h2>Add new order</h2>
                    <div class="form">
                        <form action="create-order.php" method="POST"> 
                            
                            <div class="input-box">
                                <label for="">Tracking Number</label>
                                <input type="text" name="trackingNumber"  required>
                            </div>
                            <div class="input-box">
                                <label for="">Date</label>
                                <input type="date" name="date"  required>
                            </div>
                            <div class="input-box">
                                <label for="">Name</label>
                                <input type="text" name="name"  required>
                            </div>
                            <div class="input-box">
                                <label for="">Address</label>
                                <input type="text" name="address"  required>
                            </div>
                            <div class="input-box">
                                <label for="">Total Amount</label>
                                <input type="text" name="totalAmount" required> 
                            </div>
                            <div><button class="btn-1" >Add Order</button></div> 
                        </form>
                    </div>
                </div>

                <!-- show only click update button  -->

                <!-- form section  -->
                <div id="update-order-container" class="form-container" style="display: none;">
                    <h2>Update order</h2>
                    <div class="form">
                        <form action="update-order.php" method="POST"> 
                            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">

                            <div class="input-box">
                                <label for="">Tracking Number</label>
                                <input type="text" name="trackingNumber" value="<?php echo $order['trackingNumber']; ?>" >
                            </div>
                            <div class="input-box">
                                <label for="">Date</label>
                                <input type="date" name="date" value="<?php echo $order['date']; ?>" >
                            </div>
                            <div class="input-box">
                                <label for="">Name</label>
                                <input type="text" name="name" value="<?php echo $order['name']; ?>" >
                            </div>
                            <div class="input-box">
                                <label for="">Address</label>
                                <input type="text" name="address" value="<?php echo $order['address']; ?>" >
                            </div>
                            <div class="input-box">
                                <label for="">Total Amount</label>
                                <input type="text" name="totalAmount" value="<?php echo $order['totalAmount']; ?>" > 
                            </div>
                            <div>
                                <!-- <button>Update</button> -->
                                <button type="submit" class="btn-1" onclick="return confirm('Are you sure you want to update this order?')" name="update">Update Order</button>
                                
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>

 <script src="script.js"></script>

<footer>
      <p>Copyright &#169; 2024 Lakshan Hewagama. All Rights Reserved.</p>
</footer>
 
</body>



</html>