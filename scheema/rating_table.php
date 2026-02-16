<?php
include 'dbconfig/db_config.php';

// Create Employee_Ratings table if not exists
$sql = "CREATE TABLE IF NOT EXISTS Employee_Ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    rating INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if($conn->query($sql)){
    echo json_encode(["success"=>"Employee_Ratings table created successfully"]);
}else{
    echo json_encode(["error"=>$conn->error]);
}
?>
