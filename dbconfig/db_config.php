<?php
// Reusable DB connection
$host = "localhost";
$username = "root";
$password = "";
$database = "secsion";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "DB Connection Failed"]));
}
?>
 