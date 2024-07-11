<?php
    $conn = mysqli_connect("localhost", "root", "", "chvanphongpham");
    if(!$conn){
	
	// Set charset to UTF-8 cho connect
	//$conn->set_charset("utf8mb4");
        die("Ket noi khong thanh cong");
        exit();
    }
?>
