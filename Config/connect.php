<?php
    $conn = mysqli_connect("localhost", "root", "admin", "vanphongpham");
    if(!$conn){
	
	// Set charset to UTF-8
	$conn->set_charset("utf8mb4");
        die("Ket noi khong thanh cong");
        exit();
    }
?>
