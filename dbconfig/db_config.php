<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json");

/* Railway Config */
$host     = "crossover.proxy.rlwy.net";
$port     = "52374";
$dbname   = "railway";
$username = "root";
$password = "GMLOUUajgcyRGOVkkbHgXQpBImPFRzjr";

// 1. $conn maintain karna (Aapki purani 30 files ke liye)
$conn = mysqli_init();
mysqli_options($conn, MYSQLI_OPT_CONNECT_TIMEOUT, 10);
$success = @$conn->real_connect($host, $username, $password, $dbname, $port);

// 2. PDO Setup (Future/Stable kaam ke liye)
try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    // Agar dono fail ho jayein
    if (!$success) {
        die(json_encode(["error" => "All connections failed", "details" => $e->getMessage()]));
    }
}
?>