<?php
// Railway Database Credentials
$host     = "mysql.railway.internal"; // Railway ka internal host (fast connection ke liye)
$username = "root";
$password = "GMLOUUajgcyRGOVkkbHgXQpBImPFRzjr";
$database = "railway";
$port     = "3306";

// Connection create karein
$conn = new mysqli($host, $username, $password, $database, $port);

// Connection check karein
if ($conn->connect_error) {
    header('Content-Type: application/json');
    die(json_encode(["error" => "DB Connection Failed: " . $conn->connect_error]));
}

// --- CORS HEADERS (Next.js ke liye zaroori hain) ---
header("Access-Control-Allow-Origin: *"); // Localhost aur Production dono ke liye
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

// Agar browser OPTIONS request bhejay (CORS preflight), toh wahin exit karein
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}
?>