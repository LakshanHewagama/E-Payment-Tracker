<?php
$conn = mysqli_connect("localhost", "root", "", "opms");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
