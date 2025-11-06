<?php
include 'db.php'; // make sure your connection file is correct

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
