<?php
$host = "localhost";
$username = "root";
$password = "anna_luna1223";
$dbname = "pickleball_reservation";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
