<?php
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
} else {
    echo "Database Connected successfully";
}
